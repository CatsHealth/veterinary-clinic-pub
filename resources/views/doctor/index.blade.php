<x-layout>
<p>Расписание</p>


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



</x-layout>