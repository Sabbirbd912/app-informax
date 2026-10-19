<nav id="navbar" class="fixed w-full top-0 z-50 bg-[#637783b5] backdrop-blur-md border-b border-white/10 py-2">

    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">

            {{-- Logo --}}
            <a href="#home" class="flex items-center space-x-3">
                <img src="{{ setting_image('company_logo') }}" alt="SoftPolli logo"
                    class="h-8 w-auto max-w-[150px] object-contain"
                    onerror="this.onerror=null;this.src='{{ asset('websites_assets/images/SoftPolli-logo-offset.png') }}'">
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex space-x-8">
                @foreach($navbarMenus as $menu)
                    <a href="{{ $menu->link }}" class="font-medium text-white hover:text-emerald-400">
                        {{ $menu->title }}
                    </a>
                @endforeach
            </div>

            {{-- Mobile Button --}}
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-white hover:bg-white/10"
                aria-label="Toggle mobile menu" aria-expanded="false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-black/80 text-white">
        <div class="px-4 py-3 space-y-2">
            @foreach($navbarMenus as $menu)
                <a href="{{ $menu->link }}" class="block py-2 hover:text-emerald-400">
                    {{ $menu->title }}
                </a>
            @endforeach
        </div>
    </div>
</nav>





{{-- <nav id="navbar"
    class="fixed w-full top-0 z-50 transition-all duration-300 bg-black/60 backdrop-blur-md border-b border-white/10"
    role="navigation" aria-label="Main Navigation">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <a href="#home" class="flex items-center space-x-3">

                    <img src="{{ Storage::url(setting('company_logo')) }}" alt="Logo"
                        class="w-10 h-10 rounded-md object-contain" />
                    <span id="company-name" class="text-2xl font-bold text-white">{{ setting('company_name') }}</span>
                </a>
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="#home"
                    class="nav-link font-medium text-white hover:text-emerald-400 transition-colors">Home</a>
                <a href="#about" class="nav-link font-medium text-white hover:text-emerald-400 transition-colors">About
                    Us</a>
                <a href="#services"
                    class="nav-link font-medium text-white hover:text-emerald-400 transition-colors">Services</a>
                <a href="#products"
                    class="nav-link font-medium text-white hover:text-emerald-400 transition-colors">Products</a>
                <a href="#clients"
                    class="nav-link font-medium text-white hover:text-emerald-400 transition-colors">Clients</a>
                <a href="#contact"
                    class="nav-link font-medium text-white hover:text-emerald-400 transition-colors">Contact Us</a>
            </div>

            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-white hover:bg-white/10"
                aria-label="Toggle mobile menu" aria-expanded="false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-black/80 backdrop-blur-lg border-t border-white/10 text-white">
        <div class="px-4 pt-2 pb-4 space-y-2">
            <a href="#home" class="block py-2 font-medium hover:text-emerald-400">Home</a>
            <a href="#about" class="block py-2 font-medium hover:text-emerald-400">About Us</a>
            <a href="#services" class="block py-2 font-medium hover:text-emerald-400">Services</a>
            <a href="#products" class="block py-2 font-medium hover:text-emerald-400">Products</a>
            <a href="#clients" class="block py-2 font-medium hover:text-emerald-400">Clients</a>
            <a href="#contact" class="block py-2 font-medium hover:text-emerald-400">Contact Us</a>
        </div>
    </div>
</nav> --}}
{{-- <img src="{{ asset('storage/' . setting('company_logo')) }} " alt=""> --}}
