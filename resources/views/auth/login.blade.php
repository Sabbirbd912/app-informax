{{-- <x-guest-layout>
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">

    </div>
</x-guest-layout> --}}

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    {{-- Tailwind & Windmill Assets --}}
    <link rel="stylesheet" href="{{ asset('adminpanel_assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('adminpanel_assets/js/init-alpine.js') }}"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">

                {{-- Image Section --}}
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('adminpanel_assets/img/login.jpg') }}" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('adminpanel_assets/img/create-account-office.jpeg') }}" alt="Office" />
                </div>

                {{-- Form Section --}}
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            {{ __('Login') }}
                        </h1>

                        @if (session('status'))
                            <div class="mb-4 text-sm font-medium text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- Email Address --}}
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">{{ __('Email') }}</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md border-gray-300"
                                    type="email" name="email" value="{{ old('email') }}" required autofocus
                                    placeholder="jane@example.com" />
                                @error('email')
                                    <span class="text-xs text-red-600 dark:text-red-400 mt-2">{{ $message }}</span>
                                @enderror
                            </label>

                            {{-- Password --}}
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">{{ __('Password') }}</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md border-gray-300"
                                    type="password" name="password" required autocomplete="current-password"
                                    placeholder="***************" />
                                @error('password')
                                    <span class="text-xs text-red-600 dark:text-red-400 mt-2">{{ $message }}</span>
                                @enderror
                            </label>

                            {{-- Remember Me --}}
                            <div class="block mt-4">
                                <label for="remember_me"
                                    class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-purple-600 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
                                        name="remember">
                                    <span class="ms-2">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            {{-- Login Button --}}
                            <button type="submit"
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                {{ __('Log in') }}
                            </button>
                        </form>

                        <hr class="my-8 border-gray-200 dark:border-gray-700" />

                        {{-- Links --}}
                        @if (Route::has('password.request'))
                            <p class="mt-4">
                                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </p>
                        @endif

                        <p class="mt-1">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="/">
                                &larr; Back to Website
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>