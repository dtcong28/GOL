<?php


namespace App\Http\Service;
use \Illuminate\Support\Facades\Session;

class UserService
{
    public function create($request)
    {

        $users = Session::get('users');

        // put thay the thang cu
        // push thêm thằng mới vào thằng cũ
        if (is_null($users)) {
            Session::push('users', [ $request ]);
            return true;
        }else {
            Session::push('users', [ $request ]);
            return true;
        }
    }
}
