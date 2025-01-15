<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
{
    $facilities = Facility::all();
    return view('admin.rules.facilities.index', compact('facilities'));
}

    public function store(Request $request)
    {
        $request->validate([
            'facility' => 'required|string|max:255',
        ]);

        Facility::create($request->all());
        return redirect()->route('admin.facilities.index');
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.rules.facilities.edit', compact('facility'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'facility' => 'required|string|max:255',
        ]);

        $facility = Facility::findOrFail($id);
        $facility->update($request->all());
        return redirect()->route('admin.facilities.index');
    }

    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return redirect()->route('admin.facilities.index');
    }
}
