<x-layout>

<h1>Записаться</h1>



<form action="{{ route('store') }}" method="POST">
        @csrf
        
        <label for="service">Услуга:</label>
        <select name="service" id="service" required>
            @foreach($services as $service)
                <option value="{{ $service }}">{{ $service }}</option>
            @endforeach
        </select>
        <br>

        <label for="date">Дата:</label>
        <select name="date" id="date" required>
            @foreach($dates as $date)
                <option value="{{ $date }}">{{ $date }}</option>
            @endforeach
        </select>
        <br>

        <label for="time">Время:</label>
        <select name="time" id="time" required>
            @foreach($times as $time)
                <option value="{{ $time }}">{{ $time }}</option>
            @endforeach
        </select>
        <br>

        <label for="name">ФИО:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="phone">Номер телефона:</label>
        <input type="text" name="phone" id="phone" required>
        <br>

        <button type="submit">Записаться</button>
    </form>

</x-layout>