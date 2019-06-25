<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function viewLogin() {
        return view('backend.login');
    }

    public function actionLogin(LoginRequest $request) {
        $credentials = $request->only(['username', 'password']);
        if(auth()->attempt($credentials)) {
            return redirect()->route('backend.home');
        }
        return redirect()->back()->with('error', 'Username or password is invalid');
    }
}
