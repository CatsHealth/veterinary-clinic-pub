@vite(['resources/views/home/component/reviews/reviews.css'])
@vite(['resources/views/home/component/reviews/reviews.js'])
<div class="reviews">
    <h2>Отзывы</h2>
    <div class="container">
        <div class="button-prev"><img src="{{ asset('/img/left.svg') }}"></div>
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($reviews as $review)
                    <div class="swiper-slide">
                        <div class="reviews-list-item">
                            <div class="reviews-name">
                                <h3>{{ $review['name'] }}</h3>
                                <p>Оценка: {{ $review['estimation'] }}</p>
                                @for ($x=($review['estimation']); $x>0;$x--)
                                    <img src="{{ asset('img/star.svg') }}" class="star-rating" alt="reviews">
                                @endfor
                                @for ($x=($review['estimation']); $x<5;$x++)
                                    <img src="{{ asset('img/star-none.svg') }}" class="star-rating" alt="reviews">
                                @endfor
                            </div>
                            <div class="reviews-text">
                                <p>{{ $review['text'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="button-next"><img src="{{ asset('/img/right.svg') }}"></div>
    </div>
</div>