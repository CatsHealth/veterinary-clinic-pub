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
                'phone' => '+79876543210',
                'login' => 'СиП123', 
                'password' => '456789'
            ],
            [
                'name' => 'Петрова Мария Сергеевна',
                'specialization' => 'Ветеринарный терапевт',
                'phone' => '+79861234567',
                'login' => 'ПеМ234',
                'password' => '321654'
            ],
            [
                'name' => 'Кузнецов Алексей Викторович',
                'specialization' => 'Ветеринар-офтальмолог',
                'phone' => '+79865432109',
                'login' => 'КуА345',
                'password' => '987123'
            ],
            [
                'name' => 'Смирнова Анна Дмитриевна',
                'specialization' => 'Ветеринарный стоматолог',
                'phone' => '+79872345678',
                'login' => 'СмА456',
                'password' => '654789'
            ],
            [
                'name' => 'Федоров Николай Александрович',
                'specialization' => 'Ветеринарный дерматолог',
                'phone' => '+79891234567',
                'login' => 'ФеН567',
                'password' => '321789'
            ],
            [
                'name' => 'Лебедева Ольга Павловна',
                'specialization' => 'Ветеринарный кардиолог',
                'phone' => '+79883456789',
                'login' => 'ЛеП678',
                'password' => '456123'
            ],
            [
                'name' => 'Григорьев Игорь Валерьевич',
                'specialization' => 'Ветеринарный невролог',
                'phone' => '+79894567890',
                'login' => 'ГрИ789',
                'password' => '789456'
            ],
            [
                'name' => 'Коваленко Светлана Юрьевна',
                'specialization' => 'Ветеринарный онколог',
                'phone' => '+79887654321',
                'login' => 'КоС890',
                'password' => '321098'
            ],
            [
                'name' => 'Тихонов Денис Сергеевич',
                'specialization' => 'Ветеринарный анестезиолог',
                'phone' => '+79876543211',
                'login' => 'ТиД901',
                'password' => '654321'
            ],
            [
                'name' => 'Морозова Наталья Владимировна',
                'specialization' => 'Ветеринарный зоолог',
                'phone' => '+79865432110',
                'login' => 'МоН012',
                'password' => '789321'
            ]
        ];
        
        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
