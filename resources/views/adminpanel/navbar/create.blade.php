@extends('adminpanel.layout')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Add Navbar Menu
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <form method="POST" action="{{ route('navbar-menus.store') }}">
                @csrf

                <label class="block text-sm">
                    <span class="text-gray-700">Menu Title</span>
                    <input name="title"
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                        placeholder="Home / About Us" required />
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">Link</span>
                    <input name="link"
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                        placeholder="#home / /contact" required />
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700">Display Order</span>
                    <input type="number" name="order"
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                        placeholder="0" />
                </label>

                <div class="flex mt-6 text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" checked
                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" />
                        <span class="ml-2">
                            Active (Show on website)
                        </span>
                    </label>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Save Menu
                    </button>
                    <a href="{{ route('navbar-menus.index') }}" 
                        class="ml-2 px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-200 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection