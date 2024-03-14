<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

        return view('admin.users.login', ['title' => 'Đăng nhập thành công']);
    }
    public function store(request $request)
    {
        $this -> validate($request, [

            'email' => 'required|email:filter',
            'password' => 'required'

        ]);

        if (Auth::attempt([
            'email' => $request -> input('email'),
            'password' => $request -> input('password')
        ], $request-> input('remember')))

        {
            return route('admin');
        }
        return redirect()->back();
    }
}
