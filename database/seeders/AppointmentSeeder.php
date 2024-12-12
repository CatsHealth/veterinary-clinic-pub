<?php

namespace Database\Seeders;

use App\Models\Appointments;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceIds = Service::all()->pluck("id")->toArray();
        $fixedNames = ['Иван', 'Мария', 'Петр', 'Анна', 'Сергей'];
        $fixedPhones = ['1234567890', '0987654321', '1122334455', '5566778899', '9988776655'];
        $apoints=[
            [],
        ];
        
        for ($i = 0; $i < 5; $i++) {
            Appointments::create([
                'service_id' => $serviceIds[array_rand($serviceIds)], 
                'date' => now()->addDays(rand(1, 30)), 
                'time' => now()->addHours(rand(1, 12))->format('H:i'), 
                'name' => $fixedNames[$i], 
                'phone' => $fixedPhones[$i], 
            ]);
    }
}}
