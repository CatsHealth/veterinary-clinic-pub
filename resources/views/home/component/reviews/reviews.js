const swiper = new Swiper('.swiper', {
    loop: true,
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
        nextEl: '.button-next',
        prevEl: '.button-prev',
    },
    breakpoints: {
        0: {
            slidesPerView: 1, 
        },
        480: {
            slidesPerView: 1, 
        },
        768: {
            slidesPerView: 2, 
        },
        1024: {
            slidesPerView: 3, 
        },
    },
});
