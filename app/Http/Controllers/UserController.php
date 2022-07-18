<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Service\UserService;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.user.index',['users' => Session::get('users')]);
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(UserRequest $request)
    {
        $this->userService->create($request->only('name', 'email'));

        return redirect()->back();
    }
}
