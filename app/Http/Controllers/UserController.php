<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('users.index', compact('data'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        User::create($validated);
        return back();
    }

    public function edit($id){
        $data = User::find($id);
        return view('users.edit', compact('data'));
    }

    public function update(UpdateUserRequest $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return back();
    }
}
