<x-layout>
<form method="GET" action="{{ url()->current() }}">
    <div class="form-group">
        <label for="serviceSelect">Выберите услугу:</label>
        <select id="serviceSelect" name="service_id" class="form-control" onchange="this.form.submit()">
            <option value="">Все услуги</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}" {{ $selectedServiceId == $service->id ? 'selected' : '' }}>
                    {{ $service->name }}
                </option>
            @endforeach
        </select>
    </div>
@include('doctor.show')
</x-layout>
