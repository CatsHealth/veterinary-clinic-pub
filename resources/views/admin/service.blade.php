<x-layout>
    <x-admin>
        <form class="service-form" action="{{ route('service.store') }}" method="POST">
            @csrf

            <div class="form-group service-name">
                <label for="name">Название:</label>
                <input type="text" id="name" name="name" class="service-name-input" required maxlength="100" value="{{ old('name') }}" placeholder="Введите название услуги">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group service-doctor">
                <label for="doctor_1">Доктор 1:</label>
                <select id="doctor_1" name="doctor_1" class="service-doctor-select">
                    <option value="">Выберите врача</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @if(old('doctor_1') == $doctor->id) selected @endif>{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('doctor_1')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group service-doctor">
                <label for="doctor_2">Доктор 2:</label>
                <select id="doctor_2" name="doctor_2" class="service-doctor-select">
                    <option value="">Выберите врача</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @if(old('doctor_2') == $doctor->id) selected @endif>{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('doctor_2')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group service-doctor">
                <label for="doctor_3">Доктор 3:</label>
                <select id="doctor_3" name="doctor_3" class="service-doctor-select">
                    <option value="">Выберите врача</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @if(old('doctor_3') == $doctor->id) selected @endif>{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('doctor_3')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group service-price">
                <label for="price">Цена:</label>
                <input type="number" id="price" name="price" class="service-price-input" required value="{{ old('price') }}" placeholder="Введите цену услуги">
                @error('price')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group service-duration">
                <label for="duration">Продолжительность:</label>
                <input type="number" id="duration" name="duration" class="service-duration-input" required value="{{ old('duration') }}" placeholder="Введите продолжительность услуги">
                @error('duration')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group service-caption">
                <label for="caption">Заголовок:</label>
                <input type="text" id="caption" name="caption" class="service-caption-input" required maxlength="255" value="{{ old('caption') }}" placeholder="Введите заголовок">
                @error('caption')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group service-recommendation">
                <label for="recommendation">Рекомендация:</label>
                <textarea id="recommendation" name="recommendation" class="service-recommendation-textarea" placeholder="Введите рекомендации">{{ old('recommendation') }}</textarea>
                @error('recommendation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group service-description">
                <label for="description">Описание:</label>
                <textarea id="description" name="description" class="service-description-textarea" placeholder="Введите описание услуги">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Сохранить</button>
        </form>
    </x-admin>
</x-layout>
