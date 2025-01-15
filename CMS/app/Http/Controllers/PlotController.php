<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use Illuminate\Support\Facades\Storage;

class PlotController extends Controller
{
    public function index()
    {
        $plots = Plot::all();
        return view('admin.plot', compact('plots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'block_no' => 'nullable|integer',
            'plot_number' => 'nullable|string|max:255',
            'lot_owner' => 'nullable|string|max:255',
            'owner_address' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'occupant_name' => 'nullable|string|max:255',
            'occupant_address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'interment_date' => 'nullable|date',
'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $plot = new Plot($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $plot->image = $imagePath;
        }

        $plot->save();

        return redirect()->route('plots.index');
    }
    public function edit($id)
{
    $plot = Plot::findOrFail($id);
    return response()->json($plot);
}

public function update(Request $request, $id)
{
    $plot = Plot::findOrFail($id);

    $request->validate([
        'block_no' => 'nullable|integer',
        'plot_number' => 'nullable|string|max:255',
        'lot_owner' => 'nullable|string|max:255',
        'owner_address' => 'nullable|string|max:255',
        'contact_number' => 'nullable|string|max:255',
        'status' => 'nullable|string|max:255',
        'occupant_name' => 'nullable|string|max:255',
        'occupant_address' => 'nullable|string|max:255',
        'gender' => 'nullable|string|max:255',
        'age' => 'nullable|integer',
        'interment_date' => 'nullable|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    $plot->block_no = $request->block_no;
    $plot->plot_number = $request->plot_number;
    $plot->lot_owner = $request->lot_owner;
    $plot->owner_address = $request->owner_address;
    $plot->contact_number = $request->contact_number;
    $plot->status = $request->status;
    $plot->occupant_name = $request->occupant_name;
    $plot->occupant_address = $request->occupant_address;
    $plot->gender = $request->gender;
    $plot->age = $request->age;
    $plot->interment_date = $request->interment_date;

    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($plot->image && file_exists(public_path($plot->image))) {
            unlink(public_path($plot->image));
        }

        // Store the new image in the specified folder
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/profile'), $imageName);
        $plot->image = 'images/profile/' . $imageName; // Update the image path
    }

    $plot->save();

    return redirect()->route('plots.index')->with('success', 'Plot updated successfully.');
}
    public function destroy($id)
    {
        $plot = Plot::findOrFail($id);
        $plot->delete();

        return redirect()->route('plots.index');
    }
    public function getPlotDetails($block_no, $plot_number)
{
    $plot = Plot::where('block_no', $block_no)
                ->where('plot_number', $plot_number)
                ->first();

    if (!$plot) {
        return response()->json(['error' => 'Plot not found'], 404);
    }

    return response()->json([
        'block_no' => $plot->block_no,
        'plot_number' => $plot->plot_number,
        'occupant_name' => $plot->occupant_name,
        'image' => asset('storage/images/' . $plot->image), // Ensure this path matches your storage setup
    ]);
}

}
