@include('adminpanel.partials.head')



<div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    @include('adminpanel.partials.sidebar')
    <!-- sidebar menu end mobile sidebar -->

    <!-- Main Content Start in this wraper with header & Navber -->
    <div class="flex flex-col flex-1 w-full">
        <!-- topbar/header including search and profile -->
        @include('adminpanel.partials.header')
        <!-- topbar/header end -->

        <!-- main Content start -->
        @yield('content')
        <!-- main Content end -->
    </div>
</div>
@include('adminpanel.partials.foot')
