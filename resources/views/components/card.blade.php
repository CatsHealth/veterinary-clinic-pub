<div class="services-list">
    @foreach ($services as $service)  
        <div class="services-list-item">
            <a href="{{ route('service.show', $service->id) }}"> Название: {{$service->name}}</a>
            <p> Описание:{{$service->caption}}</p>
        </div>
    @endforeach
</div>