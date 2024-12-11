@vite(['resources/views/home/component/values/values.css'])
<section>
    <div class="values">

        <div class="container">
            <h2>Делайте своих питомцев счатливыми</h2>
            <div class="values-content">
                <div class="values-info">
                    <div class="values-text">
                        <img src="{{asset('/img/paws.svg')}}" alt="">
                        <p>Кормите своего питомца в одно и то же время каждый день, чтобы создать стабильный распорядок и избежать проблем с пищеварением.</p>
                    </div>
                    <div class="values-text">
                        <img src="{{asset('/img/paws.svg')}}" alt="">
                        <p>Прогулки на свежем воздухе не только укрепляют здоровье вашей собаки, но и помогают ей расходовать энергию и социализироваться с другими животными.</p>
                    </div>
                    <div class="values-text">
                        <img src="{{asset('/img/paws.svg')}}" alt="">
                        <p>Уделяйте время играм с вашим питомцем, чтобы укрепить вашу связь и обеспечить ему эмоциональное благополучие.</p>
                    </div>
                    <div class="values-text">
                        <img src="{{asset('/img/paws.svg')}}" alt="">
                        <p> Регулярные визиты к ветеринару помогут своевременно выявить возможные заболевания и поддерживать общее здоровье вашего питомца.</p>
                    </div>
                </div>
                <div class="values-img">
            <div class="slideshow-container">
                <img src="{{ asset('img/pets.png') }}" alt="values" class="slideshow-image active">
                <img src="{{ asset('img/values1.png') }}" alt="values" class="slideshow-image">
                <img src="{{ asset('img/values2.png') }}" alt="values" class="slideshow-image">
            </div>
        </div>
            </div>
            <h2>А мы поможем им оставаться здоровыми!</h2>
        </div>
    </div>
</section>

<script>
    const slideshowImages = document.querySelectorAll('.slideshow-image');
let currentImageIndex = 0;

function showImage(index) {
  slideshowImages.forEach((img, i) => {
    img.classList.remove('active');
    if (i === index) {
      img.classList.add('active');
    }
  });
}

function nextImage() {
  currentImageIndex = (currentImageIndex + 1) % slideshowImages.length;
  showImage(currentImageIndex);
}


showImage(currentImageIndex); 

setInterval(nextImage, 3000);
</script>