<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Signup;

use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function signupForm(Request $request)
    {
        $request->validate([
                'username'=>'required',
                'password'=>'required|min:5',
        ]);

        $register = new Signup;

        if ($request->isMethod('post')) {
            $register->username = $request->get('username');
            $register->password = Hash::make($request->get('password'));
            $register->save();
        }
       
        return redirect()->back()->with('success','You Signuped Successfully..Login Now');
    }

    public function loginForm(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:5',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::guard('signup')->attempt($credentials)) {
            return redirect()->intended('/')
                        ->with('success','You have Successfully loggedin');
        }

        return redirect()->back()->with('error','Oppes! You have entered invalid credentials');
    }

    public function logout() 
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
