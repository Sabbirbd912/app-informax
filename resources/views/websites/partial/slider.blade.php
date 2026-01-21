{{-- <div class="swiper heroSwiper h-screen w-full">

    <div class="swiper-wrapper">

        <!-- SLIDE 1 : LOCAL VIDEO -->
        <div class="swiper-slide relative h-screen w-full">
            <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
                <source src="websites_assets/video/vd1.mp4" type="video/mp4">
            </video>

            <!-- Overlay (optional but recommended) -->
            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative z-10 h-full flex items-center justify-center text-center px-4">
                <div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white">
                        Building Tomorrow's Technology Today
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 text-white opacity-95">
                        Enterprise Software Solutions from Bangladesh to the World
                    </p>
                    <a href="#contact"
                        class="inline-block px-8 py-4 rounded-lg font-semibold text-lg text-white bg-emerald-500 hover:bg-emerald-600 shadow-xl">
                        Get Started
                    </a>
                </div>
            </div>
        </div>

        <!-- SLIDE 2 : IMAGE -->
        <div class="swiper-slide relative h-screen w-full">
            <div class="absolute inset-0 w-full h-full bg-cover bg-center"
                style="background-image: url('websites_assets/images/slider-img/secondpc.jpg');">
            </div>

            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative z-10 h-full flex items-center justify-center text-center px-4">
                <div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white">
                        Smart Digital Solutions
                    </h1>
                    <p class="text-xl text-white mb-8">
                        Scalable software for modern businesses
                    </p>
                    <a href="#services"
                        class="inline-block px-8 py-4 rounded-lg font-semibold text-lg text-white bg-teal-500 hover:bg-teal-600">
                        Our Services
                    </a>
                </div>
            </div>
        </div>

        <!-- SLIDE 3 : LOCAL VIDEO -->
        <div class="swiper-slide relative h-screen w-full">
            <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
                <source src="websites_assets/video/vd3.mp4" type="video/mp4">
            </video>

            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative z-10 h-full flex items-center justify-center text-center px-4">
                <div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white">
                        Innovating Digital Experiences
                    </h1>
                    <p class="text-xl text-white mb-8">
                        Modern, fast & reliable technology
                    </p>
                    <a href="#contact"
                        class="inline-block px-8 py-4 rounded-lg font-semibold text-lg text-white bg-emerald-500 hover:bg-emerald-600">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Controls -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div> --}}




<div class="swiper heroSwiper h-screen w-full">

    <div class="swiper-wrapper">

        @foreach($sliders as $slider)
            <div class="swiper-slide relative h-screen w-full">

                {{-- IMAGE --}}
                @if($slider->media_type === 'image')
                    <div class="absolute inset-0 w-full h-full bg-cover bg-center"
                        style="background-image: url('{{ asset('storage/' . $slider->media_path) }}');">
                    </div>
                @endif

                {{-- VIDEO --}}
                @if($slider->media_type === 'video')
                    <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
                        <source src="{{ asset('storage/' . $slider->media_path) }}" type="video/mp4">
                    </video>
                @endif

                {{-- Overlay --}}
                <div class="absolute inset-0 bg-black/40"></div>

                {{-- Content --}}
                <div class="relative z-10 h-full flex items-center justify-center text-center px-4">
                    <div>

                        <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white">
                            {{ $slider->title }}
                        </h1>

                        @if($slider->subtitle)
                            <p class="text-xl md:text-2xl mb-8 text-white opacity-95">
                                {{ $slider->subtitle }}
                            </p>
                        @endif

                        @if($slider->button_text && $slider->button_link)
                            <a href="{{ $slider->button_link }}" class="inline-block px-8 py-4 rounded-lg font-semibold text-lg
                                              text-white bg-emerald-500 hover:bg-emerald-600 shadow-xl">
                                {{ $slider->button_text }}
                            </a>
                        @endif

                    </div>
                </div>

            </div>
        @endforeach

    </div>

    <!-- Controls -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div>