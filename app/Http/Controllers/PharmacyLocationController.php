<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PharmacyLocation;

class PharmacyLocationController extends Controller
{
    public function index()
    {
        $pharmacyLocations = PharmacyLocation::all();
        return view('pharmacyLocations.index', compact('pharmacyLocations'));
    }

    public function create()
    {
        return view('pharmacyLocations.create');
    }

    public function store(Request $request)
    {
        $pharmacyLocation = new PharmacyLocation();
        $pharmacyLocation->area_id = $request->input('area_id');
        $pharmacyLocation->priority = $request->input('priority');
        $pharmacyLocation->save();

        return redirect()->route('pharmacyLocations.index')->with('success', 'Pharmacy Location created successfully.');
    }

    public function show($id)
    {
        $pharmacyLocation = PharmacyLocation::find($id);
        return view('pharmacyLocations.show', compact('pharmacyLocation'));
    }

    public function edit($id)
    {
        $pharmacyLocation = PharmacyLocation::find($id);
        return view('pharmacyLocations.edit', compact('pharmacyLocation'));
    }

    public function update(Request $request, $id)
    {
        $pharmacyLocation = PharmacyLocation::find($id);
        $pharmacyLocation->area_id = $request->input('area_id');
        $pharmacyLocation->priority = $request->input('priority');
        $pharmacyLocation->save();

        return redirect()->route('pharmacyLocations.index')->with('success', 'Pharmacy Location updated successfully.');
    }

    public function destroy($id)
    {
        $pharmacyLocation = PharmacyLocation::find($id);
        $pharmacyLocation->delete();

        return redirect()->route('pharmacyLocations.index')->with('success', 'Pharmacy Location deleted successfully.');
    }
}
