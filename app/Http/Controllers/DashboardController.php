<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return view('dashboard.admin.home');
            }

            if ($user->hasRole('staff')) {
                return view('dashboard.staff.home');
            }

            if ($user->hasRole('student')) {
                return view('dashboard.student.home');
            } else {
                return redirect()->route('login');
            }
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Pemetaan ID ke view
        $views = [
            'class' => 'dashboard.admin.class',
            'program' => 'dashboard.admin.program',
            'information' => 'dashboard.admin.information',
            'user' => 'dashboard.admin.user',
        ];

        // Validasi ID dan render view yang sesuai
        if (array_key_exists($id, $views)) {
            return view($views[$id]);
        }

        // Jika ID tidak valid
        abort(404, 'Page not found.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
