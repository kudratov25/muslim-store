<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.admin');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required', 'max:25'],
            'password' => ['required', 'max:30', 'min:8'],
        ]);

        // dd($request);
        $remember = $request->remember_token;
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerateToken();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login')->with('toast_warning', 'You have logout');
    }
}
