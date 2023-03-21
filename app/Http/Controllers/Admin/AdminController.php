<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function administrator()
    {
        return view('admin.login');
    }
    public function admindashboard()
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
        $remember = $request->remember_token;
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerateToken();

            return redirect()->intended('admindashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }



    // umumiy logout bu yerda ishlaganligi uchun quidagi logout shart emas, agar qo'shimcha method qo'shilsa kommentdan chiqarish va route logout name o'zgartiriladiащкьфвфпш фсешщт кщгеу ham o'zgartiriladi

    // public function logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }

}
