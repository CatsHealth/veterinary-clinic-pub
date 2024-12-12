<x-layout>
    <div class="container">
        <form action="{{ route('auth.go') }}" method="POST" class="auth-form">
            @csrf
            <h2 class="form-title">Вход в систему</h2>

            <div class="form-group">
                <label for="email" class="form-label">Логин:</label>
                <input type="email" id="email" name="email" required maxlength="100" value="{{ old('email') }}" placeholder="Введите ваш логин">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" id="password" name="password" required maxlength="100" placeholder="Введите ваш пароль">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn submit-btn">Сохранить</button>

            @if (Auth::check())
                <p class="auth-status">Ты зарегистрирован</p>
            @endif
        </form>
    </div>
</x-layout>
