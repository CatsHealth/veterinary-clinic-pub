<div class="calendar">
<div id="dateContainer" class="form_radio_container">
    @foreach($dates as $index => $date)
        <div class="form_radio_btn">
            <input id="date_{{ $index }}" type="radio" name="date" value="{{ $date }}" {{ $selectedDate == $date ? 'checked' : '' }} class="appointment-radio" onchange="this.form.submit()" />
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
                <li><p>{{ $appoint->name }} - {{ $appoint->time }} - {{ $appoint->phone }}</p></li>
            @endforeach
        </ul>
    @else
        <p>Нет записей для выбранной услуги или даты.</p>
    @endif
</div>
</div>
</div>