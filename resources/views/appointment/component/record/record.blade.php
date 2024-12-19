@vite(['resources/views/appointment/component/record/record.css'])
@vite(['resources/views/appointment/component/record/record.js'])


<section class="appointment-section">
    <div class="container">
    <h2 class="appointment-title">Записаться</h2>
    <form action="{{ route('appointment.new') }}" method="POST" class="appointment-form" id="appointmentForm">
        @csrf

        <div class="form-group">
            <label for="service_id" class="appointment-label">Выберите услугу:</label>
            <select name="service_id" id="service_id" class="appointment-select" required>
                <option value="">-- Выберите услугу --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" @if(request()->get('service_id') == $service->id) selected @endif>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div id="selected-service"></div>

        <div class="form-group">
            <label for="date" class="appointment-label">Выберите дату:</label>
            <div class="form_radio_container" id="dateContainer">
                @foreach($dates as $index => $date)
                    <div class="form_radio_btn">
                        <input id="date_{{ $index }}" type="radio" name="date" value="{{ $date }}" required
                            class="appointment-radio" />
                        <label for="date_{{ $index }}" class="appointment-label-radio">
                            {{ $date }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="time" class="appointment-label">Время:</label>
                <select name="time" id="time" class="appointment-select" required>
                    @foreach($times as $time)
                        <option value="{{ $time }}" @if(old('time') == $time) selected @endif>{{ $time }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name" class="appointment-label">ФИО:</label>
                <input type="text" name="name" id="name" class="appointment-input" required>
            </div>

            <div class="form-group">
                <label for="phone" class="appointment-label">Номер телефона:</label>
                <input type="text" name="phone" id="phone" class="appointment-input" required>
            </div>

            <button type="submit" class="btn">Записаться</button>
    </form>
    </div>
</section>

<script>
    console.log(document.getElementById('service_id'))
    document.getElementById('service_id').addEventListener('change', showServiceChange);
    const radioButtons = document.querySelectorAll('.radio-btn');
    const radios = document.querySelectorAll('input[name="options"]');
    radios.forEach(radio => {
        radio.addEventListener('change', showServiceChange);
    });

    function showServiceChange() {
    var selectElement = document.getElementById('service_id');
    var serviceId = selectElement.value;

    var selectedDate = document.querySelector('input[name="date"]:checked');
    if (!selectedDate) {
        console.error('Дата не выбрана');
        return;
    }
    var date = selectedDate.value;

    // Передаем service_id в запрос
    fetch(`/api/get-available-times?service_id=${serviceId}&date=${date}`)
        .then(response => response.json())
        .then(data => {
            var timeSelect = document.getElementById('time');
            timeSelect.innerHTML = ''; // Очищаем предыдущие опции

            data.forEach(function (time) {
                var option = document.createElement('option');
                option.value = time;
                option.textContent = time;
                timeSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Ошибка:', error));
}



    document.addEventListener('DOMContentLoaded', function () {
        const today = new Date();
        const todayString = today.toISOString().split('T')[0]; // В формате YYYY-MM-DD
        const dateRadios = document.querySelectorAll('input[name="date"]');
        dateRadios.forEach(function (radio) {
            const date = new Date(radio.value);
            const day = date.getDay(); // Получаем день недели

            // Блокируем субботу (6) и воскресенье (0), а также прошедшие дни
            if (day === 6 || day === 0 || radio.value <= todayString) {
                radio.disabled = true; // Блокируем радиокнопку
            }
        });
    });

</script>