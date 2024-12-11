<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNp12BhBc3EXC76BwKQTf7l/5y8eG4IYIlmL87v6UhbB9r9J2jHQCp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AgiA8NY9F2pDCBuJaGeTQl7LrAN2Dzt+GX5sTg2EjzUvN16P8f26fD9O4pga7" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>CatsClinik</title>



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap');
    </style>
    <!-- swiper-->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- swiper-->
    @vite(['resources/css/app.css', 'resources/css/admin.css'])
</head>
<body>
    <header>
        <div class="header_conteiner conteiner">
            <div class="row">
                <div class="logo">
                    <a href="{{ route('app') }}"><img src="{{ asset('img/logo.svg') }}" alt="Logo" /></a>
                </div>
                <nav class="nav">
                    <a href="{{ route('app') }}" @if (request()->is('/')) class="selectid" @endif>Главное</a>
                    <a href="{{ route('services') }}" @if (request()->is('services*')) class="selectid" @endif>Услуги</a>
                    <a href="{{ route('appointment') }}" @if (request()->is('appointment*')) class="selectid" @endif>Записаться</a>
                    <a href="{{ route('admin') }}" @if (request()->is('admin*')) class="selectid" @endif>Админ</a>
                </nav>
            </div>
        </div>
    </header>

    {{$slot}}
    
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
                        <p>+7 (800) 555-00-55</p>
                    </div>
                    <div class="email-box">
                        <img src="{{ asset('img/mail.svg') }}" alt="tel" />
                        <p>info@catsclinik.ru</p>
                    </div>
                    <div class="adres">
                        <img src="{{ asset('img/adres.svg') }}" alt="adres" />
                        <p>ул. Ленина, 123</p>
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

</body>
</html>