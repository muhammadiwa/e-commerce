<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            if (auth()->user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                auth()->logout(); // Logout non-admin users
                throw ValidationException::withMessages(['email' => 'You do not have permission to access this area.']);
            }
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
