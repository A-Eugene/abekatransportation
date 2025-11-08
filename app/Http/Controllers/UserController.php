<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Login
    public function loginPage(Request $request) {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }

        return view('pages.landing.login');
    }

    public function loginHandler(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.'
        ])->withInput();
    }

    public function logoutHandler(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    // Dashboard
    public function userDashboardPage($model = '') {
        return view('pages.dashboard.dashboard-user');
    }

}
