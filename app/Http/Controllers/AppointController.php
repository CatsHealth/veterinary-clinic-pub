<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Appointments;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $dates = $this->getAllDatesInMonth( date('m'),date('Y'));
        $times = ['10:00', '11:00'];

        return view('appointment', compact('services', 'dates', 'times'));
        ;
    }

    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required|string',
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
        dump($daysInMonth);
        for ($date = (new DateTime())->modify("first day of"); $date->format("m") == $month; $date->modify('+1 day')) {
            $dates[] = $date->format('Y-m-d');
        }
        

        // Заполняем массив датами
        //for ($day = 1; $day <= $daysInMonth; $day++) {
        //    $dates[] = sprintf('%02d.%02d',   $day,$month); // Форматируем дату
        //}

        return $dates;
    }

}
