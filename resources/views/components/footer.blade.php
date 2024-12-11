<footer>
    <div class="container">
        <div class="footer-content">
            <div class="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Acedf0aea8be923fd339b5e3f01db97b4c78706e1a6be5090bcb4b0518a596f40&amp;width=430&amp;height=270&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
            <div class="footer-info">
                <h3>Контакты</h3>
                <div class="tel">
                    <img src="{{ asset('img/tel.svg') }}" alt="tel" />
                    <a href="tel">+7 (800) 555-00-55</a>
                </div>
                <div class="email-box">
                    <img src="{{ asset('img/mail.svg') }}" alt="tel" />
                    <a href="email">info@catsclinik.ru</a>
                </div>
                <div class="adres">
                    <img src="{{ asset('img/adres.svg') }}" alt="adres" />
                    <a href="adres">ул. Ленина, 123</a>
                </div>
            </div>
            <nav class="footer-nav">
                <a href="{{route('app')}}">Главное</a>
                <a href="{{route('services')}}">Услуги</a>
                <a href="{{route('appointment')}}">Записаться</a>
                <a href="{{route('admin')}}">Админ</a>
            </nav>
        </div>
        <div class="copyright">
            <p>2024 CatsClinik</p>
        </div>
    </div>
</footer>