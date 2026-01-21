@extends('adminpanel.layout')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Testimonial
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 dark:bg-red-700 text-red-700 dark:text-red-100 rounded-lg">
                    <ul class="list-disc list-inside text-sm font-semibold">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Name --}}
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold">Client Name</span>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                    </label>

                    {{-- Company --}}
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold">Company</span>
                        <input type="text" name="company" value="{{ old('company') }}"
                               class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                    </label>

                    {{-- Designation --}}
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold">Designation</span>
                        <input type="text" name="designation" value="{{ old('designation') }}"
                               class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                    </label>

                    {{-- Order --}}
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold">Display Order</span>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                               class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                    </label>

                    {{-- Message --}}
                    <label class="block text-sm md:col-span-2">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold">Message</span>
                        <textarea name="message" rows="4" required
                                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">{{ old('message') }}</textarea>
                    </label>

                    {{-- Photo --}}
                    <label class="block text-sm md:col-span-2">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold">Client Photo</span>
                        <input type="file" name="photo"
                               class="block w-full mt-1 text-sm dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-md">
                        <small class="text-gray-500">Max 100kb (Recommended 1:1 ratio)</small>
                    </label>

                    {{-- Active Status --}}
                    <div class="flex items-center pt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="checkbox" name="is_active" checked
                                   class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                            <span class="ml-2 text-sm font-semibold">Visible on Website</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-8">
                    <a href="{{ route('admin.testimonials.index') }}"
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Save Testimonial
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
