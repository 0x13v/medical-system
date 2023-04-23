<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::all();
        return view('drugs.index', compact('drugs'));
    }

    public function create()
    {
        return view('drugs.create');
    }

    public function store(Request $request)
    {
        $drug = new Drug();
        $drug->name = $request->input('name');
        $drug->quantity = $request->input('quantity');
        $drug->type = $request->input('type');
        $drug->price = $request->input('price');
        $drug->save();

        return redirect()->route('drugs.index')->with('success', 'Drug created successfully.');
    }

    public function show($id)
    {
        $drug = Drug::find($id);
        return view('drugs.show', compact('drug'));
    }

    public function edit($id)
    {
        $drug = Drug::find($id);
        return view('drugs.edit', compact('drug'));
    }

    public function update(Request $request, $id)
    {
        $drug = Drug::find($id);
        $drug->name = $request->input('name');
        $drug->quantity = $request->input('quantity');
        $drug->type = $request->input('type');
        $drug->price = $request->input('price');
        $drug->save();

        return redirect()->route('drugs.index')->with('success', 'Drug updated successfully.');
    }

    public function destroy($id)
    {
        $drug = Drug::find($id);
        $drug->delete();

        return redirect()->route('drugs.index')->with('success', 'Drug deleted successfully.');
    }
}
