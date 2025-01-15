<?php

namespace App\Http\Controllers;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::all(); // Fetch all rules from the database
        return view('user.rules.index', compact('rules')); // Pass the rules to the view
    }

    public function create()
    {
        // Show form to create a new rule
        return view('user.rules.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new rule
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Store the new rule in the database (assuming you have a Rule model)
        // Rule::create($request->all());

        return redirect()->route('rules.index')->with('success', 'Rule created successfully.');
    }

    public function show($id)
    {
        // Show a single rule
        // $rule = Rule::findOrFail($id);
        // return view('user.rules.show', compact('rule'));

        return view('user.rules.show'); // Modify as needed
    }

    public function edit($id)
    {
        // Show form to edit an existing rule
        // $rule = Rule::findOrFail($id);
        // return view('user.rules.edit', compact('rule'));

        return view('user.rules.edit'); // Modify as needed
    }

    public function update(Request $request, $id)
    {
        // Validate and update an existing rule
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // $rule = Rule::findOrFail($id);
        // $rule->update($request->all());

        return redirect()->route('rules.index')->with('success', 'Rule updated successfully.');
    }

    public function destroy($id)
    {
        // Delete a rule
        // $rule = Rule::findOrFail($id);
        // $rule->delete();

        return redirect()->route('rules.index')->with('success', 'Rule deleted successfully.');
    }
}
