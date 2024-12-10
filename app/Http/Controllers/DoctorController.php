<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $sortDirection = $request->input('sort', 'asc'); // Получаем значение сортировки, по умолчанию 'asc'
        
        // Убедитесь, что направление сортировки корректное
        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc'; // Устанавливаем 'asc' по умолчанию
        }

        // Получаем всех врачей, отсортированных по ФИО
        $doctors = Doctor::orderBy('name', $sortDirection)->get();
        
        return view('admin.doctors', data: compact('doctors', 'sortDirection'));
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
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete(); // Мягкое удаление
        return back()->with('success', 'Доктор успешно удалён.');
    }
    
}
