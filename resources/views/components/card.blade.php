<div class="container">
<div class="services-list">
    @foreach ($services as $service)  
        <div class="services-list-item">
            <a href="{{ route('service.show', $service->id) }}"> {{$service->name}}</a>
            <p> {{$service->caption}}</p>
        </div>
    @endforeach
</div>
</div>