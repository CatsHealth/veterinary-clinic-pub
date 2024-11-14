<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatsClinik</title>
</head>

<body>
    <nav> 
        <a href="{{route('app')}}">Главное</a>
        <a href="{{route('services')}}">Услуги</a>
        <a href="{{route('appointment')}}">Записаться</a>
        <a href="{{route('admin')}}">Админ</a>
    </nav>
    {{$slot}}
</body>

</html>