@vite(['resources/views/home/component/aboutUs/aboutUs.css'])
<section>
    <div class="advantages">
        <div class="container">
            <div class="advantages-content">
                <div class="advantages-text">
                    <h2>Почему выбирают нас</h2>
                </div>
                <div class="advantages-list">
                    <div class="advantages-list-item">
                        <div class="advantages-img">
                            <img src="{{ asset('img/advantages1.svg') }}" alt="advantages 1">
                        </div>
                        <div class="advantages-text">
                            <h3>Профессионализм и опыт</h3>
                            <p> Наша команда состоит из квалифицированных ветеринаров с многолетним опытом работы. Мы постоянно обновляем свои знания, чтобы быть в курсе последних достижений в области ветеринарии.
                            </p>
                        </div>
                    </div>
                    <div class="advantages-list-item">
                        <div class="advantages-img">
                            <img src="{{ asset('img/advantages2.svg') }}" alt="advantages 2">
                        </div>
                        <div class="advantages-text">
                            <h3>Современное оборудование</h3>
                            <p> Мы используем только современное оборудование и технологии для диагностики и лечения,
                                что позволяет нам обеспечивать высокий уровень медицинской помощи.
                            </p>
                        </div>
                    </div>
                    <div class="advantages-list-item">
                        <div class="advantages-img">
                            <img src="{{ asset('img/advantages3.svg') }}" alt="advantages 3">
                        </div>
                        <div class="advantages-text">
                            <h3>Индивидуальный подход</h3>
                            <p>Каждый питомец уникален, и мы понимаем это. Мы разрабатываем индивидуальные планы лечения
                                и
                                профилактики, учитывая особенности вашего любимца.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>