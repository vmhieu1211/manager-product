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
            'amount'=>'required',
            'money'=>'required',
            'suggest_type' => 'required',
            'suggest_date' => 'required',
            'status' => 'required', 
        ]);
        $suggest = new Suggest();
        $suggest->products_name =$request->products_name;
        $suggest->amount =$request->amount;
        $suggest->money =$request->money;
        $suggest->suggest_type =$request->suggest_type;
        $suggest->suggest_date =$request->suggest_date;
        $suggest->status =$request->status;
        $suggest->save();    
 
        return redirect()->route('suggest.index')->with('success', 'Suggest created successfully.');
    }

    public function show(Suggest $suggest)
    {
        return view('suggest.show', compact('suggest'));
    }

    public function edit(Suggest $suggest)
    {
        return view('suggest.edit', compact('suggest'));
    }

    public function update(Request $request, $id)
    {  $request->validate([
            'products_name' => 'required',
            'amount'=>'required',
            'money'=>'required',
            'suggest_type' => 'required',
            'suggest_date' => 'required',
            'status' => 'required', 
        ]);

        $suggest = new Suggest(); 
        $suggest->products_name = $request->products_name; 
        $suggest->amount = $request->amount; 
        $suggest->money = $request->money; 
        $suggest->suggest_type = $request->suggest_type; 
        $suggest->suggest_date = $request->suggest_date; 
        $suggest->status = $request->status; 
        $suggest->save();

        return redirect()->route('suggest.index')->with('success', 'Suggest updated successfully.');
    }

    public function destroy(Suggest $suggest)
    {
        $suggest->delete();
        return redirect()->route('suggest.index')->with('success', 'Product deleted success');
    }
}
