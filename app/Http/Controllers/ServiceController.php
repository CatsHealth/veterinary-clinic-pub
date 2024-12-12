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
        $query = Service::query();

        // Фильтр по врачу
        if ($request->filled('doctor_id')) {
            $doctorId = $request->input('doctor_id');
            $query->whereHas('doctors', function ($subQuery) use ($doctorId) {
                $subQuery->where('doctors.id', $doctorId); 
            });
        }
    
        $sort = $request->input('sort');
        
        $orderBy = 'name'; 
        $direction = 'asc'; 
    
        switch ($sort) {
            case 'asc':
                $direction = 'asc';
                break;
            case 'desc':
                $direction = 'desc';
                break;
            case 'newest':
                $orderBy = 'created_at'; 
                $direction = 'desc'; // скорректировано на 'desc' для "новейших"
                break;
            case 'oldest':
                $orderBy = 'created_at'; 
                $direction = 'asc'; // скорректировано на 'asc' для "самых старых"
                break;
            default:
                $direction = 'asc'; 
                break;
        }
    
        // Применение сортировки к запросу
        $services = $query->orderBy($orderBy, $direction)->get();
        $doctors = Doctor::all();
    
        // Возвращаем представление с данными
        return view('admin.service', compact('services', 'direction', 'doctors'));
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
            'filename' =>'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        // Загрузка файла
        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $extension = $file->getClientOriginalExtension(); // Получаем оригинальное расширение
            $timestamp = time();
            $filename = 'Clinik_'. $timestamp. '.'.  $extension;
            $file->move(public_path() . '/path', $filename); // Сохраняем с правильным расширением
        }


       
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
        $serviceData = array_merge($request->only('name', 'price', 'duration', 'caption', 'recommendation', 'description'), ['filename' => $filename]);
        $service = Service::create($serviceData);
        // Привязываем врачей к сервису
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
    // Валидируем данные запроса
    $request->validate([
        'name' => 'required|string|max:100',
        'price' => 'required|numeric',
        'duration' => 'required|integer',
        'caption' => 'required|string|max:255',
        'recommendation' => 'nullable|string',
        'description' => 'nullable|string',
        'doctor_1' => 'nullable|exists:doctors,id',
        'doctor_2' => 'nullable|exists:doctors,id',
        'doctor_3' => 'nullable|exists:doctors,id',
        'filename' => 'nullable|image|mimes:jpeg,png,jpg,gif', // для нового изображения
    ]);
    
    // Находим услугу по ID
    $service = Service::findOrFail($id);
    
    // Обновляем данные сервиса
    $service->update($request->only('name', 'price', 'duration', 'caption', 'recommendation', 'description'));
    
    // Обновляем связанные врачи
    // Получаем значения врачей из полей doctor_1, doctor_2, doctor_3
    $doctors = [];
    if ($request->filled('doctor_1')) {
        $doctors[] = $request->input('doctor_1');
    }
    if ($request->filled('doctor_2')) {
        $doctors[] = $request->input('doctor_2');
    }
    if ($request->filled('doctor_3')) {
        $doctors[] = $request->input('doctor_3');
    }

    // Синхронизируем врачей
    $service->doctors()->sync($doctors);

    // Если есть новый файл изображения, то загружаем его
    if ($request->hasFile('filename')) {
        // Удаляем старое изображение
        if ($service->filename) {
            $oldFilePath = public_path('path/' . $service->filename);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath); // Удаляем старое изображение
            }
        }

        // Загружаем новое изображение
        $file = $request->file('filename');
        $extension = $file->getClientOriginalExtension(); // Получаем оригинальное расширение
        $timestamp = time();
        $filename = 'Clinik_' . $timestamp . '.' . $extension;
        $file->move(public_path('path'), $filename); // Сохраняем с правильным расширением

        // Обновляем имя файла в базе данных
        $service->update(['filename' => $filename]);
    }

    // Возвращаем ответ с сообщением об успешном обновлении
    return back()->with('success', 'Услуга успешно обновлена.');
}


    


}
