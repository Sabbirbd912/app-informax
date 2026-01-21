{{-- <h2 id="contact-title" class="text-4xl font-bold text-center mb-12 text-gray-800">
    Get In Touch
</h2> --}}

<h2 class="text-4xl font-bold text-center mb-12">
    {{ $contactSection->section_title }}
</h2>




<!-- Form + Map Layout -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
    <!-- Contact Form Card -->
    <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12 h-full flex flex-col">
        {{-- <form id="contact-form" class="space-y-6 flex-1" aria-label="Contact Form">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-1">
                    <label for="name" class="block font-semibold text-gray-700">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" required placeholder="John Doe"
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 focus:outline-none transition-all duration-200 bg-white text-gray-800 placeholder-gray-400" />
                </div>

                <div class="space-y-1">
                    <label for="email" class="block font-semibold text-gray-700">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" required placeholder="john@example.com"
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 focus:outline-none transition-all duration-200 bg-white text-gray-800 placeholder-gray-400" />
                </div>
            </div>

            <div class="mb-6 space-y-1">
                <label for="company" class="block font-semibold text-gray-700">
                    Company Name
                </label>
                <input type="text" id="company" name="company" placeholder="Your Company Ltd."
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 focus:outline-none transition-all duration-200 bg-white text-gray-800 placeholder-gray-400" />
            </div>

            <div>
                <label for="service" class="block font-semibold mb-2 text-gray-700">
                    Service Interest
                </label>
                <select id="service" name="service"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-emerald-500 focus:outline-none transition-colors bg-gray-50 text-gray-800">
                    <option value="">Select a service</option>
                    <option value="custom">Custom Software Development</option>
                    <option value="web">Web Application Development</option>
                    <option value="mobile">Mobile App Development</option>
                    <option value="cloud">Cloud Solutions</option>
                    <option value="qa">Quality Assurance</option>
                    <option value="consulting">IT Consulting</option>
                </select>
            </div>

            <div>
                <label for="message" class="block font-semibold mb-2 text-gray-700">
                    Message
                </label>
                <textarea id="message" name="message" rows="5" required
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-emerald-500 focus:outline-none transition-colors bg-gray-50 text-gray-800"></textarea>
            </div>

            <button type="submit"
                class="w-full py-4 rounded-lg font-semibold text-lg text-white bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 transition-all duration-300 hover:scale-105 shadow-lg">
                Send Message
            </button>
        </form> --}}


        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 rounded shadow-sm">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" id="contact-form" class="space-y-6 flex-1">
            @csrf

            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-1">
                    <label for="name" class="block font-semibold text-gray-700">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        placeholder="John Doe"
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 focus:outline-none transition-all duration-200 bg-white text-gray-800" />
                    @error('name')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label for="email" class="block font-semibold text-gray-700">Email Address <span
                            class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        placeholder="john@example.com"
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 focus:outline-none transition-all duration-200 bg-white text-gray-800" />
                    @error('email')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-6 space-y-1">
                <label for="company" class="block font-semibold text-gray-700">Company Name</label>
                <input type="text" id="company" name="company" value="{{ old('company') }}"
                    placeholder="Your Company Ltd."
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-emerald-500 focus:outline-none transition-all bg-white text-gray-800" />
            </div>

            <div>
                <label for="service" class="block font-semibold mb-2 text-gray-700">Service Interest</label>
                <select id="service" name="service"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-emerald-500 focus:outline-none bg-gray-50 text-gray-800">
                    <option value="">Select a service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->title }}" {{ old('service') == $service->title ? 'selected' : '' }}>
                            {{ $service->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="text" name="website" style="display:none !important" tabindex="-1" autocomplete="off">

            <div>
                <label for="message" class="block font-semibold mb-2 text-gray-700">Message <span
                        class="text-red-500">*</span></label>
                <textarea id="message" name="message" rows="5" required placeholder="Write your message here..."
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-emerald-500 focus:outline-none bg-gray-50 text-gray-800">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_SITE_KEY') }}"></div>
                @error('cf-turnstile-response')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-4 rounded-lg font-semibold text-lg text-white bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 transition-all duration-300 hover:scale-[1.02] shadow-lg">
                Send Message
            </button>
        </form>

    </div>

    <!-- Map Card -->
    <div class="bg-white rounded-2xl shadow-2xl h-full p-6 flex flex-col">

        <div class="flex-1 w-full min-h-[380px] rounded-lg overflow-hidden border border-gray-200">
            {{-- <iframe class="w-full h-full"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1535.3886107263486!2d90.36543992390268!3d23.754862631991994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bfda4a38ae89%3A0xa9abd9bf2ec382f5!2sInformax%20Technology%20Limited!5e0!3m2!1sen!2sbd!4v1765620914657!5m2!1sen!2sbd"
                loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
            </iframe> --}}

            <iframe class="w-full h-full" src="{{ $contactSection->map_embed_url }}" loading="lazy" allowfullscreen>
            </iframe>

        </div>

        {{-- <h4 class="text-orange-300 text-center text-3xl font-extrabold mt-4">
            Reach Us
        </h4> --}}

        <h4 class="text-orange-300 text-center text-3xl font-extrabold mt-4">
            {{ $contactSection->map_title }}
        </h4>
    </div>
</div>
