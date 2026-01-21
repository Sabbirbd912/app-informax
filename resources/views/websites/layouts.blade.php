@include('websites.partial.header')

<div class="main-wrapper">
    <!-- Navigation -->
    <header>@include('websites.partial.navbar')</header>

    <body class="h-full">
        @yield('content')


        <!-- Footer -->
        <footer class="py-12 px-4 bg-gradient-to-br from-gray-900 to-gray-800 text-white">
            @include('websites.partial.footer')
        </footer>
</div>
@include('websites.partial.bottom')
