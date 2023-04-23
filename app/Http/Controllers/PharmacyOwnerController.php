<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PharmacyOwner;

class PharmacyOwnerController extends Controller
{
    public function index()
    {
        $pharmacyOwners = PharmacyOwner::all();
        return view('pharmacyOwners.index',compact('pharmacyOwner'));
    }
    public function create()
{
    return view('pharmacyOwners.create');
}

public function store(Request $request)
{
    $pharmacyOwner = new PharmacyOwner();
    $pharmacyOwner->email = $request->input('email');
    $pharmacyOwner->name = $request->input('name');
    $pharmacyOwner->password = $request->input('password');
    $pharmacyOwner->national_id = $request->input('national_id');
    $pharmacyOwner->image = $request->input('image');
    $pharmacyOwner->save();

    return redirect()->route('pharmacyOwners.index')->with('success', 'Pharmacy Owner created successfully.');
}

public function show($id)
{
    $pharmacyOwner = PharmacyOwner::find($id);
    return view('pharmacyOwners.show', compact('pharmacyOwner'));
}

public function edit($id)
{
    $pharmacyOwner = PharmacyOwner::find($id);
    return view('pharmacyOwners.edit', compact('pharmacyOwner'));
}

public function update(Request $request, $id)
{
    $pharmacyOwner = PharmacyOwner::find($id);
    $pharmacyOwner->email = $request->input('email');
    $pharmacyOwner->name = $request->input('name');
    $pharmacyOwner->password = $request->input('password');
    $pharmacyOwner->national_id = $request->input('national_id');
    $pharmacyOwner->image = $request->input('image');
    $pharmacyOwner->save();

    return redirect()->route('pharmacyOwners.index')->with('success', 'Pharmacy Owner updated successfully.');
}

public function destroy($id)
{
    $pharmacyOwner = PharmacyOwner::find($id);
    $pharmacyOwner->delete();

    return redirect()->route('pharmacyOwners.index')->with('success', 'Pharmacy Owner deleted successfully.');
}
}
