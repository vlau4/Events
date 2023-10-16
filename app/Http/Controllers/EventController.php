<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    // All Events
    public function index() {
        //dd(request('tag'));
        return view('events.index', [
            'events' => Event::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Single Event
    public function show(Event $event) {
        return view('events.show', [
            'event' => $event
        ]);
    }

    // Show Create Form
    public function create() {
        return view('events.create');
    }

    // Store Event Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('events', 'company')],
            'location' => 'required',
            'website' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Event::create($formFields);

        return redirect('/')->with('message', 'Event created successfully!');
    }

    // Show Edit Form
    public function edit(Event $event) {
        return view('events.edit', ['event' => $event]);
    }

    // Update Event
    public function update(Request $request, Event $event) {
        // Make sure logged in user is owner
        if($event->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $event->update($formFields);

        return back()->with('message', 'Event updated successfully!');
    }

    // Delete Event
    public function destroy(Event $event) {
        if($event->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $event->delete();
        return redirect('/')->with('message', 'Event deleted successfully!');
    }

    // Show Edit Form
    public function manage(Event $event) {
        return view('events.manage', ['events' => request()->user()->events()->get()]);
    }

}
