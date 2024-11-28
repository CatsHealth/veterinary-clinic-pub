<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function service()
    {
        $doctors = Doctor::all();
        return view('admin.service',compact('doctors'));
    }

    public function doctors()
    {
        $doctors = Doctor::all();
        return view('admin.doctors', compact('doctors'));
    }

    

}
