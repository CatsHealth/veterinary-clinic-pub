<x-layout>
    <x-admin>
        <form class="service-form" action="{{ route('service.store') }}" enctype="multipart/form-data" method="POST" id="service-form">
            @csrf

            <div class="form-group service-name" id="doctor-form">
                <label for="name">Название:</label>
                <input type="text" id="name" name="name" class="service-name-input" required maxlength="100"

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
                <input type="number" id="duration" name="duration" min=0 class="service-duration-input" required
                    value="{{ old('duration') }}" placeholder="Введите продолжительность услуги">

                <div class="form-group service-price">
                    <label for="price">Цена:</label>
                    <input type="number" id="price" name="price" class="service-price-input" required
                        value="{{ old('price') }}" placeholder="Введите цену услуги">
                    @error('price')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group service-duration">
                    <label for="duration">Продолжительность:</label>
                    <input type="number" id="duration" name="duration" class="service-duration-input" required
                        value="{{ old('duration') }}" placeholder="Введите продолжительность услуги">

                    @error('duration')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group service-caption">
                    <label for="caption">Заголовок:</label>
                    <input type="text" id="caption" name="caption" class="service-caption-input" required
                        maxlength="255" value="{{ old('caption') }}" placeholder="Введите заголовок">
                    @error('caption')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group service-recommendation">
                    <label for="recommendation">Рекомендация:</label>
                    <textarea id="recommendation" name="recommendation" class="service-recommendation-textarea"
                        placeholder="Введите рекомендации">{{ old('recommendation') }}</textarea>
                    @error('recommendation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group service-description">
                    <label for="description">Описание:</label>
                    <textarea id="description" name="description" class="service-description-textarea"
                        placeholder="Введите описание услуги">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group service-img">
                    <label for="filename">Изображение:</label>
                    <input type="file" name="filename" id="filename"
                        class="form-control @error('filename') is-invalid @enderror">
                    @error('filename')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            <button type="submit" class="btn">Сохранить</button>
        </form>
    </x-admin>
</x-layout>