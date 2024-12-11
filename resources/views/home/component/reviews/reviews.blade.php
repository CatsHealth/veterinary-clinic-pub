@vite(['resources/views/home/component/reviews/reviews.css'])
@vite(['resources/views/home/component/reviews/reviews.js'])

<div class="reviews">
    <h2>Отзывы</h2>
    <div class="container container-swiper">
        <div class="button-prev"><img src="{{ asset('/img/left.svg') }}" alt="Prev"></div>

        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($reviews as $review)
    <div class="swiper-slide">
        <div class="reviews-list-item">
            <div class="reviews-name">
                <h3>{{ $review['name'] }}</h3>

                @if (isset($review['estimation']))
                    @for ($x = 1; $x <= $review['estimation']; $x++)
                        <img src="{{ asset('img/star.svg') }}" class="star-rating" alt="Star">
                    @endfor
                    @for ($x = $review['estimation'] + 1; $x <= 5; $x++)
                        <img src="{{ asset('img/star-none.svg') }}" class="star-rating" alt="No Star">
                    @endfor
                @else
                    <p>Оценка не предоставлена</p>
                @endif
            </div>

            <div class="reviews-text">
                <p>{{ $review['text'] }}</p>
            </div>

            @if (!empty($review['photo']))
                <div class="reviews-photo">
                    <img src="{{ asset($review['photo']) }}" alt="Фото отзыва" />
                </div>
            @endif
        </div>
    </div>
@endforeach

            </div>
        </div>

        <div class="button-next"><img src="{{ asset('/img/right.svg') }}" alt="Next"></div>
    </div>
</div>
