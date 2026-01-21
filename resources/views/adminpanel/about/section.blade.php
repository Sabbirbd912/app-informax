@extends('adminpanel.layout')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            About Section Settings
        </h2>

        @if(session('success'))
            <div class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <form action="{{ route('about.section.update') }}" method="POST">
                @csrf

                <div class="mt-4">
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold">Main Title</span>
                        <input type="text" name="main_title" 
                            value="{{ old('main_title', $section->main_title) }}"
                            class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                            placeholder="e.g. Who We Are" />
                    </label>
                </div>

                <div class="flex mt-6 text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" 
                            {{ $section->is_active ? 'checked' : '' }}
                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" />
                        <span class="ml-2 font-medium">
                            Enable About Section on Frontend
                        </span>
                    </label>
                </div>

                <div class="flex justify-start gap-3 mt-8 pb-4">
                    <button type="submit"
                        class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection