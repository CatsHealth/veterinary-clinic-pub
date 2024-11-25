@vite(['resources/views/home/component/services/services.css'])
<section>
    <div class="services">
        <div class="container">
            <div class="services-content">
                <div class="services-text">
                    <h2>Услуги</h2>
                    <p>Общие осмотры и профилактика: Регулярные осмотры помогут выявить проблемы на ранних стадиях.</p>
                </div>
                <div class="services-list">

                    @foreach ($services as $service)  
                          <div class="services-list-item">
                                <p class="service-name"> {{$service->name}}</p>
                                <p class="service-caption"> {{$service->caption}}</p>
                            </div>
                    @endforeach

                </div>


            </div>
            <div class="services-btn">
                <button class="btn">Посмотреть все услуги</button>
            </div>
        </div>
    </div>
</section>