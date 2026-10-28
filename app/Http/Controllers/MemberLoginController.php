<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberLoginController extends Controller
{
    /**
     * Handle member login.
     */
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    /*
    |--------------------------------------------------------------------------
    | Attempt Login
    |--------------------------------------------------------------------------
    */

    if (! Auth::attempt(
        [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role' => 'member',
        ],
        $request->boolean('remember')
    )) {

        return back()
            ->withErrors([
                'email' => 'The email or password is incorrect, or this account does not have member access.',
            ])
            ->withInput($request->only('email'));
    }

    /*
    |--------------------------------------------------------------------------
    | Regenerate Session
    |--------------------------------------------------------------------------
    */

    $request->session()->regenerate();

    /*
    |--------------------------------------------------------------------------
    | Force Password Change
    |--------------------------------------------------------------------------
    */

    if (Auth::user()->must_change_password) {

        return redirect()->route('member.change-password');

    }

    /*
    |--------------------------------------------------------------------------
    | Redirect Member
    |--------------------------------------------------------------------------
    */

    return redirect()->route('member-portal');
}


    /**
     * Log the member out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('member.login');
    }
}