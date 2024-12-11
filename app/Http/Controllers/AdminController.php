<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $appointments = Appointments::all();
        return view('admin.index', compact('appointments'));
    }
    public function service()

    {$doctors = Doctor::all();
        $services = Service::all();
        return view('admin.service',compact('doctors', 'services'));

    }

    public function doctors()
    {
        $doctors = Doctor::all();
        return view('admin.doctors', compact('doctors'));
    }

    public function appointments()
    {
        $appointments = Appointments::all();
        return view('admin.appointments', compact('appointments'));
    }

}
