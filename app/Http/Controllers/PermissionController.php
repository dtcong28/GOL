<?php

namespace App\Http\Controllers;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permission.index');
    }
    public function create()
    {
        return view('admin.permission.create');
    }
}
