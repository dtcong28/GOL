<?php


namespace App\Http\Service;
use \Illuminate\Support\Facades\Session;

class UserService
{
    public function create($request)
    {
        // put thay the thang cu
        // push thêm thằng mới vào thằng cũ
        Session::push('users', [ $request ]);
        return true;
    }
}
