@extends('adminpanel.layout')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Testimonial Section Settings
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form method="POST" action="{{ route('membership-section.update') }}">
                @csrf
                @method('PUT')

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400 font-medium">Section Title</span>
                    <input name="title" value="{{ old('title', $section->title) }}"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-2.5 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        placeholder="Enter Section Title">
                </label>

                <div class="mt-4 text-sm">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400 font-medium">
                        <input type="checkbox" name="is_active" {{ $section->is_active ? 'checked' : '' }}
                            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray w-4 h-4">
                        <span class="ml-2">Active (Enable visibility on frontend)</span>
                    </label>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="px-5 py-2.5 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
