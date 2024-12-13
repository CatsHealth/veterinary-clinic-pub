@vite(['resources/views/admin/service.css'])

<x-layout>
    <x-admin>
        <div class="container">
            <h1>Список Услуг</h1>
            <div class="sorting-buttons">
                <form method="GET" action="{{ route('admin.services.index') }}" style="display: inline;">
                    <label for="doctor">Выберите врача:</label>
                    <select id="doctor" name="doctor_id" class="service-doctor-select">
                        <option value="">Все врачи</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ request()->get('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-search">Поиск</button>
                </form>
                <form method="GET" action="{{ route('admin.services.index') }}" style="display: inline;">
                    <button type="submit" name="sort" value="asc" class="btn-sort">От А до Я</button>
                </form>
                <form method="GET" action="{{ route('admin.services.index') }}" style="display: inline;">
                    <button type="submit" name="sort" value="desc" class="btn-sort">От Я до А</button>
                </form>
                <form method="GET" action="{{ route('admin.services.index') }}" style="display: inline;">
                    <button type="submit" name="sort" value="newest" class="btn-sort">От новых к старым</button>
                </form>
                <form method="GET" action="{{ route('admin.services.index') }}" style="display: inline;">
                    <button type="submit" name="sort" value="oldest" class="btn-sort">От старых к новым</button>
                </form>
            </div>

            @if($services->isEmpty())
                <p>Нет доступных услуг для выбранного врача.</p>
            @else
                <table class="services-table">
                    <thead>
                        <tr>
                            <th>Услуга</th>
                            <th>Врач</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>
                                    @if($service->doctors->isNotEmpty())
                                        <ul>
                                            @foreach($service->doctors as $doctor)
                                                <li>{{ $doctor->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        Не указано
                                    @endif
                                </td>
                                <td>{{ $service->price }}</td>
                                <td>
                                    <button type="button" class="btn-edit"
                                        onclick="openEditServiceModal({{ $service->id }}, '{{ addslashes($service->name) }}', {{ $service->price }}, {{ $service->duration }}, '{{ addslashes($service->caption) }}', '{{ addslashes($service->recommendation) }}', '{{ addslashes($service->description) }}', null)">Изменить</button>
                                    
                                    <form action="{{ route('service.destroy', $service->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete"
                                            onclick="return confirm('Вы уверены, что хотите удалить эту услугу?')">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div id="editServiceModal" class="modal" style="display: none;" enctype="multipart/form-data">
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

                        <div class="form-group service-doctor">
                            <label for="edit_doctor">Выберите врачей:</label>
                            <select id="edit_doctor" name="doctor_ids[]" class="form-control" multiple required>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" 
                                        @if(old('doctor_ids', []) != [] && in_array($doctor->id, old('doctor_ids', [])))
                                            selected
                                        @endif
                                    >{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Удерживайте Ctrl (или Cmd на Mac), чтобы выбрать несколько врачей.</small>
                            @error('doctor_ids')
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

                        <div class="form-group service-img">
                            <label for="edit_filename">Изображение:</label>
                            <input type="file" id="edit_filename" name="filename" class="form-control @error('filename') is-invalid @enderror">
                            @error('filename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-sort">Сохранить изменения</button>
                        <button type="button" class="btn-sort" onclick="closeEditModal()">Отмена</button>
                    </form>
                </div>
            </div>
        

            <form class="service-form" action="{{ route('service.store') }}" enctype="multipart/form-data"
                method="POST">
                @csrf

                <div class="form-group service-name">
                    <h2>Создать услугу</h2>
                    <label for="name">Название:</label>
                    <input type="text" id="name" name="name" class="service-name-input" required maxlength="100"
                        value="{{ old('name') }}" placeholder="Введите название услуги">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group service-doctor">
                    <label for="doctor_1">Доктор 1:</label>
                    <select id="doctor_1" name="doctor_1" class="service-doctor-select">
                        <option value="">Выберите врача</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" @if(old('doctor_1') == $doctor->id) selected @endif>
                                {{ $doctor->name }}
                            </option>
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
                            <option value="{{ $doctor->id }}" @if(old('doctor_2') == $doctor->id) selected @endif>
                                {{ $doctor->name }}
                            </option>
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
                            <option value="{{ $doctor->id }}" @if(old('doctor_3') == $doctor->id) selected @endif>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_3')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>


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
                <button type="submit" class="btn-sort">Сохранить</button>
            </form>
        </div>
    </div>
    </x-admin>
</x-layout>

<script>
    function openEditServiceModal(id, name, price, duration, caption, recommendation, description, doctorId) {
        document.getElementById('edit_service_id').value = id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_price').value = price;
        document.getElementById('edit_duration').value = duration;
        document.getElementById('edit_caption').value = caption;
        document.getElementById('edit_recommendation').value = recommendation;
        document.getElementById('edit_description').value = description;

        // Установите выбранного врача
        document.getElementById('edit_doctor').value = doctorId;

        document.getElementById('editServiceModal').style.display = 'block';
        document.getElementById('editServiceForm').action = "{{ route('service.update', '') }}" + '/' + id;
    }

    function closeEditModal() {
        document.getElementById('editServiceModal').style.display = 'none';
    }
</script>