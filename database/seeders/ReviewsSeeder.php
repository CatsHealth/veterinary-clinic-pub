<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Review; 

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        $reviews = [
            [
                'name' => 'Иванов Иван',
                'text' => 'Очень доволен вашей работой! Обслуживание было быстрым и профессиональным. Ветеринар тщательно осмотрел моего питомца, поставил точный диагноз и объяснил всё доступным языком.',
                'photo' => null, // при необходимости указать путь к фото
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Петрова Анна',
                'text' => 'Отличное качество услуг и вежливый персонал. Оказание услуг в доступных ценах. Очень рада, что нашла данную ветеринарную клинику. Буду рекомендовать вас друзьям!',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Кузнецов Артем',
                'text' => 'Я в восторге от вашей клиники! Врачи очень внимательные и заботливые. Мой песик был успокоен и даже не заметил, как прошло лечение. Ответили на все вопросы, и даже после визита я получил рекомендации по уходу. Большое спасибо!',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Сидорова Василиса',
                'text' => 'К сожалению, у меня не самый лучший опыт с вашей клиникой. Хотя ветеринар был профессионален, я столкнулся с проблемами на этапе записи. В итоге я ждал более часа, хотя у меня была запись. Надеюсь, что в будущем это улучшится, потому что качество услуг в целом неплохое.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Петров Виталий',
                'text' => 'В целом, я довольно сервисом. Обслуживание было быстрым и качественным, но пару моментов можно было бы улучшить. Ветеринар ответил на все мои вопросы, но не так подробно, как я надеялась.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Иванова Мария',
                'text' => 'К сожалению, я осталась разочарована сервисом. Обслуживание было медленным, но ветеринар провел тщательный осмотр моего питомца. Но медсестра перепутала анализы, хорошо, что хотя бы выяснили все вовремя.',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}