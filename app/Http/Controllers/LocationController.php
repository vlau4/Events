<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Show Locations
    public function show() {
        return view('locations.show', [
            'locations' => Location::latest()->paginate(6)
        ]);
    }

    // Show Create Form
    public function create() {
        return view('locations.create');
    }

    // Store Location Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'street' => 'required',
            'number' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required'
        ]);

        Location::create($formFields);

        return redirect('/')->with('message', 'Location created successfully!');
    }
}
