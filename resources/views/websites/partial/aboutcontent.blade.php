{{-- @if ($aboutSection)
    <div class="max-w-7xl mx-auto">
        <h2 id="about-title" class="text-4xl font-bold text-center mb-16 text-gray-900">
            {{ $aboutSection->main_title }}
        </h2>

        <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-16">
            <div class="w-full md:w-1/2 flex flex-col">
                <h3 class="text-3xl font-bold mb-6 text-emerald-600">
                    Empowering Global Businesses
                </h3>
                <p class="text-lg text-gray-600 leading-loose mb-8" style="text-align: justify;">
                    SoftPolli is a domain‑focused software company specializing in Financial
                    Industry platforms (Insurance, Leasing, Bank, etc.) and Public/Private‑sector enterprise
                    business process automation with bespoke solutions. Since 2020, we have helped insurers,
                    banks, and enterprises modernize operations, unlock regulatory integrations, and launch
                    digital distribution with measurable outcomes. We blend enterprise‑grade engineering with
                    practical domain knowledge to deliver reliable, compliant, and scalable solutions.
                </p>

                <div>
                    <a href="about.html"
                        class="inline-flex items-center px-8 py-3 bg-emerald-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition-all duration-300 shadow-md hover:shadow-xl group">
                        Know More
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="w-full md:w-1/2">
                <div class="rounded-2xl overflow-hidden shadow-2xl border border-gray-100">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&q=80&w=1000"
                        alt="SoftPolli Team Workspace" class="w-full h-[450px] object-cover" />
                </div>
            </div>
        </div>
    </div>
@endif --}}






@if($aboutSection && $aboutSection->content)
<div class="max-w-7xl mx-auto">

    {{-- SECTION TITLE --}}
    <h2 id="about-title"
        class="text-4xl font-bold text-center mb-16 text-gray-900">
        {{ $aboutSection->main_title }}
    </h2>

    <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-16">

        {{-- LEFT CONTENT --}}
        <div class="w-full md:w-1/2 flex flex-col">

            <h3 class="text-3xl font-bold mb-6 text-emerald-600">
                {{ $aboutSection->content->title }}
            </h3>

            <p class="text-lg text-gray-600 leading-loose mb-8 text-justify">
                {!! nl2br(e($aboutSection->content->description)) !!}
            </p>

            @if(!empty($aboutSection->content->button_text))
                <div>
                    <a href="{{route('about.page')}}"
                       class="inline-flex items-center px-8 py-3 bg-emerald-600 text-white font-bold rounded-lg
                              hover:bg-indigo-700 transition-all duration-300 shadow-md hover:shadow-xl group">

                        {{ $aboutSection->content->button_text }}

                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            @endif

        </div>

        {{-- RIGHT IMAGE --}}
        <div class="w-full md:w-1/2">
            <div class="rounded-2xl overflow-hidden shadow-2xl border border-gray-100">
                <img
                    src="{{ asset('storage/'.$aboutSection->content->image) }}"
                    alt="{{ $aboutSection->content->image_alt ?? $aboutSection->content->title }}"
                    class="w-full h-[450px] object-cover"
                />
            </div>
        </div>

    </div>
</div>
@endif
