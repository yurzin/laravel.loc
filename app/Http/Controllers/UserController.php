<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $title = 'Registration page';
        return view('user.create', compact('title'));
    }

    public function store(StoreUserRequest $request)
    {
        /*$request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:12'
        ]);*/

        if ($request->hasFile('avatar')) {
            $folder = date('Y-m-d');
            $avatar = $request->file('avatar')->store("images/{$folder}", 'public');
        }

        //$validated = $request->validated();
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null
        ]);

        session()->flash('success', 'Регистрация прошла успешно');
        Auth::login($user);
        return redirect()->home();
    }

    public function loginForm()
    {
        $title = 'Login page';
        return view('user.login', compact('title'));
    }

    public function login(StoreLoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->home();
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->home();
    }
}
