@extends('websites.layouts') @section('content')
    <!-- Main Content -->
    <main>
        <!-- Hero Section -->

        <section id="home" class="pt-0">
            @include('websites.partial.slider')
        </section>

        {{-- <section id="home" class="gradient-bg crystal-pattern pt-32 pb-20 px-4">
                <div class="max-w-7xl mx-auto text-center">
                    <div class="mb-8 flex justify-center">
                        <div class="w-24 h-24 bg-white rounded-2xl shadow-2xl flex items-center justify-center transform rotate-6 hover:rotate-12 transition-transform"
                            role="img" aria-label="Innovation Icon">
                            <svg class="w-16 h-16 text-emerald-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                    </div>
                    <h1 id="hero-title" class="text-5xl md:text-6xl font-bold mb-6 text-white drop-shadow-lg">
                        Building Tomorrow's Technology Today
                    </h1>
                    <p id="hero-subtitle" class="text-xl md:text-2xl mb-4 text-white opacity-95 drop-shadow">
                        Enterprise Software Solutions from Bangladesh to the World
                    </p>
                    <p id="tagline" class="text-lg mb-8 text-white opacity-90">
                        Innovating Digital Solutions Globally
                    </p>
                    <button id="cta-button"
                        class="px-8 py-4 rounded-lg font-semibold text-lg text-white transition-all duration-300 hover:scale-105 shadow-xl"
                        aria-label="Get Started with SoftPolli">
                        Get Started
                    </button>
                </div>
            </section> --}}

        <!-- About Section -->

        <section id="about" class="section-padding px-4 py-20 bg-white">
            @include('websites.partial.aboutcontent')
        </section>
        <!-- Services Section -->
        <section id="services" class="section-padding px-4 bg-gray-50">
            @include('websites.partial.services')
        </section>
        <!-- Products Section -->
        <section id="products" class="section-padding px-4">
            @include('websites.partial.products')
        </section>

        <!-- Technology Stack -->
        <section id="tech-stack" class="section-padding px-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                @include('websites.partial.technology')
            </div>
        </section>

        <!-- Clients & Partners Section -->
        <section id="clients" class="section-padding px-4 bg-bg-white">
            <div class="max-w-7xl mx-auto">
                @include('websites.partial.clients')
            </div>
        </section>

        <!-- Testimonials Section -->


        <section id="testimonials" class="py-20 bg-gray-50 px-4">
            @include('websites.partial.testimonial')
        </section>



        <!-- Contact Section -->
        <section id="contact" class="section-padding px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Section Title -->
                @if ($contactSection)
                    @include('websites.partial.contactInfo')
                @endif

                <!-- Contact Info -->
                <div class="mt-16 grid md:grid-cols-3 gap-6 text-center">
                    @if (setting('contact_email'))
                        <address
                            class="p-6 rounded-2xl bg-gradient-to-br from-emerald-50 to-white border border-emerald-200 shadow-md not-italic">
                            <p class="font-bold text-gray-800">Email</p>
                            <p class="text-sm mt-2 text-gray-600">
                                <a href="mailto:{{ setting('contact_email') }}" class="hover:text-emerald-600">
                                    {{ setting('contact_email') }}
                                </a>
                            </p>
                        </address>
                    @endif

                    <address
                        class="p-6 rounded-2xl bg-gradient-to-br from-teal-50 to-white border border-teal-200 shadow-md not-italic">
                        <p class="font-bold text-gray-800">Phone</p>
                        <p class="text-sm mt-2 text-gray-600">
                            <a href="tel:+8801234567890" class="hover:text-teal-600">
                                {{ setting('contact_phone') }}
                            </a>
                        </p>
                    </address>

                    <address
                        class="p-6 rounded-2xl bg-gradient-to-br from-orange-50 to-white border border-orange-200 shadow-md not-italic">
                        <p class="font-bold text-gray-800">Location</p>
                        <p class="text-sm mt-2 text-gray-600">
                            {{ setting('contact_address') }}
                        </p>
                    </address>
                </div>
            </div>
        </section>

    </main>
@endsection
