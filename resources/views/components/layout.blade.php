<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>CatsClinik</title>
</head>

<>
    <nav> 
        <a href="{{route('app')}}">Главное</a>
        <a href="{{route('services')}}">Услуги</a>
        <a href="{{route('appointment')}}">Записаться</a>
        <a href="{{route('admin')}}">Админ</a>
    </nav>
    {{$slot}}
    <footer>
    </footer>
</body>

</html>