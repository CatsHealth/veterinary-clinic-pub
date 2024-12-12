<div class="sidebar">
    <ul>
        <li><a href="{{ route('service') }}" @if (request()->is('admin/service*')) class="selectid" @endif>Услуги</a></li>
        <li><a href="{{ route('doctors') }}"@if (request()->is('admin/doctors*')) class="selectid" @endif>Доктора</a></li>
        <li><a href="{{ route('admin') }}"@if (request()->is('admin')) class="selectid" @endif>Записи</a></li>
        <li><a href="{{ route('admin.consultations') }}" @if (request()->is('admin/consultations')) class="selectid" @endif>Консультации</a></li>

    </ul>
</div>
{{$slot}}