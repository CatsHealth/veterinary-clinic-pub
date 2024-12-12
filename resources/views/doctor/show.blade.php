    <div id="dateContainer" class="form_radio_container">
        @foreach($dates as $index => $date)
            <div class="form_radio_btn">
                <input id="date_{{ $index }}" type="radio" name="date" value="{{ $date }}" 
                    {{ $selectedDate == $date ? 'checked' : '' }} class="appointment-radio" onchange="this.form.submit()" />
                <label for="date_{{ $index }}" class="appointment-label-radio">
                    {{ $date }}
                </label>
            </div>
        @endforeach
    </div>
</form>

<div id="appointmentsList">
    @if($appoints && $appoints->isNotEmpty())
        <h2>Записи для услуги "{{ $services->find($selectedServiceId)->name ?? 'Все услуги' }}"</h2>
        <ul>
            @foreach($appoints as $appoint)
                <li>{{ $appoint->name }} - {{ $appoint->time }} - {{ $appoint->phone }}</li>
            @endforeach
        </ul>
    @else
        <p>Нет записей для выбранной услуги или даты.</p>
    @endif



<style>
    .flex {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    /* Стили для контейнера с записями */
    #dateContainer + div {
        margin-top: 20px;
        padding: 15px;
        border: 1px solid #e0e0e0; /* Легкая рамка вокруг блока */
        border-radius: 5px; /* Закругление углов */
        background-color: #f9f9f9; /* Светлый фон */
    }

    /* Заголовки в блоках записей */
    #dateContainer + div p {
        margin: 5px 0;
        font-size: 18px; /* Размер шрифта для заголовков */
        font-weight: bold; /* Жирный текст для заголовков */
        color: #333; /* Цвет текста */
    }

    /* Стили для второго блока с записями на выбранный день */
    #selectedDayAppointments {
        margin-top: 20px;
        padding: 15px;
        border: 1px solid #007BFF; /* Цвет рамки для второго блока */
        border-radius: 5px; /* Закругление углов */
        background-color: #e7f3ff; /* Светлый фон для второго блока */
    }

    /* Заголовки в блоке записей на выбранный день */
    #selectedDayAppointments p {
        margin: 5px 0;
        font-size: 16px; /* Размер шрифта для текста */
        color: #0056b3; /* Цвет текста для второго блока */
    }

    /* Стили для времени и ФИО в записях на выбранный день */
    #appointmentsList p {
        font-size: 14px; /* Размер шрифта для времени и ФИО */
        color: #555; /* Цвет текста для времени и ФИО */
    }

    .form_radio_container {
        display: flex;
        flex-wrap: wrap;
        max-width: 400px;
        gap: 10px;
    }

    .form_radio_btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 60px; /* Ширина каждой кнопки */
        height: 60px; /* Высота каждой кнопки */
        border: 2px solid #007bff; /* Цвет рамки */
        border-radius: 10px; /* Закругление углов */
        background-color: #f8f9fa; /* Цвет фона */
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s; /* Анимация при наведении */
    }

    .form_radio_btn:hover {
        background-color: #e9ecef; /* Цвет фона при наведении */
        transform: scale(1.05); /* Увеличение при наведении */
    }

    .appointment-radio {
        display: none; /* Скрываем стандартный радио-инпут */
    }

    .appointment-label-radio {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        font-size: 14px; /* Размер шрифта */
    }

    .appointment-radio:checked + .appointment-label-radio {
        background-color: #007bff; /* Цвет фона для выбранного состояния */
        color: white; /* Цвет текста для выбранного состояния */
    }
</style>
