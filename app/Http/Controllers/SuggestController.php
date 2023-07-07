<?php

namespace App\Http\Controllers;
use App\Models\ProductType;
use App\Models\Suggest;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    public function index()
    {
        $suggests = Suggest::all();
        return view('suggest.index', compact('suggests'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function create()
    {
        return view('suggest.create');
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'product_id' => 'required',
            'suggest_type' => 'required',
            'suggest_date' => 'required',
            'person_suggest_id' => 'required',
            'state' => 'required', 
        ]);

        // Create a new suggest
        $suggest = Suggest::create($validatedData);
    
        // Redirect to suggest index page
        return redirect()->route('suggest.index')->with('success', 'Suggest created successfully.');
    }

    public function show($id)
    {
        $suggest = Suggest::findOrFail($id);
        return view('suggest.show', compact('suggest'));
    }

    public function edit($id)
    {
        $suggest = Suggest::findOrFail($id);
        return view('suggest.edit', compact('suggest'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'suggest_type' => 'required',
            'suggest_date' => 'required',
            'person_suggest_id' => 'required',
            'state' => 'required',
        ]);

        $suggest = Suggest::findOrFail($id);
        $suggest->update($validatedData);

        return redirect()->route('suggest.index')->with('success', 'Suggest updated successfully.');
    }

    public function destroy($id)
    {
        $suggest = Suggest::findOrFail($id);

        $suggest->delete();

        return redirect()->route('suggest.index')->with('success', 'Suggest deleted successfully.');
    }
}
