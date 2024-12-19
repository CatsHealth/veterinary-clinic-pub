<x-layout>
    <div class="container">
        <div class="service">
            <h1>{{$service->name}}</h1>
        </div>

        <div class="service-content">
            <div class="service-img">
                @if($service && $service->filename)
                    <img src="{{ asset('path/' . $service->filename) }}" alt="Изображение" class="service-image" />
                @else
                    <p class="no-image">Изображение не найдено.</p>
                @endif
            </div>

            <div class="service-info">
                <p><b>Описание:</b> {{$service->description}}</p>
                <p><b>Рекомендации:</b> {{$service->recommendation}}</p>
                <p><b>Длительность:</b> {{$service->duration}} минут</p>
                <p class="service-price"> От {{$service->price}} руб.</p>
            </div>
        </div>

        <div class="service-footer">
            <a href="/services" class="btn btn-main">Вернуться к услугам</a>
            <a href="{{ route('appointment', ['service_id' => $service->id]) }}" class="btn btn-secondary">Записаться</a>
        </div>
    </div>
</x-layout>