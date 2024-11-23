<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        return redirect()->intended(route('dashboard', absolute: false));

        // if ($user->role('admin')) {
        //     return redirect()->route('dashboard.admin.index');
        // } elseif ($user->Role('staff')) {
        //     return redirect()->route('dashboard.faculty.index');
        // } elseif ($user->Role('student')) {
        //     return redirect()->route('dashboard.student.index');
        // }

        // // Jika tidak memiliki role yang valid, logout pengguna
        // Auth::logout();
        // return redirect('/')->withErrors(['role' => 'Access denied. No valid role assigned.']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
