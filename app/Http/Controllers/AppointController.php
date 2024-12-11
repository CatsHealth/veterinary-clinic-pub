<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Appointments;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();
        $dates = $this->getAllDatesInMonth(date('m'), date('Y'));
        $times = $this->getTimeIntervals(3, Appointments::all());

        return view('appointment.appointment', compact('services', 'dates', 'times'));
    }

    // Метод для отображения списка записей в админке
    public function adminIndex(Request $request)
    {
        // Получаем значение сортировки из запроса, по умолчанию 'asc'
        $sortDirection = $request->input('sort', 'asc'); 

        // Проверка направления сортировки
        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc'; // Устанавливаем 'asc' по умолчанию
        }

        // Получаем записи, отсортированные по имени
        $appointments = Appointments::orderBy('name', $sortDirection)->get();

        // Возвращаем представление с данными
        return view('admin.index', compact('appointments', 'sortDirection')); 
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            
        ]);
    
        $appointment = Appointments::findOrFail($id);
        $appointment->update($request->all()); // Это обновит все поля, включая service_id
    
        return back()->with('success', 'Запись успешно обновлена.');
    }
    


    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'id_service' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            
        ]);

        // Создание новой записи
        Appointments::create($request->all());
        return back();
    }

    public function getAllDatesInMonth($month, $year)
    {
        // Определяем количество дней в месяце
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $dates = [];
        // $date->setDate($year, $month, 1);
        //dump($daysInMonth);
        for ($date = (new DateTime())->modify("first day of"); $date->format("m") == $month; $date->modify('+1 day')) {
            $dates[] = $date->format('Y-m-d');
        }
        // Заполняем массив датами
        //for ($day = 1; $day <= $daysInMonth; $day++) {
        //    $dates[] = sprintf('%02d.%02d',   $day,$month); // Форматируем дату
        //}

        return $dates;
    }

    public function getTimeIntervals($service_id, $date)
    {
        $service = Service::find($service_id);
        $appointments = Appointments::all()->toArray();
        $from = new DateTime('10:00:00');
        $until = new DateTime('20:00:00');
        $duration = $service ? $service->duration : 30; // Длительность услуги по умолчанию 30 минут
        $intervals = [];
    
        // Фильтруем занятые времена
        $busyTimes = array_column(
            array_filter($appointments, function($appointment) use ($date) {
                return $appointment['date'] === $date; 
            }),
            'time'
        );
    
        // Обрезаем время до нужного формата
        $busyTimes = array_map(function($time) {
            return substr($time, 0, 5); 
        }, $busyTimes);
    
        while ($from < $until) {
            $currentTime = $from->format('H:i');
            
            // Проверяем, занято ли текущее время или его интервал
            if (!in_array($currentTime, $busyTimes)) {
                $intervals[] = $currentTime; 
            }
            
            // Увеличиваем время на длxzительность
            $from->modify("+{$duration} minutes");
        }
    
        return $intervals;
    }

    public function destroy($id)
    {
        $appointment = Appointments::findOrFail($id);
        $appointment->delete(); // Мягкое удаление
        return back()->with('success', 'Запись успешно удалена.');
    }
    

    public function getAvailableTimes(Request $request)
{
    $service_id = $request->input('service_id');
    $date =$request->input('date');

    $intervals = $this->getTimeIntervals($service_id, $date);


    return response()->json($intervals);
}
    
}


