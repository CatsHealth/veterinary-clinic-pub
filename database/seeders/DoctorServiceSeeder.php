<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = Doctor::all();
        $services = Service::all();
        foreach ($services as $service) {
            $randomDoctor = $doctors->random(rand(1, 3));

            $service->doctors()->attach($randomDoctor);
        }
    }
}