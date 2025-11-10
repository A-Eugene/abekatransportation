<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function App\Utils\Util\querySearch;

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
            return redirect()->intended(route('dashboard', ['model' => 'User']));
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
    public function dashboardPage() {
        $perPage = request('per_halaman', 10);
        $search  = request('search');

        $query = querySearch(User::class, $search);

        return view('pages.dashboard.dashboard-user', [
            'users' => $query->paginate($perPage)->withQueryString()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => [
                'required',
                'string',
                'min:3',
                'max:20',
                'regex:/^[a-zA-Z0-9_]+$/', // no spaces, only letters/numbers/underscores
                'unique:users,username',     // unique in users table
            ],
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['createError' => $firstMessage]);
        }

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

       return back()->with('success', 'User created successfully.');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return redirect()->back()->with('updateError', 'User not found.');
        }

        $validator = Validator::make($request->all(), [
            'username' => [
                'required',
                'string',
                'min:3',
                'max:20',
                'regex:/^[a-zA-Z0-9_]+$/', // no spaces, only letters/numbers/underscores
                'unique:users,username,' . $request->id . ',id' // biar username bisa tetap
            ],
            'password' => 'nullable|string|min:6',
        ]);

        if ($validator->fails()) {
            $firstMessage = $validator->errors()->first();
            return redirect()->back()
                ->withInput()
                ->withErrors(['updateError' => $firstMessage]);
        }

        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

       return back()->with('success', 'User updated successfully.');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return redirect()->back()->withErrors(['deleteError' => 'User not found.']);
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
