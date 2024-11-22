@vite(['resources/views/appointment/component/record/record.css'])
@vite(['resources/views/appointment/component/record/record.js'])

<section class="appointment-section">
    <h2 class="appointment-title">Записаться</h2>
    <form action="{{ route('store') }}" method="POST" class="appointment-form">
        @csrf

        <div class="form-group">
            <label for="service" class="appointment-label">Услуга:</label>
            <select name="id_service" id="id_service" class="appointment-select" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date" class="appointment-label">Выберите дату:</label>
            <div class="form_radio_container">
                @foreach($dates as $index => $date)
                    <div class="form_radio_btn">
                        <input id="date_{{ $index }}" type="radio" name="date" value="{{ $date }}" />
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

        <button type="submit" class="appointment-submit-btn">Записаться</button>
    </form>
</section>
