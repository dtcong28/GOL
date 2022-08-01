<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Http\Service\MaiService;
use App\Http\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;

    protected $mailService;

    public function __construct(UserService $userService, MaiService $mailService)
    {
        $this->userService = $userService;
        $this->mailService = $mailService;
    }

    public function index()
    {
        return view('admin.user.index', ['users' => Session::get('users')]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        $this->userService->create($request->only('name', 'email', 'phone', 'address'));

        return redirect()->back()->with('message', 'Thêm mới thành công');
    }

    public function email()
    {
        return view('admin.user.email', ['users' => Session::get('users')]);
    }

    public function sendMailUserProfile(Request $request)
    {
        $users = $request->email == 'all_user' ? collect(Session::get('users')) : collect(Session::get('users'))->where('email', '=', $request->email);

        $path = public_path('uploads');
        $attachment = $request->file('attachment');

        if (! empty($attachment)) {
            $name = time().'.'.$attachment->getClientOriginalExtension();

            // create folder
            if (! File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $attachment->move($path, $name);

            $filename = $path.'/'.$name;

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
