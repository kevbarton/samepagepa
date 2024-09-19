<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login( Request $request){
        return view('admin.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {   
        $remember=$request->has('remeber')?true:false;
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:8'],
        ]);
        $credentials['active']=1;
        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /***
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/dashboard');
    }
}
