@vite(['resources/views/home/component/staff/staff.css'])
<section>
    <div class="clinic">
        <div class="container">
            <h2>Наша клиника</h2>
            <div class="clinic-photos">
              <div class="gallery__photo-full">
                <img class="main-image-img" src="{{asset('/img/clinick1.png')}}" alt="Большое фото">
            </div>
            <div class="gallery__photo-previews">
            <img src="{{asset('/img/clinick1-1.png')}}" class="clinic-photo">
                <img src="{{asset('/img/clinick2.png')}}" class="clinic-photo">
                <img src="{{asset('/img/clinick3.png')}}" class="clinic-photo">
            </div>  
            </div>
            
            <img src="{{asset('/img/paws-clinic.png')}}" class="paws-background">
        </div>
    </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var photos = [
            '{{asset("/img/clinick1.png")}}',
            '{{asset("/img/clinick2-2.png")}}',
            '{{asset("/img/clinick3-3.png")}}'
        ];

        var thumbnails = document.querySelectorAll('.clinic-photo');
        var fullPhoto = document.querySelector('.main-image-img');

        if (photos.length !== thumbnails.length) {
            console.error("Количество больших и маленьких изображений не совпадает!");
            return;
        }

        const addThumbnailClickHandler = (index) => {
            thumbnails[index].addEventListener('click', () => {
                fullPhoto.src = photos[index];
            });
        };

        for (let i = 0; i < thumbnails.length; i++) {
            addThumbnailClickHandler(i);
        }
    });
</script>