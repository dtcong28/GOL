<?php

namespace App\Http\Controllers;

use App\Repository\QuestionRepositoryInterface;
use App\Repository\AnswerRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Http\Requests\Admin\QuestionRequest;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    protected $questionRepository;
    protected $answerRepository;
    protected $categoryRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository, CategoryRepositoryInterface $categoryRepository, AnswerRepositoryInterface $answerRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        return view('admin.question.index', [
            'questions' => $this->questionRepository->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.question.form', ['categories' => $this->categoryRepository->getAll()]);
    }


    public function store(QuestionRequest $request)
    {
        DB::beginTransaction();

        try {
            $question = $this->questionRepository->save($request->only('content', 'category_id'));
            $data = $request->except(['_token', 'radio-answer', 'category_id', 'content']);
            $data['question_id'] = $question->id;
            foreach ($request['answer'] as $key => $answer) {
                $data['correct'] = false;
                if ($request['radio-answer'] == $key) {
                    $data['correct'] = true;
                }
                $data['content'] = $answer;
                $this->answerRepository->save($data);
            }
            DB::commit();
            return redirect()->route('question.index')->with('success', 'Creation success.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }


    public function show($id)
    {
        $search = $id;
        $questions = $this->questionRepository->with('answers')->get();
        $question_collection = collect($questions->all());
        $filtered = $question_collection->filter(function ($item) use ($search) {
            return stripos($item['id'], $search) !== false;
        });
        if (!$question = $filtered) {
            abort(404);
        }
        return view('admin.question.form', ['question' => current($question->all()),'act'=>'show' ,'categories' => $this->categoryRepository->getAll()]);
    }


    public function edit($id)
    {
        $search = $id;
        $questions = $this->questionRepository->with('answers')->get();
        $question_collection = collect($questions->all());
        $filtered = $question_collection->filter(function ($item) use ($search) {
            return stripos($item['id'], $search) !== false;
        });
        if (!$question = $filtered) {
            abort(404);
        }
        return view('admin.question.form', ['question' => current($question->all()), 'categories' => $this->categoryRepository->getAll()]);
    }


    public function update(QuestionRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $question = $this->questionRepository->save($request->only('content', 'category_id'), ['id' => $id]);
            $data['question_id'] = $question->id;

            $answers = $this->answerRepository->where('question_id', $id);
            $ids_answer = collect($answers->get())->pluck('id');
            foreach ($request['answer'] as $key => $answer) {
                $data['correct'] = false;
                if ($request['radio-answer'] == $key) {
                    $data['correct'] = true;
                }
                $data['content'] = $answer;
                $this->answerRepository->save($data, ['id' => $ids_answer[$key]]);
            }
            DB::commit();
            return redirect()->route('question.index')->with('success', 'Upadate success.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }


    public function destroy($id)
    {
        $this->questionRepository->deleteById($id);
        return redirect()->route('question.index')->with('success', 'Delete success.');
    }
}
