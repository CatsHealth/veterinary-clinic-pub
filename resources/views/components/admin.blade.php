<div class="wrapper">
    <div class="sidebar collapsed" id="sidebar">
        <ul>
            <li><a href="{{ route('service') }}">Услуги</a></li>
            <li><a href="{{ route('doctors') }}">Доктора</a></li>
            <li><a href="{{ route('admin') }}">Записи</a></li>
        </ul>
    </div>

    <div class="content" id="content">
        <button class="toggle-btn" id="toggle-btn">☰</button>

        {{$slot}}
    </div>
</div>