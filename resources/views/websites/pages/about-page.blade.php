@extends('websites.layouts') @section('content')
    <main>
        <section id="about" class="flex flex-col items-start section-padding px-4 mt-16 py-8 bg-white">
            <div class="flex justify-start">
                <a href="{{ route('home') }}" class="bg-green-500 text-white px-4 py-2 rounded my-8">
                    Back
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-12 mb-16">

                @foreach ($aboutSection->cards as $card)
                    <article class="card-hover p-8 rounded-xl bg-white">

                        <div class="w-20 h-20 icon-gradient-green rounded-2xl flex items-center justify-center mb-6 shadow-lg transform hover:scale-110 transition-transform"
                            role="img" aria-label="{{ $card->title }} Icon">
                            @if ($card->icon)
                                <img src="{{ asset('storage/' . $card->icon) }}" alt="{{ $card->title }}"
                                    class="w-10 h-10">
                            @else
                                {{-- fallback icon --}}
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            @endif
                        </div>

                        <h3 class="text-2xl font-bold mb-4 text-gray-800">
                            {{ $card->title }}
                        </h3>

                        <p class="text-lg leading-relaxed text-gray-600">
                            {{ $card->content }}
                        </p>

                    </article>
                @endforeach

            </div>
        </section>
    </main>
@endsection



{{-- <h2 id="about-title" class="text-4xl font-bold text-center mb-12">
    About SoftPolli
</h2>
<div class="grid md:grid-cols-2 gap-12 mb-16">
    <article class="card-hover p-8 rounded-xl bg-white">
        <div class="w-20 h-20 icon-gradient-green rounded-2xl flex items-center justify-center mb-6 shadow-lg transform hover:scale-110 transition-transform"
            role="img" aria-label="Mission Icon">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <h3 id="mission-title" class="text-2xl font-bold mb-4 text-gray-800">
            Our Mission
        </h3>
        <p class="text-lg leading-relaxed text-gray-600">
            To deliver innovative software solutions that
            empower businesses globally, leveraging cutting-edge
            technology and exceptional talent from Bangladesh to
            create value for clients worldwide.
        </p>
    </article>
    <article class="card-hover p-8 rounded-xl bg-white">
        <div class="w-20 h-20 icon-gradient-teal rounded-2xl flex items-center justify-center mb-6 shadow-lg transform hover:scale-110 transition-transform"
            role="img" aria-label="Vision Icon">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </div>
        <h3 id="vision-title" class="text-2xl font-bold mb-4 text-gray-800">
            Our Vision
        </h3>
        <p class="text-lg leading-relaxed text-gray-600">
            To be recognized as a leading global software
            development company, pioneering digital
            transformation and setting new standards in software
            excellence across industries.
        </p>
    </article>
</div> --}}
