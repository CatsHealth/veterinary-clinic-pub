<header>
    <div class="header_conteiner conteiner">
        <div class="row">
            <div class="logo">
                <a href="{{ route('app') }}"><img src="{{ asset('img/logo.svg') }}" alt="Logo" /></a>
            </div>
            <nav class="nav">
                <a href="{{ route('app') }}" @if (request()->is('/')) class="selectid" @endif>Главное</a>
                <a href="{{ route('services') }}" @if (request()->is('services*')) class="selectid" @endif>Услуги</a>
                <a href="{{ route('appointment') }}" @if (request()->is('appointment*')) class="selectid" @endif>Записаться</a>
                <a href="{{ route('admin') }}" @if (request()->is('admin*')) class="selectid" @endif>Админ</a>
            </nav>
        </div>
    </div>
</header>