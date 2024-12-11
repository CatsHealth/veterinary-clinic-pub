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
    public function adminIndex(Request $request)
    {
        // Получаем значение сортировки из запроса, по умолчанию 'asc'
        $sortDirection = $request->input('sort', 'asc');
    
        // Проверка направления сортировки
        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc'; // Устанавливаем 'asc' по умолчанию
        }
    
        // Получаем записи, отсортированные по имени
        $services = Service::orderBy('name', $sortDirection)->get();
        $doctors = Doctor::all(); // Получаем всех врачей для выпадающих списков
    
        // Возвращаем представление с данными
        return view('admin.service', compact('services', 'sortDirection', 'doctors'));
    }
    
    
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($doctors);
        $request->validate([
            'name' => 'required|string|max:100|unique:services',
            'price' => 'required|integer|min:1',
            'duration' => 'required|integer',
            'caption' => 'required|string|max:255',
            'recommendation' => 'nullable|string',
            'description' => 'nullable|string',
        ]);


        $doctors = array_filter($request->all(), fn($key) => str_starts_with($key, 'doctor_'), ARRAY_FILTER_USE_KEY);
        $doctors = array_filter($doctors);
        $doctors = array_unique($doctors);
        //Проверка на наличии врачей в таблице врачи
        $doctorsBD = Doctor::pluck('id')->toArray();
        foreach ($doctors as $key => $doc) {
            if (!in_array($doc, $doctorsBD)) {
                throw ValidationException::withMessages(["doctor_$key" => ['Такой врач больше не существует']]);
            }
        }
        $service = Service::create($request->only('name', 'price', 'duration', 'caption', 'recommendation', 'description'));
        $service->doctors()->attach($doctors);

        return back();
    }
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete(); // Мягкое удаление
        return back()->with('success', 'Услуга успешно удалена.');
    }


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'price' => 'required|numeric',
        'duration' => 'required|integer',
        'caption' => 'required|string|max:255',
        'recommendation' => 'nullable|string',
        'description' => 'nullable|string',
    ]);

    $service = Service::findOrFail($id);
    $service->update($request->all());

    return back()->with('success', 'Услуга успешно обновлена.');
}


}
