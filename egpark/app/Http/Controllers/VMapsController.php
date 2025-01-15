<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;

use Illuminate\Support\Facades\Validator;

class VMapsController extends Controller
{public function showMap1()
    {
        // Fetch block data and plot counts for each block
        $blocks = Plot::select('block_no')->distinct()->get();

        return view('user.vmaps1', ['blocks' => $blocks]);
    }

    public function getPlotDetails(Request $request, $block_no, $plot_number)
    {
        // Fetch the plot details based on block number and plot number
        $plot = Plot::where('block_no', $block_no)
                    ->where('plot_number', $plot_number)
                    ->first();

        if ($plot) {
            return response()->json($plot);
        }

        return response()->json(['error' => 'Plot not found'], 404);
    }
    public function searchPlots(Request $request)
{
    $occupantName = $request->input('occupant_name');

    $plots = Plot::where('occupant_name', 'like', '%' . $occupantName . '%')->get();

    if ($plots->isNotEmpty()) {
        return response()->json($plots);
    }

    return response()->json(['error' => 'No plots found'], 404);
}
}
