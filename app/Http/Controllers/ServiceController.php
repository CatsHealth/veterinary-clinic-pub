<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {   $services = Service::all();
        return view('services.index', compact('services'));
    }
    public function show($id)
    {   $service = Service::find($id);
        return view('services.show', compact('service'));
    }
    public function store(Request $request)
    {
        // Валидация входящих данных
        $request->validate([
            'name' => 'required|string|max:100|unique:services',
            'price' => 'required|integer|min:1',
            'duration' => 'required|integer',
            'caption' => 'required|string|max:255',
            'recommendation' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
    
        // Загрузка файла
        


        // Получаем список врачей из запроса
        $doctors = array_filter($request->all(), fn($key) => str_starts_with($key, 'doctor_'), ARRAY_FILTER_USE_KEY);
        $doctors = array_filter($doctors);
        $doctors = array_unique($doctors);
    
        // Проверка на наличие врачей в таблице врачи
        $doctorsBD = Doctor::pluck('id')->toArray();
        foreach ($doctors as $key => $doc) {
            if (!in_array($doc, $doctorsBD)) {
                throw ValidationException::withMessages(["doctor_$key" => ['Такой врач больше не существует']]);
            }
        }
    
        // Создание записи сервиса
        $serviceData = $request->only('name', 'price', 'duration', 'caption', 'recommendation', 'description');

        $service = Service::create($serviceData);
        
        // Привязываем врачей к сервису
        $service->doctors()->attach($doctors);
    
        return back();
    }
    
}
