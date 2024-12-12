
<x-layout>
    <x-admin>
        <div class="container">
        <h1>Список Услуг</h1>
        
        <form method="GET" action="{{ route('admin.services.index') }}">
            <label for="sort">Сортировка по названию:</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="asc" {{ isset($sortDirection) && $sortDirection === 'asc' ? 'selected' : '' }}>От А до Я</option>
                <option value="desc" {{ isset($sortDirection) && $sortDirection === 'desc' ? 'selected' : '' }}>От Я до А</option>
            </select>
        </form>
        
        <table class="services-table">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Прайс</th>
                    <th>Время</th>
                    <th>Подпись</th>
                    <th>Рекомендация</th>
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->price }}</td>
                        <td>{{ $service->duration }}</td>
                        <td>{{ $service->caption }}</td>
                        <td>{{ $service->recommendation }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            <button type="button" class="btn-edit" onclick="openEditServiceModal({{ $service->id }}, '{{ addslashes($service->name) }}', {{ $service->price }}, {{ $service->duration }}, '{{ addslashes($service->caption) }}', '{{ addslashes($service->recommendation) }}', '{{ addslashes($service->description) }}')">Изменить</button>
                        </td>
                        <td>
                            <form action="{{ route('service.destroy', $service->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Вы уверены, что хотите удалить эту услугу?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="editServiceModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>Редактировать Услугу</h2>
                <form class="service-form" id="editServiceForm" method="POST" action="{{ route('service.update', '') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_service_id" name="id" value="">
        
                    <div class="form-group service-name">
                        <label for="edit_name">Название:</label>
                        <input type="text" id="edit_name" name="name" class="service-name-input" required maxlength="100" placeholder="Введите название услуги">
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group service-price">
                        <label for="edit_price">Цена:</label>
                        <input type="number" id="edit_price" name="price" min="0" class="service-price-input" required placeholder="Введите цену услуги">
                        @error('price')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group service-duration">
                        <label for="edit_duration">Продолжительность:</label>
                        <input type="number" id="edit_duration" name="duration" min="0" class="service-duration-input" required placeholder="Введите продолжительность услуги">
                        @error('duration')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group service-caption">
                        <label for="edit_caption">Заголовок:</label>
                        <input type="text" id="edit_caption" name="caption" class="service-caption-input" required maxlength="255" placeholder="Введите заголовок">
                        @error('caption')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group service-recommendation">
                        <label for="edit_recommendation">Рекомендация:</label>
                        <textarea id="edit_recommendation" name="recommendation" class="service-recommendation-textarea" placeholder="Введите рекомендации"></textarea>
                        @error('recommendation')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group service-description">
                        <label for="edit_description">Описание:</label>
                        <textarea id="edit_description" name="description" class="service-description-textarea" placeholder="Введите описание услуги"></textarea>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <button type="submit" class="btn">Сохранить изменения</button>
                </form>
            </div>
        </div>
        
        <form class="service-form" action="{{ route('service.store') }}" method="POST">

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
                <input type="number" id="duration" name="duration" min="0" class="service-duration-input" required value="{{ old('duration') }}" placeholder="Введите продолжительность услуги">
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


</div>
            </x-admin>
        </x-layout>
        
        <script>
function openEditServiceModal(id, name, price, duration, caption, recommendation, description) {
    document.getElementById('edit_service_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_price').value = price;
    document.getElementById('edit_duration').value = duration;
    document.getElementById('edit_caption').value = caption;
    document.getElementById('edit_recommendation').value = recommendation;
    document.getElementById('edit_description').value = description;

    document.getElementById('editServiceModal').style.display = 'block';
    document.getElementById('editServiceForm').action = "{{ route('service.update', '') }}" + '/' + id;

}

function closeEditModal() {
    document.getElementById('editServiceModal').style.display = 'none';
}
</script>

