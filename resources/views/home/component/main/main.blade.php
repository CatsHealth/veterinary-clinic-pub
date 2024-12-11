@vite(['resources/views/home/component/main/main.css'])
<section>
    <div class="banner">
        <div class="container">
            <div class="banner-paws">
                    <img src="{{ asset('img/paws-main.png') }}" alt="Veterinary Clinic">
                </div>
            <div class="banner-content">
            
                <div class="banner-text">
                    <h1>Ветеринарная клиника для вашего питомца</h1>
                    <p>Расскажите о вашем питомце, и мы подберем подходящих специалистов</p>
                    <form class="main-form">
                        <div class="form_radio_container">
                            <div class="form_radio_btn">
                                <input id="radio_cat" type="radio" name="animal" value="cat" />
                                <label for="radio_cat">
                                    <img src="{{ asset('img/main_ico_cat.svg') }}" alt="Cat">
                                </label>
                            </div>
                            <div class="form_radio_btn">
                                <input id="radio_dog" type="radio" name="animal" value="dog" />
                                <label for="radio_dog">
                                    <img src="{{ asset('img/main_ico_dog.svg') }}" alt="Dog">
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-main">Записаться</button>
                    </form>                                       
                </div>
                <div class="banner-image">
                    <img src="{{ asset('img/banner.png') }}" alt="Veterinary Clinic">
                </div>
            </div>
        </div>
    </div>
</section>