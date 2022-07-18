<?php


namespace App\Http\Service;
use \Illuminate\Support\Facades\Session;

class UserService
{
    public function create($request)
    {
        Session::push('users', $request->only('name', 'email', 'phone', 'address'));
    }
}
