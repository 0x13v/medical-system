<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->password = bcrypt($request->input('password'));
        $user->date_of_birth = $request->input('date_of_birth');
        $user->image = $request->input('image');
        $user->phone_number = $request->input('phone_number');
        $user->national_id = $request->input('national_id');
        $user->area_id = $request->input('area_id');
        $user->street_name = $request->input('street_name');
        $user->building_number = $request->input('building_number');
        $user->floor_number = $request->input('floor_number');
        $user->flat_number = $request->input('flat_number');
        $user->is_main = $request->input('is_main');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->image = $request->input('image');
        $user->phone_number = $request->input('phone_number');
        $user->national_id = $request->input('national_id');
        $user->area_id = $request->input('area_id');
        $user->street_name = $request->input('street_name');
        $user->building_number = $request->input('building_number');
        $user->floor_number = $request->input('floor_number');
        $user->flat_number = $request->input('flat_number');
        $user->is_main = $request->input('is_main');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
