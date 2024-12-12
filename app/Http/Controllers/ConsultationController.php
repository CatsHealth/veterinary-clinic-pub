<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        // Получаем все консультации из базы данных
        $consultations = Consultation::all();

        // Передаем данные в представление
        return view('admin.consultations', compact('consultations'));
    }
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Сохранение данных в БД
        Consultation::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        // Перенаправление с сообщением об успехе
        return redirect()->back()->with('success', 'Ваша заявка успешно отправлена!');
    }
    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('admin.consultation', compact('consultation'));
    }
    public function softDelete($id) {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete(); // Это мягкое удаление
        return redirect()->back()->with('success', 'Консультация подтверждена.');
    }
    
    public function destroy($id) {
        $consultation = Consultation::withTrashed()->findOrFail($id);
        $consultation->forceDelete(); // Это жесткое удаление
        return redirect()->back()->with('success', 'Консультация удалена.');
    }

}