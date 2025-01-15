<?php

namespace App\Http\Controllers;

use App\Models\ReverenceSafety;
use App\Models\FlowersDecoration;
use App\Models\RuleHeader;
use Illuminate\Http\Request;

class AdminRuleController extends Controller
{
    public function index()
    {
        $ruleHeaders = RuleHeader::all(); // Fetch all rule headers
        $flowersDecorationRules = FlowersDecoration::all(); // Fetch all flowers and decoration rules
        $reverenceSafetyRules = ReverenceSafety::all(); // Fetch all reverence and safety rules
        
        return view('admin.setting', compact('ruleHeaders', 'flowersDecorationRules', 'reverenceSafetyRules'));
    }
    
    public function indexReverenceSafety()
    {
        $reverenceSafeties = ReverenceSafety::all();
        return view('admin.rules.reverence_safety.index', compact('reverenceSafeties'));
    }
    
    public function indexFlowersDecoration()
    {
        $flowersDecorations = FlowersDecoration::all();
        return view('admin.rules.flowers_decoration.index', compact('flowersDecorations'));
    }    
    
    public function indexRuleHeader()
    {
        $ruleHeaders = RuleHeader::all();
        return view('admin.rules.rule_headers.index', compact('ruleHeaders'));
    }

    // Store a newly created rule header in the database
    public function storeRuleHeader(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'greetings' => 'nullable|string',
            'description' => 'required|string',
            'subdescription' => 'nullable|string',
        ]);

        RuleHeader::create($request->all());
        return redirect()->route('admin.rules_headers.index')->with('success', 'Rule Header created successfully.');
    }

    // Update the specified rule header in the database
    public function updateRuleHeader(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'greetings' => 'nullable|string',
            'description' => 'required|string',
            'subdescription' => 'nullable|string',
        ]);

        $ruleHeader = RuleHeader::findOrFail($id);
        $ruleHeader->update($request->all());
        return redirect()->route('admin.rules_headers.index')->with('success', 'Rule Header updated successfully.');
    }

    // Remove the specified rule header from the database
    public function destroyRuleHeader($id)
    {
        $ruleHeader = RuleHeader::findOrFail($id);
        $ruleHeader->delete();
        return redirect()->route('admin.rules_headers.index')->with('success', 'Rule Header deleted successfully.');
    }
    public function storeFlowersDecoration(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);
    
        FlowersDecoration::create($request->all());
    
        return redirect()->route('admin.flowers_decoration.index')->with('success', 'Rule added successfully.');
    }
    
    // Update the specified flowers and decoration rule in the database
    public function updateFlowersDecoration(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
        ]);
    
        $rule = FlowersDecoration::findOrFail($id);
        $rule->update($request->all());
    
        return redirect()->route('admin.flowers_decoration.index')->with('success', 'Rule updated successfully.');
    }
    
    // Remove the specified flowers and decoration rule from the database
    public function destroyFlowersDecoration($id)
    {
        // Hanapin ang specific record gamit ang $id
        $rule = FlowersDecoration::findOrFail($id);
    
        // I-delete ang record
        $rule->delete();
    
        // I-redirect pabalik sa listahan ng flowers decoration rules na may success message
        return redirect()->route('admin.flowers_decoration.index')->with('success', 'Flowers & Decoration Rule deleted successfully.');
    }
    


    // Store a newly created reverence and safety rule in the database
    public function storeReverenceSafety(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        ReverenceSafety::create($request->all());
        return redirect()->route('admin.reverence_safety.index')->with('success', 'Reverence & Safety Rule created successfully.');
    }

    // Update the specified reverence and safety rule in the database
    public function updateReverenceSafety(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $rule = ReverenceSafety::findOrFail($id);
        $rule->update($request->all());
        return redirect()->route('admin.reverence_safety.index')->with('success', 'Reverence & Safety Rule updated successfully.');
    }

    // Remove the specified reverence and safety rule from the database
    public function destroyReverenceSafety($id)
    {
        $rule = ReverenceSafety::findOrFail($id);
        $rule->delete();
        return redirect()->route('admin.reverence_safety.index')->with('success', 'Reverence & Safety Rule deleted successfully.');
    }
}
