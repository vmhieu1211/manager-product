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
        return view('suggest.index', compact('suggests'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('suggest.create');
    }

    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'products_name' => 'required',
            'amount' => 'required',
            'money' => 'required',
            'suggest_type' => 'required',
            'asset_type' => 'required',
            'person_suggest_id' => 'required',
            'suggest_date' => 'required',
            'status' => 'required',
            'department_suggest' => 'required'
        ]);
        $suggest = new Suggest();
        $suggest->products_name = $request->products_name;
        $suggest->amount = $request->amount;
        $suggest->money = $request->money;
        $suggest->suggest_type = $request->suggest_type;
        $suggest->asset_type = $request->asset_type;
        $suggest->person_suggest_id = $request->person_suggest_id;
        $suggest->suggest_date = $request->suggest_date;
        $suggest->status = $request->status;
        $suggest->department_suggest = $request->department_suggest;
        $suggest->save();

        return redirect()->route('suggests.index')->with('success', 'Suggest created successfully.');
    }

    public function show(Suggest $suggest)
    {
        return view('suggest.show', compact('suggest'));
    }

    public function edit(Suggest $suggest)
    {
        return view('suggest.edit', compact('suggest'));
    }

    public function update(Request $request, Suggest $suggest)
    {
        $request->validate([
            'products_name' => 'required',
            'amount' => 'required',
            'money' => 'required',
            'suggest_type' => 'required',
            'person_suggest_id' => 'required',
            'suggest_date' => 'required',
            'status' => 'required',
            'department_suggest' => 'required'
        ]);
        $suggest->products_name = $request->products_name;
        $suggest->amount = $request->amount;
        $suggest->money = $request->money;
        $suggest->suggest_type = $request->suggest_type;
        $suggest->asset_type = $request->asset_type;
        $suggest->person_suggest_id = $request->person_suggest_id;
        $suggest->suggest_date = $request->suggest_date;
        $suggest->status = $request->status;
        $suggest->department_suggest = $request->department_suggest;

        $suggest->save();
        return redirect()->route('suggests.index')->with('success', 'Suggest updated successfully.');
    }

    public function destroy(Suggest $suggest)
    {
        $suggest->delete();
        return redirect()->route('suggests.index')->with('success', 'Product deleted success');
    }
}
