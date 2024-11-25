<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'Сидоров Петр Иванович',
                'specialization' => 'Ветеринарный хирург',
                'phone' => '+79876543210'
            ],
            [
                'name' => 'Петрова Мария Сергеевна',
                'specialization' => 'Ветеринарный терапевт',
                'phone' => '+79861234567'
            ],
            [
                'name' => 'Кузнецов Алексей Викторович',
                'specialization' => 'Ветеринар-офтальмолог',
                'phone' => '+79865432109'
            ],
            [
                'name' => 'Смирнова Анна Дмитриевна',
                'specialization' => 'Ветеринарный стоматолог',
                'phone' => '+79872345678'
            ],
            [
                'name' => 'Федоров Николай Александрович',
                'specialization' => 'Ветеринарный дерматолог',
                'phone' => '+79891234567'
            ],
            [
                'name' => 'Лебедева Ольга Павловна',
                'specialization' => 'Ветеринарный кардиолог',
                'phone' => '+79883456789'
            ],
            [
                'name' => 'Григорьев Игорь Валерьевич',
                'specialization' => 'Ветеринарный невролог',
                'phone' => '+79894567890'
            ],
            [
                'name' => 'Коваленко Светлана Юрьевна',
                'specialization' => 'Ветеринарный онколог',
                'phone' => '+79887654321'
            ],
            [
                'name' => 'Тихонов Денис Сергеевич',
                'specialization' => 'Ветеринарный анестезиолог',
                'phone' => '+79876543211'
            ],
            [
                'name' => 'Морозова Наталья Владимировна',
                'specialization' => 'Ветеринарный зоолог',
                'phone' => '+79865432110'
            ]
        ];
        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
