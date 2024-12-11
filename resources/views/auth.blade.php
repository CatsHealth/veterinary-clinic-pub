<x-layout>
    <form action="{{ route('auth.go') }}" method="POST">
        @csrf
        <label for="email">Логин:</label>
        <input type="email" id="email" name="email" required maxlength="100" value="{{ old('email') }}">
        
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required maxlength="100">
        
        @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror
        
        <button type="submit" class="btn">Сохранить</button>

        @if (Auth::check())
            <p>Ты зарегистрирован</p>
        @endif
    </form>
</x-layout>
