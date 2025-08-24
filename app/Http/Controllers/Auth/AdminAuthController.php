<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        // Laravel 12 - check if already authenticated
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Laravel 12 - improved authentication attempt
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Laravel 12 - redirect to intended or default dashboard
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Log::info('Admin logout attempt', [
            'admin' => Auth::guard('admin')->user()->email ?? 'unknown',
            'session_id' => $request->session()->getId()
        ]);
        
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        Log::info('Admin logout successful');
        
        return redirect()->route('admin.login')->with('success', 'Berhasil logout dari admin panel');
    }
}