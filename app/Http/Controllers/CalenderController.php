<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    // Menampilkan halaman kalender
    public function index()
    {
        return view('dashboard.student.academicCalender');
    }

    // Mengambil semua agenda untuk ditampilkan di kalender
    public function getEvents()
    {
        // Ambil semua agenda dari database
        $events = Agenda::all();

        // Format data agenda untuk FullCalendar
        $events = $events->map(function($event) {
            return [
                'title' => $event->title,
                'start' => $event->start->toIso8601String(),  // Pastikan format ISO 8601 untuk FullCalendar
                'end' => $event->end->toIso8601String(),
                'description' => $event->description,
                'location' => $event->location,
            ];
        });

        return response()->json($events);
    }

    // Menyimpan agenda baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        // Simpan agenda ke database
        $agenda = Agenda::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        return response()->json($agenda, 201);
    }
}

