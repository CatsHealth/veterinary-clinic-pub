<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
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
        $doctors = Doctor::with('user')
        ->orderBy('name', $sortDirection)
        ->get();
        
        return view('admin.doctors', data: compact('doctors', 'sortDirection'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:doctors',
            'specialization' => 'nullable|string',
            'phone' => 'required',
        ]);
            // Создаем нового доктора
          $doctor = Doctor::create([
                'name' => $request->name,
                'specialization' => $request->specialization,
                'phone' => $request->phone,
                'login' => $request->login,
                'password' => bcrypt($request->password), // Шифруем пароль
                'is_active' => true, // или любое другое значение по умолчанию
            ]);
            
    $doctor = Doctor::where('phone', $request->phone)->first();
    User::create([
        'name' => $doctor->name,
        'email' => $request->login, 
        'password' => bcrypt($request->password),
        'doctor_id' => $doctor->id,
    ]);
    
        return back()->with('success', 'Доктор и пользовательский аккаунт успешно созданы');
    }
    

    public function destroy($id)
{
    $doctor = Doctor::findOrFail($id);
    $user = User::where('doctor_id', $doctor->id)->first();
    if ($user) {
        $user->delete(); 
    }
    $doctor->delete(); 
    return back()->with('success', 'Доктор и его пользовательский аккаунт успешно удалены.');
}

    
}
