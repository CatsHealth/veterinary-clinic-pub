@vite(['resources/js/doctorSelector.js',])
<div class="form-group service-doctor">
    <div id="doctor-blocks-container">
        <label for="doctor_1">Доктор:</label>
        <select id="doctor_1" name="doctor_1" class="service-doctor-select">
            <option value="0">Выберите врача</option>
            @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}" @if (old('doctor_1') == $doctor->id) selected @endif>
                    {{ $doctor->name }}</option>
            @endforeach
        </select>
        @error('doctor_1')
        @enderror
    </div>
    <button type="button" class="btn" id="add-doctor-button">Добавить</button>
</div>
