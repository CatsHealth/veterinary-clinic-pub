<?php

namespace App\Http\Controllers;

use App\Models\Appoint;
use Illuminate\Http\Request;

class AppointController extends Controller
{
    public function index()
    {$services = ['Услуга 1', 'Услуга 2', 'Услуга 3'];
        $dates = ['2023-10-01', '2023-10-02']; 
        $times = ['10:00', '11:00']; 
        return view('appointment', compact('services', 'dates', 'times'));;
    }

    public function store(Request $request){
        $request->validate([
            'service' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Создание новой записи
        Appoint::create($request->all());
    }
}
