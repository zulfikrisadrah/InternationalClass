<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CalenderController extends Controller
{
    // Menampilkan halaman kalender
    public function index()
    {
        $data = [
            'title' => 'Academic Calendar',
        ];

        $user = Auth::user();
        $agendas = Agenda::where('end', '>=', Carbon::now())->orderby('start')->get();

        if ($user->hasRole('student')) {
            return view('dashboard.student.academicCalender', compact('agendas', 'data'));
        }

        if ($user->hasRole('admin')) {
            return view('dashboard.admin.calender.index', compact('agendas', 'data'));
        }

        abort(403, 'Unauthorized action.');
    }

    // Mengambil semua agenda dalam format JSON
    public function getEvents()
    {
        $colors = ['#f5472c','#edbc4a', '#72c42f', '#0c95f7', '#6fdeed',' #9c66ed', '#a586ad',' #00ff3c'];
        $colorIndex = 0;

        $events = Agenda::all()->flatMap(function ($agenda) use (&$colors, &$colorIndex) {
            $startDate = Carbon::parse($agenda->start);
            $endDate = Carbon::parse($agenda->end ?? $agenda->start);

            if ($startDate && $endDate && $startDate <= $endDate) {
                $eventColor = $colors[$colorIndex];
                $colorIndex = ($colorIndex + 1) % count($colors);

                $eventData =  collect(range(0, $startDate->diffInDays($endDate)))->map(fn($offset) => [
                    'start' => $startDate->copy()->addDays($offset)->toDateString(),
                    'end' => $endDate->copy()->addDays($offset)->toDateString(),
                    'title' => $agenda->title,
                    'description' => $agenda->description,
                    'color' => $eventColor,
                ]);

                $eventData = $eventData->map(function($item) use ($startDate, $endDate) {
                    $item['startDate'] = $startDate->format('d F Y');
                    $item['endDate'] = $endDate->format('d F Y');
                    return $item;
                });
                }

            return $eventData;
        });

        return response()->json($events);
    }

    public function create()
    {
        return view('dashboard.admin.calender.create');
    }

    // Menyimpan agenda baru
    public function store(Request $request)
    {
        $request->validate([
            'agenda_title' => 'required|string|max:255',
            'agenda_start' => 'required|date|after_or_equal:' . Carbon::now()->toDateString(),
            'agenda_end' => 'required|date|after_or_equal:agenda_start',
            'agenda_description' => 'required|string',
        ]);

        // Simpan agenda ke database
        Agenda::create([
            'title' => $request->agenda_title,
            'start' => $request->agenda_start,
            'end' => $request->agenda_end,
            'description' => $request->agenda_description,
        ]);

        return redirect()->route('admin.calender.index')->with('success', 'Agenda successfully created!');
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);

        $agenda->start = Carbon::parse($agenda->start)->format('Y-m-d\TH:i');
        $agenda->end = Carbon::parse($agenda->end)->format('Y-m-d\TH:i');

        return view('dashboard.admin.calender.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'agenda_title' => 'required|string|max:255',
            'agenda_start' => 'required|date|after_or_equal:' . Carbon::now()->toDateString(),
            'agenda_end' => 'required|date|after_or_equal:agenda_start',
            'agenda_description' => 'nullable|string',
        ]);

        $agenda = Agenda::findOrFail($id);

        $agenda->update([
            'title' => $request->agenda_title,
            'start' => $request->agenda_start,
            'end' => $request->agenda_end,
            'description' => $request->agenda_description,
        ]);

        return redirect()->route('admin.calender.index')->with('success', 'Agenda successfully updated!');
    }


    public function destroy ($id){
        $agenda = Agenda::find($id);

        $agenda->delete();
        return redirect()->route('admin.calender.index')->with('success', 'Agenda deleted successfully!');
    }
}

