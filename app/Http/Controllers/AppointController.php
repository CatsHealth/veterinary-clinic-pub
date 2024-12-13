<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Appointments;
use App\Models\Service;
use Illuminate\Http\Request;
use App\AppointmentTrait;

class AppointController extends Controller
{  
    use AppointmentTrait;
    public function index(Request $request)
    {
    
        $services = Service::all();
        $defaultServiceId = $services->first() ? $services->first()->id : null;
        $dates = $this->getAllDatesInMonth(date('m'), date('Y'));
        $times = $this->getTimeIntervals( $defaultServiceId , Appointments::all());

        return view('appointment.appointment', compact('services', 'dates', 'times'));
    }

 
    public function adminIndex(Request $request)
    {
        $sort = $request->input('sort');

        // Определяем порядок сортировки по умолчанию
        $orderBy = 'name'; // Поле, по которому будет происходить сортировка (например, 'name')
        $direction = 'asc'; // Направление сортировки по умолчанию

        // Устанавливаем параметры сортировки в зависимости от значения sort
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

        // Получаем данные с учетом сортировки
        $appointments = Appointments::orderBy($orderBy, $direction)->get();

        // Возвращаем представление с данными
        return view('admin.index', compact('appointments', 'sort'));
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
            'service_id' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            
        ]);

        // Создание новой записи
        Appointments::create($request->all());
        
        return redirect()->back();  }

    
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

    
    

    public function getAvailableTimes(Request $request)
{
    $service_id = $request->input('service_id');
    $date =$request->input('date');

    $intervals = $this->getTimeIntervals($service_id, $date);


    return response()->json($intervals);
}

public function destroy($id)
    {
        $appointment = Appointments::findOrFail($id);
        $appointment->delete(); // Мягкое удаление
        return back()->with('success', 'Запись успешно удалена.');
    }
    
}


