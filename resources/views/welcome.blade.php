<x-layout>

    <div class="banner">
        <div class="container">
            <div class="banner-content">
                <div class="banner-text">
                    <h1>Ветеринарная клиника</h1>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean massa. </p>
                    <button class="btn">Записаться</button>
                </div>
                <div class="banner-image">
                    <img src="{{ asset('img/banner.png') }}" alt="Veterinary Clinic">
                </div>
            </div>
        </div>
    </div>

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
                            <h3>Уникальные услуги</h3>
                            <p> Мы используем только современное оборудование и технологии для диагностики и лечения,
                                что позволяет нам обеспечивать высокий уровень медицинской помощи.</p>
                        </div>
                    </div>
                    <div class="advantages-list-item">
                        <div class="advantages-img">
                            <img src="{{ asset('img/advantages2.svg') }}" alt="advantages 2">
                        </div>
                        <div class="advantages-text">
                            <h3>Уникальные услуги</h3>
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
                            <h3>Уникальные услуги</h3>
                            <p>Каждый питомец уникален, и мы понимаем это. Мы разрабатываем индивидуальные планы лечения
                                и
                                профилактики, учитывая особенности вашего любимца.</p>
                        </div>
                    </div>
                </div>
                <div class="advantages-button">
                    <button class="advantages-button">Посмотреть все услуги</button>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <div class="services-content">
                <div class="services-text">
                    <h2>Услуги</h2>
                    <p>Общие осмотры и профилактика: Регулярные осмотры помогут выявить проблемы на ранних стадиях.</p>
                </div>
                <div class="services-list">
                    <div class="services-list-item">

                    </div>

                    <div class="services-list-item">

                    </div>

                    <div class="services-list-item">

                    </div>

                    <div class="services-list-item">

                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="values">
        <div class="container">
            <h2>Наши ценности</h2>
        </div>
        <div class="values-content">
            <div class="container">
                <div class="values-text">
                    <p>Мы искренне убеждены, что забота о животных — это не просто работа, а истинное призвание. </p>
                </div>
                <div class="values-img">
                    <img src="{{ asset('img/values.png') }}" alt="values">
                </div>

            </div>
        </div>
    </div>


    <div class="doctors">
        <div class="container">
            <h2>Врачи</h2>
        </div>
        <div class="doctors-content">
            <div class="container">
                <div class="doctors-list">
                    <div class="doctors-list-item">

                    </div>

                    <div class="doctors-list-item">

                    </div>

                    <div class="doctors-list-item">

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="recording">
        <div class="container">
            <h2>Записаться</h2>
            <div class="recording-content">
                <div class="recording-img">
                    <img src="{{ asset('img/recording.png') }}" alt="recording">
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="recording-form">
                        <div class="recording-name">
                            <label for="name" class="recording-name">Имя:</label>
                        </div>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="recording-form">
                        <div class="recording-phone">
                            <label for="phone">Номер телефона:</label>
                        </div>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="recording-form">
                        <div class="recording-date">
                            <label for="date">Дата:</label>
                        </div>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="recording-form">
                        <div class="recording-time">
                            <label for="time">Время:</label>
                        </div>
                        <input type="time" id="time" name="time" required>
                    </div>

                    <p>Внимание: После отправки ближайшее время с вами свяжется наш сотрудник для уточнения информации
                        по записи!</p>
                    <button type="submit" class="recording-btn">Записаться</button>
                </form>

            </div>
        </div>
    </div>
    

    <div class="reviews">
        <div class="container">
            <h2>Отзывы</h2>
        <div class="reviews-content">
            
                <div class="reviews-list">
                    <div class="reviews-list-item">

                    </div>

                    <div class="reviews-list-item">

                    </div>

                    <div class="reviews-list-item">

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>














</x-layout>