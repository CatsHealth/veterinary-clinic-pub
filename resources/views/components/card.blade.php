<div class="conteiner">
<div class="services-list">
    @foreach ($services as $service)  
        <div class="services-list-item">
            <p class="service-name"> Название: {{$service->name}}</p>
            <p class="service-caption"> Описание:{{$service->caption}}</p>
        </div>
    @endforeach
</div>
</div>