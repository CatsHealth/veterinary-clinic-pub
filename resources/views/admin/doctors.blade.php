<x-layout>
    <x-admin>
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

            <button type="submit">Сохранить</button>
        </form>
    </x-admin>
</x-layout>
