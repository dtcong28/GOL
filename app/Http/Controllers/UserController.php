<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Http\Service\MaiService;
use App\Http\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Repository\UserRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;

    protected $mailService;
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserService $userService, MaiService $mailService, UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userService = $userService;
        $this->mailService = $mailService;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return view('admin.user.index', ['users' => $this->userRepository->with('roles')->paginate()]);
    }

    public function create()
    {
        return view('admin.user.form', ['roles' => $this->roleRepository->getAll()]);
    }

    public function store(UserRequest $request)
    {
        $request['password'] = Hash::make($request['password']);
        $data = $request->except(['_token']);
        $data['verified_at'] = now();
        $data['type'] = User::TYPES['admin'];

        DB::beginTransaction();

        try {
            $user = $this->userRepository->save($data);
            $user->roles()->sync($data['role_ids']);
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Successfully added new');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $this->userRepository->findById($id)->roles()->detach();
            $this->userRepository->deleteById($id);
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Delete success.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function show($id)
    {
        if (!$user = $this->userRepository->findById($id)) {
            abort(404);
        }
        return view('admin.user.form', ['user' => $user, 'act' => 'show', 'roles' => $this->roleRepository->getAll()]);
    }

    public function edit($id)
    {
        if (!$user = $this->userRepository->findById($id)) {
            abort(404);
        }
        return view('admin.user.form', ['user' => $user, 'roles' => $this->roleRepository->getAll()]);
    }

    public function update(UserRequest $request, $id)
    {
        $request['password'] = Hash::make($request['password']);
        $data = $request->except(['_token']);
        $data['verified_at'] = now();
        $data['type'] = User::TYPES['admin'];
        DB::beginTransaction();

        try {
            $user = $this->userRepository->save($data, ['id' => $id]);
            $user->roles()->sync($data['role_ids']);
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Update success.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function email()
    {
        return view('admin.user.email', ['users' => $this->userRepository->getAll()]);
    }

    public function sendMailUserProfile(Request $request)
    {
        $allUser = $this->userRepository->getAll();
        $users = $request->email == 'all_user' ? collect($allUser) : collect($allUser)->where('email', '=', $request->email);

        $path = public_path('uploads');
        $attachment = $request->file('attachment');

        if (!empty($attachment)) {
            $name = time() . '.' . $attachment->getClientOriginalExtension();

            // create folder
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $attachment->move($path, $name);

            $filename = $path . '/' . $name;

            foreach ($users as $user) {
                $this->mailService->sendUserProfile($user, $filename);
            }
        } else {
            foreach ($users as $user) {
                $this->mailService->sendUserProfile($user, $filename = '/');
            }
        }

        return redirect()->back()->with('message', 'Sent successfully');
    }
}
