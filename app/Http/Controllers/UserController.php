<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $input = $request->all();
        $user = User::create($input);
        return redirect()->route('users.index')->with('success, User Create success');
    }

    public function show (User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $user = User::find($user->id);
        return view('user.edit',compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $input = $request->all();
        if(empty($input['password']))
        {
            $input = Arr::except($input,['password']);
        }
        $user = User::find($id);
        $user->update($input);
        return redirect()->route('users.index')->with('success', 'User updated success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'user deleted successfully');
    }
}
