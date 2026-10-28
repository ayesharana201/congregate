<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Handle administrator login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            /*
            |--------------------------------------------------------------------------
            | Check Administrator Role
            |--------------------------------------------------------------------------
            */

            if (! in_array(Auth::user()->role, ['organization_admin'])) {

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return back()
        ->withErrors([
            'email' => 'This account does not have administrator access.',
        ])
        ->withInput($request->only('email'));
}

            /*
            |--------------------------------------------------------------------------
            | Login Successful
            |--------------------------------------------------------------------------
            */

            return redirect()->route('admin.dashboard');
        }

        /*
        |--------------------------------------------------------------------------
        | Login Failed
        |--------------------------------------------------------------------------
        */

        return back()
            ->withErrors([
                'email' => 'The email or password is incorrect.',
            ])
            ->withInput($request->only('email'));
    }


    /**
     * Log the administrator out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}