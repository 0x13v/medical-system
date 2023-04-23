<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $area = new Area();
        $area->name = $request->input('name');
        $area->address = $request->input('address');
        $area->save();

        return redirect()->route('areas.index')->with('success', 'Area created successfully.');
    }

    public function show($id)
    {
        $area = Area::find($id);
        return view('areas.show', compact('area'));
    }

    public function edit($id)
    {
        $area = Area::find($id);
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $area->name = $request->input('name');
        $area->address = $request->input('address');
        $area->save();

        return redirect()->route('areas.index')->with('success', 'Area updated successfully.');
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Area deleted successfully.');
    }
}
