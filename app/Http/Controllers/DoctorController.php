<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');

        // Определяем порядок сортировки по умолчанию
        $orderBy = 'name'; // Поле, по которому будет происходить сортировка (например, 'name')
        $direction = 'asc';
    
        switch ($sort) {
            case 'asc':
                $orderBy = 'name'; // Сортировка по имени
                $direction = 'asc';
                break;
            case 'desc':
                $orderBy = 'name'; // Сортировка по имени
                $direction = 'desc';
                break;
            case 'newest':
                $orderBy = 'created_at'; // Сортировка по дате создания
                $direction = 'desc';
                break;
            case 'oldest':
                $orderBy = 'created_at'; // Сортировка по дате создания
                $direction = 'asc';
                break;
            default:
                $orderBy = 'name'; // Значение по умолчанию
                $direction = 'asc';
                break;
            }

        // Получаем всех врачей, отсортированных по ФИО
        $doctors = Doctor::with('user')
        ->orderBy('name', $sortDirection)
        ->get();

        return view('admin.doctors', data: compact('doctors', 'sort'));
    }
    public function update(Request $request, $id)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:100',
            'specialization' => 'required|string|max:100',
            'phone' => 'required|string|max:100',
            'login' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            // Если есть дополнительные поля, давайте их здесь добавим
        ]);
    
        $doctor = Doctor::findOrFail($id);
        
        // Обновление данных врача
        $doctor->update([
            'name' => $request->name,
            'specialization' => $request->specialization,
            'phone' => $request->phone,
            'login' => $request->login,
            'password' => $request->input('password') // Сохраняем пароль в открытом виде (не безопасно!)
        ]);
    
        return back()->with('success', 'Данные врача успешно обновлены!');
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
