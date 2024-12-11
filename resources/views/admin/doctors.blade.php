<x-layout>
    <x-admin>
        <h1>Список врачей</h1>

        <div class="sorting-buttons">
            <form method="GET" action="{{ route('doctors.index') }}" style="display: inline;">
                <button type="submit" name="sort" value="asc" class="btn-sort">От А до Я</button>
            </form>
            <form method="GET" action="{{ route('doctors.index') }}" style="display: inline;">
                <button type="submit" name="sort" value="desc" class="btn-sort">От Я до А</button>
            </form>
            <form method="GET" action="{{ route('doctors.index') }}" style="display: inline;">
                <button type="submit" name="sort" value="newest" class="btn-sort">От новых к старым</button>
            </form>
            <form method="GET" action="{{ route('doctors.index') }}" style="display: inline;">
                <button type="submit" name="sort" value="oldest" class="btn-sort">От старых к новым</button>
            </form>
        </div>

        <table class="doctors-table">
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Специализация</th>
                    <th>Телефон</th>
                    <th>Логин</th>
                    <th>Актив</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->name }}</td> 
                        <td>{{ $doctor->specialization }}</td>
                        <td>{{ $doctor->phone }}</td> 
                        <td>{{ $doctor->user->email ?? 'Нет аккаунта' }}</td>
                        <td>{{ $doctor->is_active ? 'Да' : 'Нет' }}</td> 
                        <td>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Вы уверены, что хотите удалить этого доктора?')">Удалить</button>
                            </form>
                            <button type="button" class="btn-edit" onclick="openEditDoctorModal('{{ $doctor->id }}', '{{ addslashes($doctor->name) }}', '{{ addslashes($doctor->specialization) }}', '{{ $doctor->phone }}', '{{ $doctor->login }}', '{{ addslashes($doctor->password) }}')">Изменить</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="editDoctorModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>Изменить Врача</h2>
                <form class="doctor-form" id="editDoctorForm" method="POST" action="{{ route('doctors.update', '') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_doctor_id" name="id" value="">
        
                    <div class="form-group">
                        <label for="edit_name">ФИО:</label>
                        <input type="text" id="edit_name" name="name" required maxlength="100" placeholder="Введите ФИО врача">
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="edit_specialization">Специализация:</label>
                        <input type="text" id="edit_specialization" name="specialization" required maxlength="100" placeholder="Введите специализацию">
                        @error('specialization')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="edit_phone">Телефон:</label>
                        <input type="tel" id="edit_phone" name="phone" required maxlength="100" placeholder="Введите номер телефона">
                        @error('phone')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="edit_login">Логин:</label>
                        <input type="text" id="edit_login" name="login" required maxlength="100" placeholder="Введите логин">
                        @error('login')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div class="form-group">
                        <label for="edit_password">Пароль:</label>
                        <input type="password" id="edit_password" name="password" required maxlength="100" placeholder="Введите пароль">
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <button type="submit" class="btn">Сохранить</button>
                </form>
            </div>
        </div>
        
        <form class="doctor-form" action="{{ route('doctor.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">ФИО:</label>
                <input type="text" id="name" name="name" required maxlength="100" placeholder="Введите ФИО врача">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="specialization">Специализация:</label>
                <input type="text" id="specialization" name="specialization" required maxlength="100" placeholder="Введите специализацию">
                @error('specialization')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Телефон:</label>
                <input type="phone" id="phone" name="phone" required maxlength="100" placeholder="Введите номер телефона">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="login">Логин</label>
                <input type="login" id="login" name="login" required maxlength="100" placeholder="Введите логин">
                @error('login')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required maxlength="100" placeholder="Введите пароль">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Сохранить</button>
        </form>
        
    </x-admin>
</x-layout>

<script>
    function openEditDoctorModal(id, name, specialization, phone, login, password, isActive) {
        document.getElementById('edit_doctor_id').value = id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_specialization').value = specialization;
        document.getElementById('edit_phone').value = phone;
        document.getElementById('edit_login').value = login;
        document.getElementById('edit_password').value = password;
    

    
        // Обновляем URL для формы редактирования
        document.getElementById('editDoctorForm').action = "{{ route('doctors.update', '') }}/" + id;
    
        document.getElementById('editDoctorModal').style.display = 'block';
    }
    
    function closeEditModal() {
        document.getElementById('editDoctorModal').style.display = 'none';
    }
    </script>
    
    