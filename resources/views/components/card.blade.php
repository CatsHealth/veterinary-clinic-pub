<div class="services-list">
    @foreach ($services as $service)  
        <div class="services-list-item">
            <p> Название: {{$service->name}}</p>
            <p> Описание:{{$service->caption}}</p>
        </div>
    @endforeach
</div>