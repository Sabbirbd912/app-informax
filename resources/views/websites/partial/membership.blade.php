{{-- <div class="text-center">
    <h3 class="text-3xl font-bold mb-8 text-gray-800">
        Memberships &amp; Certifications
    </h3>
    <div class="grid md:grid-cols-3 gap-6" role="list" aria-label="Memberships and Certifications">
        <article class="p-8 rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-shadow" role="listitem">
            <div class="w-20 h-20 icon-gradient-green rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md"
                role="img" aria-label="BASIS Member Badge">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewbox="0 0 20 20" aria-hidden="true">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>
            <p class="font-bold text-xl text-gray-800 mb-2">
                BASIS Member
            </p>
            <p class="text-sm text-gray-600">
                Bangladesh Association of Software and
                Information Services
            </p>
        </article>
        <article class="p-8 rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-shadow" role="listitem">
            <div class="w-20 h-20 icon-gradient-teal rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md"
                role="img" aria-label="ISO Certification Badge">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewbox="0 0 20 20" aria-hidden="true">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>
            <p class="font-bold text-xl text-gray-800 mb-2">
                ISO Certified
            </p>
            <p class="text-sm text-gray-600">
                ISO 9001:2015 Quality Management
            </p>
        </article>
        <article class="p-8 rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-shadow" role="listitem">
            <div class="w-20 h-20 icon-gradient-blue rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md"
                role="img" aria-label="Tech Partner Badge">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewbox="0 0 20 20" aria-hidden="true">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>
            <p class="font-bold text-xl text-gray-800 mb-2">
                Tech Partner
            </p>
            <p class="text-sm text-gray-600">
                Certified Technology Partner Network
            </p>
        </article>
    </div>
</div> --}}









@if($membershipSection)
<div class="text-center py-12">

    {{-- SECTION TITLE --}}
    <h3 class="text-3xl font-bold mb-10 text-gray-800">
        {{ $membershipSection->title }}
    </h3>

    {{-- MARQUEE WRAPPER --}}
    <div class="relative overflow-hidden w-full">

        {{-- MARQUEE TRACK --}}
        <div class="marquee-track flex flex-nowrap gap-6">

            {{-- FIRST LOOP --}}
            @foreach($membershipSection->membershipCards as $card)
                <article
                    class="marquee-item shrink-0 min-w-[300px] p-8 rounded-2xl bg-white
                           hover:shadow-2xl transition-shadow duration-300">

                    {{-- ICON --}}
                    <div
                        class="w-20 h-20 icon-gradient-{{ $card->theme_color }}
                               rounded-2xl flex items-center justify-center
                               mx-auto mb-4 shadow-md">

                        @if($card->icon_type === 'emoji')
                            <span class="text-3xl">{{ $card->icon_value }}</span>

                        @elseif($card->icon_type === 'svg')
                            {!! $card->icon_value !!}

                        @elseif($card->icon_type === 'image')
                            <img
                                src="{{ asset('storage/' . $card->icon_value) }}"
                                class="w-10 h-10 object-contain"
                                alt="{{ $card->title }}">
                        @endif
                    </div>

                    <p class="font-bold text-xl text-gray-800 mb-2">
                        {{ $card->title }}
                    </p>

                    <p class="text-sm text-gray-600">
                        {{ $card->description }}
                    </p>

                </article>
            @endforeach

            {{-- DUPLICATE LOOP (REQUIRED) --}}
            @foreach($membershipSection->membershipCards as $card)
                <article
                    class="marquee-item shrink-0 min-w-[300px] p-8 rounded-2xl bg-white">

                    <div
                        class="w-20 h-20 icon-gradient-{{ $card->theme_color }}
                               rounded-2xl flex items-center justify-center
                               mx-auto mb-4 shadow-md">

                        @if($card->icon_type === 'emoji')
                            <span class="text-3xl">{{ $card->icon_value }}</span>

                        @elseif($card->icon_type === 'svg')
                            {!! $card->icon_value !!}

                        @elseif($card->icon_type === 'image')
                            <img
                                src="{{ asset('storage/' . $card->icon_value) }}"
                                class="w-10 h-10 object-contain"
                                alt="{{ $card->title }}">
                        @endif
                    </div>

                    <p class="font-bold text-xl text-gray-800 mb-2">
                        {{ $card->title }}
                    </p>

                    <p class="text-sm text-gray-600">
                        {{ $card->description }}
                    </p>

                </article>
            @endforeach

        </div>
    </div>
</div>
@endif
