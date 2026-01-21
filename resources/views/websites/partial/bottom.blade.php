{{-- <script src="{{ asset('_sdk/element_sdk.js') }}"></script>
<script src="{{ asset('_sdk/data_sdk.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Feedback/Testimonial Slider
    new Swiper('.testimonialSwiper', {
        loop: true,
        spaceBetween: 30,

        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });
</script>

<script src="{{ asset('websites_assets/js/main.js') }}" defer></script>

</body>

</html>
