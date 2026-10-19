{{-- <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900">
        Our Feedbacks
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div
            class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 p-8 border border-gray-100 flex flex-col justify-between h-full">
            <p class="text-lg text-gray-700 italic mb-8">
                "SoftPolli transformed our legacy systems into a modern, efficient platform.
                Their
                expertise in the financial industry is unparalleled."
            </p>
            <div class="flex items-center mt-auto">
                <img class="w-14 h-14 rounded-full object-cover mr-4 ring-2 ring-indigo-50"
                    src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe">
                <div>
                    <p class="font-bold text-gray-900">John Doe</p>
                    <p class="text-indigo-600 text-sm">CEO, Innovate Corp.</p>
                </div>
            </div>
        </div>

        <div
            class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 p-8 border border-gray-100 flex flex-col justify-between h-full">
            <p class="text-lg text-gray-700 italic mb-8">
                "The automation solutions provided by SoftPolli have significantly streamlined our
                operations, leading to substantial cost savings and accuracy."
            </p>
            <div class="flex items-center mt-auto">
                <img class="w-14 h-14 rounded-full object-cover mr-4 ring-2 ring-indigo-50"
                    src="https://randomuser.me/api/portraits/women/44.jpg" alt="Jane Smith">
                <div>
                    <p class="font-bold text-gray-900">Jane Smith</p>
                    <p class="text-indigo-600 text-sm">Operations Director</p>
                </div>
            </div>
        </div>

        <div
            class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 p-8 border border-gray-100 flex flex-col justify-between h-full">
            <p class="text-lg text-gray-700 italic mb-8">
                "Working with SoftPolli was an absolute pleasure. They delivered our complex insurance
                platform ahead of schedule and within budget."
            </p>
            <div class="flex items-center mt-auto">
                <img class="w-14 h-14 rounded-full object-cover mr-4 ring-2 ring-indigo-50"
                    src="https://randomuser.me/api/portraits/men/88.jpg" alt="David Lee">
                <div>
                    <p class="font-bold text-gray-900">David Lee</p>
                    <p class="text-indigo-600 text-sm">Head of Digital</p>
                </div>
            </div>
        </div>

    </div>
</div> --}}


@if ($testimonialSection)
<div class="max-w-7xl mx-auto">

    <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900">
        {{ $testimonialSection->title }}
    </h2>



<div class="swiper testimonialSwiper">
    <div class="swiper-wrapper">

        @foreach ($testimonialSection->testimonials as $item)
            <div class="swiper-slide h-auto">

                <div
                    class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300
                           p-8 border border-gray-100 flex flex-col justify-between h-full">

                    <p class="text-lg text-gray-700 italic mb-8">
                        “{{ $item->message }}”
                    </p>

                    <div class="flex items-center mt-auto">
                        <img
                            class="w-14 h-14 rounded-full object-cover mr-4 ring-2 ring-indigo-50"
                            src="{{ $item->photo
                                ? asset('storage/' . $item->photo)
                                : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                            alt="{{ $item->name }}">

                        <div>
                            <p class="font-bold text-gray-900">
                                {{ $item->name }}
                            </p>
                            <p class="text-indigo-600 text-sm">
                                {{ $item->designation }}
                                @if ($item->company)
                                    , {{ $item->company }}
                                @endif
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        @endforeach

    </div>

    {{-- Pagination dots --}}
    <div class="swiper-pagination mt-10"></div>
</div>
</div>
@endif
