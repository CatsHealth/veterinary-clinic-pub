<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:serve',
            'doctor' => 'nullable|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'caption' => 'required|string|max:255',
            'recommendation' => 'nullable|string',
            'description' => 'nullable|string',
            'isactive' => 'boolean',
        ]);

        Service::create($request->all());
}
}
