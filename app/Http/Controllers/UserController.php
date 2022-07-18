<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\CreateFormRequest;
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
//        session()->forget('users');
        return view('admin.user.index',['users' => Session::get('users')]);
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(CreateFormRequest $request)
    {

        $this->userService->create($request->only('name','email'));
//        dd(Session::get('users'));
        return redirect()->back();
//       có validate sai thì nó sẽ load lại trang đó, k lỗi thì sẽ sang trang tiếp
//        $request->validate([
//            'name' => 'required|min:2',
//        ]);
    }
}
