<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function landingLogo()
    {
        $landingPage = LandingPage::find(1); // Assuming there is only one landing page
        return view('header', compact('landingPage'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'logo' => 'nullable|image|max:2048', // Max 2MB image
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'description' => 'nullable|string',
        ]);

        $landingPage = LandingPage::find(1);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $landingPage->update($data);

        return redirect()->back()->with('success', 'Landing page updated successfully.');
    }
}
