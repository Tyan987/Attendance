<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($request->remember) {
            Cookie::queue('email', $credential['email'], 7);
        }

        if (Auth::attempt($credential, true)) {
            Session::put('email', $credential['email']);
            return redirect('/');
        }

        return redirect()->back()->withErrors('Wrong Email or Password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function registerIndex()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $rules = [
            "name" => 'required|min:5',
            "email" => 'required|email|unique:users',
            "password" => 'required|min:8',
            "address" => 'required|min:10',
            "gender" => 'required',
        ];

        $request->validate($rules);

        if ($request->confPassword != $request->password) {
            return redirect()->back()->withErrors('Password not match');
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->gender = $request->gender;

        $user->save();
        return redirect('/login');
    }
}
