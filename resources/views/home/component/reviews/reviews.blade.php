@vite(['resources/views/home/component/reviews/reviews.css'])
<div class="reviews">
    <div class="container">
        <h2>Отзывы</h2>
        <div class="reviews-content">
            <button type="submit" class="review-btn"></button>
            <div class="reviews-list">

                <div class="reviews-list-item">
                    <div class="reviews-name">
                        <h3>Иванов Иван</h3>
                        <img src="{{ asset('img/star.svg') }}" alt="reviews">
                    </div>
                    <div class="reviews-text">
                        <p>Очень доволен вашей работой! Обслуживание было быстрым и профессиональным.</p>
                    </div>
                </div>

                <div class="reviews-list-item">
                    <div class="reviews-name">
                        <h3>Иванов Иван</h3>
                        <img src="{{ asset('img/star.svg') }}" alt="reviews">
                    </div>
                    <div class="reviews-text">
                        <p>Очень доволен вашей работой! Обслуживание было быстрым и профессиональным.</p>
                    </div>
                </div>

                <div class="reviews-list-item">
                    <div class="reviews-name">
                        <h3>Иванов Иван</h3>
                        <img src="{{ asset('img/star.svg') }}" alt="reviews">
                    </div>
                    <div class="reviews-text">
                        <p>Очень доволен вашей работой! Обслуживание было быстрым и профессиональным.</p>
                    </div>
                </div>
            </div>
            <button type="submit" class="review-btn-right"></button>
        </div>
    </div>
</div>