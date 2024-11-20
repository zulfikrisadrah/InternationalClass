<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.home');
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
