<?php

namespace App\Http\Controllers;

use App\Models\LawnLotPrice;
use App\Models\MausoleumLotPrice;
use App\Models\IntermentService;
use App\Models\LandingPage;
use App\Models\Place;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function index()
    {
        $lawnLotPrice = LawnLotPrice::find(1);
        $mausoleumLotPrice = MausoleumLotPrice::find(1);
        $intermentService = IntermentService::find(1);
        $landingPage = LandingPage::find(1);
        $places = Place::all(); // Retrieve all places

        return view('admin.setting', compact('lawnLotPrice', 'mausoleumLotPrice', 'intermentService', 'landingPage', 'places'));
    }

    public function updateLawnLotPrice(Request $request)
    {
        $data = $request->validate([
            'price' => 'required|numeric',
            'size' => 'required|string',
            'downpayment' => 'required|numeric',
            'installment' => 'required|string',
            'discount_for_cash_basis' => 'required|numeric',
        ]);

        $lawnLotPrice = LawnLotPrice::find(1);
        $lawnLotPrice->update($data);

        return redirect()->route('admin.settings.index')->with('success', 'Lawn Lot Price updated successfully.');
    }

    public function updateMausoleumLotPrice(Request $request)
    {
        $data = $request->validate([
            'price' => 'required|numeric',
            'size' => 'required|string',
            'downpayment' => 'required|numeric',
            'installment' => 'required|string',
            'discount_for_cash_basis' => 'required|numeric',
        ]);

        $mausoleumLotPrice = MausoleumLotPrice::find(1);
        $mausoleumLotPrice->update($data);

        return redirect()->route('admin.settings.index')->with('success', 'Mausoleum Lot Price updated successfully.');
    }

    public function updateIntermentService(Request $request)
    {
        $data = $request->validate([
            'price_non_senior' => 'required|numeric',
            'price_senior' => 'required|numeric',
            'price_transfer_of_bones' => 'required|numeric',
        ]);

        $intermentService = IntermentService::find(1);
        $intermentService->update($data);

        return redirect()->route('admin.settings.index')->with('success', 'Interment Service updated successfully.');
    }

    public function updatePlace(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $place = Place::findOrFail($id);

        $place->title = $validatedData['title'];
        $place->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('places', 'public');
            $place->image = $imagePath;
        }

        $place->save();

        return redirect()->route('admin.settings.index')->with('success', 'Place updated successfully!');
    }

    public function getPlace($id)
    {
        $place = Place::findOrFail($id);
        return response()->json($place);
    }
    public function display()
    {
        // Fetch data from the database
        $lawnLots = LawnLotPrice::all();
        $mausoleumLots = MausoleumLotPrice::all();
        $intermentServices = IntermentService::all();

        // Pass the data to the view
        return view('user.pricing', [
            'lawnLots' => $lawnLots,
            'mausoleumLots' => $mausoleumLots,
            'intermentServices' => $intermentServices
        ]);
    }
}
