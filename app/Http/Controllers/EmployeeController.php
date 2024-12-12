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
    {
        // Проверяем, есть ли у пользователя doctor_id
        if (!Auth::user()->doctor_id) {
            // Если нет, показываем уведомление и перенаправляем на другую страницу
            return redirect()->route('app')->with('error', 'Вы не зарегистрированы как врач');
        }
    
        // Если doctor_id есть, продолжаем выполнение
        $doctor = Doctor::findOrFail(Auth::user()->doctor_id);
        $services = $doctor->services;
    
        // Получаем выбранную услугу и дату из запроса
        $selectedServiceId = $request->input('service_id', null);
        $selectedDate = $request->input('date', null);
    
        // Получаем записи для выбранной услуги и даты
        $appoints = [];
        if ($selectedServiceId) {
            $service = Service::findOrFail($selectedServiceId);
            $appointments = $service->appointments;
    
            // Фильтруем записи по выбранной дате
            if ($selectedDate) {
                $appoints = $appointments->filter(function ($appointment) use ($selectedDate) {
                    return date('d.m', strtotime($appointment->date)) === $selectedDate;
                });
            } else {
                $appoints = $appointments;
            }
        }
    
        // Получаем все даты в текущем месяце
        $dates = $this->getAllDatesInMonth(date('m'), date('Y'));
        $dates = array_map(function ($date) {
            return date('d.m', strtotime($date));
        }, $dates);
    
        return view('doctor.index', compact('services', 'dates', 'appoints', 'selectedDate', 'selectedServiceId'));
    }
    
}
