<?php
namespace App;

use DateTime; 

trait AppointmentTrait
{
    public function getAllDatesInMonth($month, $year)
    {
        // Определяем количество дней в месяце
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $dates = [];
        
        // Запускаем цикл для всех дней в месяце
        for ($date = (new DateTime())->modify("first day of"); $date->format("m") == $month; $date->modify('+1 day')) {
            if (in_array($date->format('D'), ['Sat', 'Sun'])) {
                continue;  // Пропускаем субботу и воскресенье
            }
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }
}

