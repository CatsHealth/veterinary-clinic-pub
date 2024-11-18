<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('admin.doctors');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:doctors',
            'specialization' => 'nullable|string',
            'phone' => 'required',
        ]);

        Doctor::create($request->all());
        return back();
    }
}
