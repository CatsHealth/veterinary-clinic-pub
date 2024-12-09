@vite(['resources/views/appointment/component/record/record.css'])
@vite(['resources/views/appointment/component/record/record.js'])


<section class="appointment-section">
    <h2 class="appointment-title">Записаться</h2>
    <form action="{{ route('store') }}" method="POST" class="appointment-form" id="appointmentForm">
        @csrf

        <div class="form-group">
            <select name="id_service" id="id_service" class="appointment-select" required
            >
                @foreach($services as $service)
                    <option value="{{ $service->id }}" @if(old('id_service') == $service->id) selected @endif>
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
                        <input onchange="showServiceChange()"  id="date_{{ $index }}" type="radio" name="date" value="{{ $date }}" required />
                        <label for="date_{{ $index }}">{{ $date }}</label>
                    </div>
                @endforeach
            </div>
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
</section>

<script>
    console.log(document.getElementById('id_service'))

    // function showServiceChange() {
    //     var selectElement = document.getElementById('id_service');
    //     var selectedOption = selectElement.options[selectElement.selectedIndex].text;
    //     alert('Вы выбрали услугу: ' + selectedOption);
    //     document.addEventListener('DOMContentLoaded', function() {
    // Привязываем функцию к событию change для выпадающего списка
    document.getElementById('id_service').addEventListener('change', showServiceChange);
    const radioButtons = document.querySelectorAll('.radio-btn');
    const radios = document.querySelectorAll('input[name="options"]');
    radios.forEach(radio => {
        radio.addEventListener('change', showServiceChange);
    });

    function showServiceChange() {
        var selectElement = document.getElementById('id_service');
        var serviceId = selectElement.value;

        // Получаем выбранную дату из радиокнопок
        var selectedDate = document.querySelector('input[name="date"]:checked');
        if (!selectedDate) {
            console.error('Дата не выбрана');
            return; // Если дата не выбрана, выходим из функции
        }
        var date = selectedDate.value;

        fetch(`/api/get-available-times?service_id=${serviceId}&date=${date}`)
            .then(response => response.json())
            .then(data => {
                var timeSelect = document.getElementById('time');
                timeSelect.innerHTML = ''; // Очищаем предыдущие опции

                data.forEach(function(time) {var option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    timeSelect.appendChild(option);
                    
                });
                console.log('Все ок');
            })
            .catch(error => console.error('Ошибка:', error));
         
    }

</script>
