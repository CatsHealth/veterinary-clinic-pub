<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use App\AppointmentTrait;
use Illuminate\Support\Facades\Auth;
class EmployeeController extends Controller
{
    use AppointmentTrait;

    public function index(Request $request)
    {   $doctor = Doctor::findOrFail(Auth::user()->doctor_id);   
        $services = $doctor->services;
        dd($services->pluck('name'));
        $dates = $this->getAllDatesInMonth(date('m'), date('Y'));

        return view('doctor.index', compact('services', 'dates' ));
    }
}
