<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }
    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $doctor = new Doctor();
        $doctor->email = $request->input('email');
        $doctor->name = $request->input('name');
        $doctor->password = $request->input('password');
        $doctor->national_id = $request->input('national_id');
        $doctor->image = $request->input('image');
        $doctor->is_banned = $request->input('is_banned');
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->email = $request->input('email');
        $doctor->name = $request->input('name');
        $doctor->password = $request->input('password');
        $doctor->national_id = $request->input('national_id');
        $doctor->image = $request->input('image');
        $doctor->is_banned = $request->input('is_banned');
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
