<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('user.index', compact('places'));
    }

    public function editLandingPage()
    {
        $places = Place::all(); // Retrieve all places
        return view('admin.setting', compact('places'));
    }

    // Update place details
    public function update(Request $request, $id)
{
    // Validate incoming request
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    // Find the place by ID
    $place = Place::findOrFail($id);

    // Update place with validated data
    $place->title = $validatedData['title'];
    $place->description = $validatedData['description'];

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('places', 'public');
        $place->image = $imagePath;
    }

    $place->save();

    return redirect()->route('admin.settings')->with('success', 'Place updated successfully!');
}

    public function getPlace($id)
{
    $place = Place::findOrFail($id);
    return response()->json($place);
}

}
