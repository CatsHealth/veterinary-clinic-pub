@vite(['resources/views/home/component/signUp/signUp.css'])
<section>
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
                    <button type="submit" class="btn">Записаться</button>
                </form>

            </div>
        </div>
    </div>
</section>