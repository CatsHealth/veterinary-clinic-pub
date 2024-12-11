@vite(['resources/views/home/component/staff/staff.css'])
<section>
    <div class="clinic">
        <div class="container">
            <h2>Наша клиника</h2>
            <div class="clinic-content-wrapper">  
                <div class="clinic-photos">
                    <div id="main-image-container">
                        <img src="{{asset('/img/clinick1.png')}}" class="main-image-img">
                    </div>

                    <div class="clinic-thumbnails">
                        <img src="{{asset('/img/clinick2.png')}}" class="clinic-photo" data-full-src="{{asset('/img/clinick2.png')}}">
                        <img src="{{asset('/img/clinick3.png')}}" class="clinic-photo" data-full-src="{{asset('/img/clinick3.png')}}">
                    </div>
                </div>
                <img src="{{asset('/img/paws-clinic.png')}}" class="paws-background">  
            </div>
        </div>
    </div>
</section>
