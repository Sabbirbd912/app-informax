<div class="max-w-7xl mx-auto">
    <div class="grid md:grid-cols-4 gap-8 mb-8">
        <div>
            <a href="{{ route('home') }}" class="inline-flex items-center mb-4" aria-label="SoftPolli home">
                <img src="{{ setting_image('company_logo') }}" alt="SoftPolli logo"
                    class="h-10 w-auto max-w-[200px] object-contain"
                    onerror="this.onerror=null;this.src='{{ asset('websites_assets/images/SoftPolli-logo-offset.png') }}'">
            </a>
            <p class="text-sm leading-relaxed text-gray-300">
                {{ setting('footer_intro') }}
            </p>
        </div>
        <nav aria-label="Footer Quick Links" class="ml-4 sm:ml-8 md:ml-12 lg:ml-16 xl:ml-20">
            <h4 class="font-bold  mb-4 text-teal-400">Quick Links</h4>
            {{-- <ul class="space-y-2 text-sm">
                <li>
                    <a href="#home" class="text-gray-300 hover:text-emerald-400 transition-colors">Home</a>
                </li>
                <li>
                    <a href="#about" class="text-gray-300 hover:text-emerald-400 transition-colors">About Us</a>
                </li>
                <li>
                    <a href="#services" class="text-gray-300 hover:text-emerald-400 transition-colors">Services</a>
                </li>
                <li>
                    <a href="#products" class="text-gray-300 hover:text-emerald-400 transition-colors">Products</a>
                </li>
            </ul> --}}
            <ul class="space-y-2 text-sm">
                @foreach($navbarMenus as $menu)
                    <li>
                        <a href="{{ $menu->link }}" class="text-gray-300 hover:text-emerald-400 transition-colors">
                            {{ $menu->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <nav aria-label="Footer Services">
            <h4 class="font-bold mb-4 text-orange-400">Services</h4>

            <ul class="space-y-2 text-sm">
                @foreach($serviceSection?->services ?? [] as $service)
                    <li>
                        <a href="{{ $service->button_link }}" class="text-gray-300 hover:text-orange-400 transition-colors">
                            {{ $service->title }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- <ul class="space-y-2 text-sm">
                <li>
                    <a href="#services" class="text-gray-300 hover:text-orange-400 transition-colors">Custom
                        Development</a>
                </li>
                <li>
                    <a href="#services" class="text-gray-300 hover:text-orange-400 transition-colors">Web
                        Applications</a>
                </li>
                <li>
                    <a href="#services" class="text-gray-300 hover:text-orange-400 transition-colors">Mobile Apps</a>
                </li>
                <li>
                    <a href="#services" class="text-gray-300 hover:text-orange-400 transition-colors">Cloud
                        Solutions</a>
                </li>
            </ul> --}}
        </nav>
        <div>
            <h4 class="font-bold mb-4 text-blue-400">Connect</h4>
            {{-- <div class="flex space-x-4" role="list" aria-label="Social Media Links">
                <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer"
                    class="w-12 h-12 icon-gradient-green rounded-xl flex items-center justify-center hover:scale-110 transition-transform shadow-lg"
                    aria-label="Visit our Facebook page" role="listitem">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewbox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z" />
                    </svg></a>
                <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer"
                    class="w-12 h-12 icon-gradient-teal rounded-xl flex items-center justify-center hover:scale-110 transition-transform shadow-lg"
                    aria-label="Visit our LinkedIn page" role="listitem">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewbox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                    </svg></a>
                <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer"
                    class="w-12 h-12 icon-gradient-blue rounded-xl flex items-center justify-center hover:scale-110 transition-transform shadow-lg"
                    aria-label="Visit our Twitter page" role="listitem">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewbox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                    </svg></a>
            </div> --}}

            <div class="flex space-x-4">
                @foreach($socialLinks as $link)
                    <a href="{{ $link->url }}" target="_blank"
                    class="w-12 h-12 icon-gradient-{{ $link->theme_color }}
                            rounded-xl flex items-center justify-center
                            hover:scale-110 transition shadow-lg">

                        @if($link->icon_type === 'svg')
                            {!! $link->icon_value !!}
                        @else
                            <span class="text-2xl">{{ $link->icon_value }}</span>
                        @endif
                    </a>
                @endforeach
            </div>


        </div>
    </div>
    <div class="border-t border-gray-700 pt-8 text-center">
        <p id="footer-text" class="text-sm text-gray-300">
            {{ setting('footer_text') }}
        </p>
        <p class="text-xs mt-2 text-gray-400">
            Registered in Bangladesh | Serving Clients Globally
        </p>
    </div>
</div>
