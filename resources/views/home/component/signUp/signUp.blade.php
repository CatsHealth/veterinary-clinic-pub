@vite(['resources/views/home/component/signUp/signUp.css'])
<section>
    <div class="recording">
        <div class="container">
            <h2>Консультация</h2>
            <div class="recording-content">
                <div class="recording-paws">
                    <img src="{{ asset('img/paws.png') }}" alt="Veterinary Clinic">
                </div>
                <div class="recording-img">
                    <img src="{{ asset('img/recording.png') }}" alt="recording">
                </div>
                <form action="{{ route('consultation.store') }}" method="POST"> <!-- Укажите маршрут -->
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
                    <p>Уже знаете к кому хотите записаться? Переходите на полную запись и выбирайте нужное время и день!</p>
                    <p>Если хотите получить консультации, то оставьте заявку здесь. Мы перезвоним вам в ближайшее время!</p>
                    <button type="submit" class="btn">Записаться</button>
                </form>
            </div>
        </div>
    </div>
</section>
