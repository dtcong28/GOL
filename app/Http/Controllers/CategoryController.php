<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepositoryInterface;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('admin.category.index', [
            'categories' => $this->categoryRepository->paginate()
        ]);
    }


    public function create()
    {
        return view('admin.category.form');
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->save($request->validated());
        return redirect()->route('category.index')->with('success', 'Creation success.');
    }

    public function show($id)
    {
        if (!$category = $this->categoryRepository->findById($id)) {
            abort(404);
        }
        return view('admin.category.form', ['category' => $category, 'act' => 'show']);
    }


    public function edit($id)
    {
        if (!$category = $this->categoryRepository->findById($id)) {
            abort(404);
        }
        return view('admin.category.form', ['category' => $category]);
    }


    public function update(CategoryRequest $request, $id)
    {
        $this->categoryRepository->save($request->validated(), ['id' => $id]);
        return redirect()->route('category.index')->with('success', 'Update success.');
    }


    public function destroy($id)
    {
        $this->categoryRepository->deleteById($id);
        return redirect()->route('category.index')->with('success', 'Delete success.');
    }
}
