<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed']
        ]);

        //Register
        $user = User::create($fields);

        //Login
        Auth::login($user);

        event(new Registered($user));


        // Redirect
        return redirect()->route('profile');
    }

    public function login(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // try to log in
        if (Auth::attempt($fields, $request->remember))
        {
            return redirect('profile');
        } else {
            return back()->withErrors([
                'failed' => 'Dont math our records'
            ]);
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        //  dd('qw');
    } 

    public function verifyNotice () {
        return view ('auth.verify-email');
    }
    public function verifyEmail (EmailVerificationRequest $request) {

        $request->fulfill();
     
        return redirect()->route('profile');
    }

    public function verifyHandler (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }

}
