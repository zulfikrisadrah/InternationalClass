<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $data = [
            'title' => 'Manage Event',
        ];

        // Ambil query pencarian
        $search = $request->input('search');

        if ($user) {
            if ($user->hasRole('staff')) {
                // Event milik staff yang sedang login
                $events = Event::where('user_id', $user->id)
                    ->when($search, function ($query, $search) {
                        $query->where('Event_Title', 'like', '%' . $search . '%');
                    })
                    ->paginate(10);
            } else {
                // Semua event untuk admin
                $events = Event::when($search, function ($query, $search) {
                        $query->where('Event_Title', 'like', '%' . $search . '%');
                    })
                    ->latest()
                    ->paginate(10);
            }

            // Pastikan query pagination tetap membawa input pencarian
            return view('dashboard.admin.event.index', compact('events', 'data'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.event.create', compact('studyPrograms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;

        if (auth()->user()->hasRole('admin')) {

            $validated = $request->validate([
                'Event_Title' => 'required|string|max:255',
                'Event_Content' => 'required|string',
                'Publication_Date' => today(),
                'Event_Date' => 'required|date',
                'Event_Image' => 'required|image|max:2048',
                'ID_study_program' => 'required|exists:study_programs,ID_study_program',
            ]);

            $data = $validated;
            $data['user_id'] = $user;

        } else {

            $studyProgram = auth()->user()->staff->ID_study_program;

            $validated = $request->validate([
                'Event_Title' => 'required|string|max:255',
                'Event_Content' => 'required|string',
                'Publication_Date' => today(),
                'Event_Date' => 'required|date',
                'Event_Image' => 'required|image|max:2048',
            ]);

            $data = $validated;
            $data['user_id'] = $user;
            $data['ID_study_program'] = $studyProgram;

        }

        // Handle file upload if an image is provided
        if ($request->hasFile('Event_Image')) {
            $data['Event_Image'] = $request->file('Event_Image')->store('images/events', 'public');
        }

        // Create the event
        Event::create($data);

        // Redirect to the event index page with a success message
        return redirect()->route('admin.event.index')->with('success', 'Event added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.event.edit', compact('event', 'studyPrograms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        if (auth()->user()->hasRole('admin')) {

            $validated = $request->validate([
                'Event_Title' => 'required|string|max:255',
                'Event_Content' => 'required|string',
                'Publication_Date' => today(),
                'Event_Date' => 'required|date',
                'Event_Image' => 'nullable|image|max:2048',
                'ID_study_program' => 'required|exists:study_programs,ID_study_program',
            ]);

        } else {

            $validated = $request->validate([
                'Event_Title' => 'required|string|max:255',
                'Event_Content' => 'required|string',
                'Publication_Date' => today(),
                'Event_Date' => 'required|date',
                'Event_Image' => 'nullable|image|max:2048',
            ]);

        }

        // Prepare data for storage
        $data = $validated;

        if ($request->hasFile('Event_Image')) {
            // Hapus gambar lama jika ada
            if ($event->Event_Image) {
                Storage::disk('public')->delete($event->Event_Image);
            }

            $data['Event_Image'] = $request->file('Event_Image')->store('images/events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.event.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->Event_Image && Storage::exists('public/' . $event->Event_Image)) {
            Storage::delete('public/' . $event->Event_Image);
        }

        // Hapus program dari database
        $event->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.event.index')->with('success', 'Event deleted successfully.');
    }
}
