<?php

namespace App\Http\Controllers;

use App\Models\ReverenceSafety;
use App\Models\FlowersDecoration;
use App\Models\RuleHeader;
use Illuminate\Http\Request;


class UserRuleController extends Controller
{
    public function index()
    {
        $ruleHeaders = RuleHeader::all(); // Fetch all rule headers
        $flowersDecorationRules = FlowersDecoration::all(); // Fetch all flowers and decoration rules
        $reverenceSafetyRules = ReverenceSafety::all(); // Fetch all reverence and safety rules
        
        return view('user.rules.index', compact('ruleHeaders', 'flowersDecorationRules', 'reverenceSafetyRules'));
    }    
}
