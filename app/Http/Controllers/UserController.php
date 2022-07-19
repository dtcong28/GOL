<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Service\UserService;
use Illuminate\Support\Facades\Session;
use App\Http\Service\MaiService;

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
        $this->userService->create($request);

        return redirect()->back();
    }

    public function email()
    {
        return view('admin.user.email', ['users' => Session::get('users')]);
    }

    public function sendMailUserProfile(Request $request)
    {
        if ($request->email == 'all_user') {
            $user = collect(Session::get('users'));
        }else{
            $user = collect(Session::get('users'))->where('email','=', $request->email);
        }
        foreach ($user as $value)
        {
            $this->mailService->sendUserProfile($value);
        }
        return redirect()->back()->with('message', 'Gửi thành công');
    }
}
