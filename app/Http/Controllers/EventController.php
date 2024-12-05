<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Manage Event',
        ];
        if ($user) {
            if ($user->hasRole('staff')) {
                $events = Event::where('user_id', $user->id)->paginate(10);
            } else {
                $events = Event::latest()->paginate(10);
            }
            return view('dashboard.admin.event.index', compact('events','data'));//untuk return ke dashboard admin
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'Event_Title' => 'required|string|max:255',
            'Event_Content' => 'required|string',
            'Publication_Date' => today(),
            'Event_Image' => 'nullable|image|max:2048',
        ]);

        // Prepare data for storage
        $data = $validated;
        $data['user_id'] = auth()->id();

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
        return view('dashboard.admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'Event_Title' => 'required|string|max:255',
            'Event_Content' => 'required|string',
            'Publication_Date' => today(),
            'Event_Image' => 'nullable|image|max:2048',
        ]);

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