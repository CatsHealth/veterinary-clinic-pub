<x-layout>
    <h1>Записаться</h1>
</x-layout>

<form action="{{ route('store') }}" method="POST">
    @csrf

    <label for="service">Услуга:</label>
    <select name="service" id="service" required>
        @foreach($services as $service)
            <option value="{{ $service->name }}">{{ $service->name }}</option>
        @endforeach
    </select>

    <br>

    <h1>Выберите дату</h1>
            @foreach($dates as $date)
            <input type="radio" id="date" name="date" value="{{ $date }}" />
    <label for={{ $date }}>{{ $date }}</label>
            @endforeach
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

<script>
    $(document).on('click', '.select-date', function () {
        var selectedDate = $(this).data('date');
        $('#selected_date').val(selectedDate);
        $('#date-form').show();
    });
</script>