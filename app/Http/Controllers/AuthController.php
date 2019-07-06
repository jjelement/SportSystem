<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('sign-in');
    }

    public function registerPage()
    {
        $provinces = Province::get();
        return view('sign-up', ['provinces' => $provinces]);
    }

    public function register(RegisterRequest $request)
    {
        $birthDate = $request->year.'-'.$request->month.'-'.$request->day;
        $user = new User([
            'username'      => $request->username,
            'password'      => Hash::make($request->password),
            'firstName'     => $request->firstName,
            'lastName'      => $request->lastName,
            'passportNo'    => $request->passportNo,
            'email'         => $request->email,
            'tel'           => $request->tel,
            'tel2'          => $request->tel2,
            'gender'        => $request->gender,
            'district_id'   => $request->districtId,
            'address'       => $request->address,
            'birthdate'     => $birthDate,
            'bloodType'     => $request->bloodType,
            'healthIssue'   => $request->healthIssue,
        ]);
        $user->save();
        return redirect()->route('sign-in')->with('success', 'Register successful!');
    }

    public function login(Request $request) {
        $rememberme = $request->has('rememberme');
        $credential = [
            'password' => $request->password
        ];

        if(filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credential['email'] = $request->username;
        } else {
            $credential['username'] = $request->username;
        }

        if(Auth::attempt($credential, $rememberme)) {
            if($request->ref) {
                return redirect()->to($request->ref);
            }
            return redirect()->route('home');
        }
        return redirect()->back()->withInput()->with('error', 'Username or Password is invalid');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
