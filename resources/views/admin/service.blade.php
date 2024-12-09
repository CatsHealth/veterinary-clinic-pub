<x-layout>
    <x-admin>
        <form class="service-form" action="{{ route('service.store') }}" method="POST" id="service-form">
            @csrf

            <div class="form-group service-name" id="doctor-form">
                <label for="name">Название:</label>
                <input type="text" id="name" name="name" class="" required maxlength="100" 
                    value="{{ old('name') }}" placeholder="Введите название услуги">
                @error('name')
                @enderror
            </div>

            <div class="doctorSelectors">
                <script>
                    const doctors = @json($doctors);
                </script>
                <x-doctorSelector :doctors=$doctors />
            </div>

            <div class="form-group service-price">
                <label for="price">Цена:</label>
                <input type="text" id="price" name="price" min="0" class="service-price-input" required
                       value="{{ old('price') }}" placeholder="Введите цену услуги в рублях">
                <div class="error-message" id="price-error"></div>
                @error('price')
                @enderror
            </div>

            <div class="form-group service-duration">
                <label for="duration">Продолжительность:</label>
                <input type="text" id="duration" name="duration" min="0" class="service-duration-input" required
                    value="{{ old('duration') }}" placeholder="Введите продолжительность услуги в минутах">
                <div class="error-message" id="duration-error"></div>
                @error('duration')
                @enderror
            </div>

            <div class="form-group service-caption">
                <label for="caption">Заголовок:</label>
                <input type="text" id="caption" name="caption" class="service-caption-input" required
                    maxlength="255" value="{{ old('caption') }}" placeholder="Введите заголовок">
                @error('caption')
                @enderror
            </div>

            <div class="form-group service-recommendation">
                <label for="recommendation">Рекомендация:</label>
                <textarea id="recommendation" name="recommendation" class="service-recommendation-textarea"
                    placeholder="Введите рекомендации">{{ old('recommendation') }}</textarea>
                @error('recommendation')
                @enderror
            </div>

            <div class="form-group service-description">
                <label for="description">Описание:</label>
                <textarea id="description" name="description" class="service-description-textarea"
                    placeholder="Введите описание услуги">{{ old('description') }}</textarea>
                @error('description')
                @enderror
            </div>

            <button type="submit" class="btn" id="submit-servise">Сохранить</button>
        </form>
    </x-admin>
</x-layout>
