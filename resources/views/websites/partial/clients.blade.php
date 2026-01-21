{{-- <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
    Our Clients &amp; Partners
</h2>
<div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16" role="list" aria-label="Clients and Partners">
    <div class="p-6 rounded-2xl bg-white shadow-md hover:shadow-xl transition-shadow" role="listitem">
        <div class="text-center">
            <div class="w-24 h-24 icon-gradient-green rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"
                role="img" aria-label="Enterprise Client">
                <span class="text-4xl" aria-hidden="true">🏢</span>
            </div>
            <p class="font-semibold text-gray-800">
                Enterprise Client 1
            </p>
        </div>
    </div>
    <div class="p-6 rounded-2xl bg-white shadow-md hover:shadow-xl transition-shadow" role="listitem">
        <div class="text-center">
            <div class="w-24 h-24 icon-gradient-teal rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"
                role="img" aria-label="Global Partner">
                <span class="text-4xl" aria-hidden="true">🌐</span>
            </div>
            <p class="font-semibold text-gray-800">
                Global Partner 1
            </p>
        </div>
    </div>
    <div class="p-6 rounded-2xl bg-white shadow-md hover:shadow-xl transition-shadow" role="listitem">
        <div class="text-center">
            <div class="w-24 h-24 icon-gradient-blue rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"
                role="img" aria-label="Government Agency">
                <span class="text-4xl" aria-hidden="true">🏛️</span>
            </div>
            <p class="font-semibold text-gray-800">
                Government Agency
            </p>
        </div>
    </div>
    <div class="p-6 rounded-2xl bg-white shadow-md hover:shadow-xl transition-shadow" role="listitem">
        <div class="text-center">
            <div class="w-24 h-24 icon-gradient-orange rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg"
                role="img" aria-label="Education Sector">
                <span class="text-4xl" aria-hidden="true">🎓</span>
            </div>
            <p class="font-semibold text-gray-800">
                Education Sector
            </p>
        </div>
    </div>
</div> --}}


{{-- @if ($clientSection)
    <div class="max-w-7xl mx-auto">

        <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
            {{ $clientSection->title }}
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16" role="list" aria-label="Clients and Partners">

            @foreach ($clientSection->items as $item)
                <div class="p-6 rounded-2xl bg-white shadow-md hover:shadow-xl transition-shadow" role="listitem">

                    <div class="text-center">

                        <div class="w-24 h-24
                                    icon-gradient-{{ $item->theme_color ?? 'green' }}
                                    rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg" role="img"
                            aria-label="{{ $item->name }}">

                            @if ($item->icon_type === 'emoji')
                                <span class="text-4xl">{{ $item->icon_value }}</span>

                            @elseif($item->icon_type === 'image')
                                <img src="{{ Storage::url($item->icon_value) }}" class="w-12 h-12" alt="{{ $item->name }}">

                            @elseif($item->icon_type === 'svg')
                                {!! $item->icon_value !!}
                            @endif

                        </div>

                        <p class="font-semibold text-gray-800">{{ $item->name }}</p>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endif --}}



@if ($clientSection)
    <div class="max-w-7xl mx-auto">

        <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
            {{ $clientSection->title }}
        </h2>

        {{-- MARQUEE WRAPPER --}}
        <div class="relative overflow-hidden mb-20" role="region" aria-label="Clients and Partners">



            <div class="client-marquee flex gap-10 items-center py-8">
                {{-- Double loop for seamless scrolling --}}
                @foreach ([1, 2] as $iteration)
                    @foreach ($clientSection->items as $item)
                        <div class="flex-none w-[180px] md:w-[220px]">
                            {{-- Logo Container: Fixed height and width with flex centering --}}
                            <div
                                class="h-24 w-full flex items-center justify-center px-4 filter grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-500 ease-in-out">

                                @if ($item->icon_type === 'emoji')
                                    <span class="text-5xl">{{ $item->icon_value }}</span>
                                @elseif ($item->icon_type === 'image')
                                    <img src="{{ asset('storage/' . $item->icon_value) }}" alt="{{ $item->name }}"
                                        class="max-h-16 w-auto max-w-full object-contain">
                                @elseif ($item->icon_type === 'svg')
                                    {{-- Standardize SVG sizing --}}
                                    <div
                                        class="h-12 w-auto flex items-center [&>svg]:h-full [&>svg]:w-auto [&>svg]:fill-current text-gray-600">
                                        {!! $item->icon_value !!}
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

    </div>
@endif




<!-- Membership -->
@include('websites.partial.membership')
