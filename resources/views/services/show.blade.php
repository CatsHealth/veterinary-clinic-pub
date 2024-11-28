<x-layout>
<h1>{{$service->name}}</h1>
<p>{{$service->price}}</p>
<p>{{$service->caption}}</p>
<p>{{$service->recommendation}}</p>
<p>{{$service->description}}</p>
<p>{{$service->duration}}</p>
@if($service && $service->filename)
    <img src="{{ asset('servise_img/' . $service->filename) }}" alt="Изображение" />
@else
    <p>Изображение не найдено.</p>
@endif
</x-layout>