<x-layout>
    <x-admin>
        <h1>Список врачей</h1>

        <form method="GET" action="{{ route('doctors.index') }}">
            <label for="sort">Сортировка по ФИО:</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="asc" {{ isset($sortDirection) && $sortDirection === 'asc' ? 'selected' : '' }}>От А до Я</option>
                <option value="desc" {{ isset($sortDirection) && $sortDirection === 'desc' ? 'selected' : '' }}>От Я до А</option>
            </select>
        </form>

        <table class="doctors-table">
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Специализация</th>
                    <th>Телефон</th>
                    <th>Логин</th>
                    <th>Пароль</th>
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
                        <td>{{ $doctor->login }}</td>
                        <td>{{ $doctor->password }}</td> 
                        <td>{{ $doctor->is_active ? 'Да' : 'Нет' }}</td> 
                        <td>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Вы уверены, что хотите удалить этого доктора?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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

