<x-layout>
    <div class="container">
        <div class="service">
            <h1>{{$service->name}}</h1>
        </div>
        <div class="service-content">
            <div class="service-info">
                <p>{{$service->caption}}</p>
                <p><b>Рекомендации:</b> {{$service->recommendation}}</p>
                <p><b>Описание:</b> {{$service->description}}</p>
                <p>{{$service->duration}}</p>
                <p>{{$service->price}} руб.</p>
            </div>
            <div class="service-img">
                @if($service && $service->filename)
                <img src="{{ asset('servise_img/' . $service->filename) }}" alt="Изображение" />
            @else
                <p>Изображение не найдено.</p>
            @endif
            </div>
            
        </div>
    </div>

</x-layout>
