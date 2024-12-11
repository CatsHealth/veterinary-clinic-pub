@vite(['resources/views/home/component/staff/staff.css'])
<section>
    <div class="clinic">
        <div class="container">
            <h2>Наша клиника</h2>
            <div class="clinic-content-wrapper">  <!-- Новый div-контейнер -->
                <div class="clinic-photos">
                    <img src="{{asset('/img/clinick1.png')}}">
                    <div class="clinic-photo">
                        <img src="{{asset('/img/clinick2.png')}}">
                        <img src="{{asset('/img/clinick3.png')}}">
                    </div>
                </div>
                <img src="{{asset('/img/paws-clinic.png')}}" class="paws-background">  <!-- Добавили класс -->
            </div>
            </div>
            </div>
            
</section>