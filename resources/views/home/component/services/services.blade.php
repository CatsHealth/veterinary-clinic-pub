@vite(['resources/views/home/component/services/services.css'])
<section>
    <div class="services">
        <div class="container">
            <div class="services-content">
                <div class="services-text">
                    <h2>Услуги</h2>
                    <p>Общие осмотры и профилактика.<br>
                        Регулярные медицинские осмотры – это ключ к здоровью. Они позволяют выявить потенциальные проблемы на ранних стадиях, когда лечение наиболее эффективно. Наша команда опытных специалистов проведет комплексное обследование.
                   </p>
                </div>
                <div class="services-image">
                    <img src="{{asset('/img/paws-services.png')}}">
                </div>
                <div class="services-list">

                    @foreach ($services as $service)  
                          <div class="services-list-item">
                          <a href="{{ route('service.show', $service->id) }}"> {{$service->name}}</a>
                                <p class="service-caption"> {{$service->caption}}</p>
                            </div>
                    @endforeach

                </div> 


            </div>
            <div class="services-btn">
            <a href="{{ route('services') }}" class="btn">Посмотреть все услуги</a>
            </div>
        </div>
    </div>
</section>