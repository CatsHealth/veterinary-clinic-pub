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
                                <p> {{$service->name}}</p>
                                <p> {{$service->caption}}</p>
                            </div>
                    @endforeach

                </div>


            </div>

        </div>
        <div class="services-btn">
            <button class="services-button">Посмотреть все услуги</button>
        </div>
    </div>
    </div>
</section>