@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Edit Service: <span class="text-purple-600">{{ $service->title }}</span>
            </h2>

            {{-- Form Card --}}
            <div class="px-6 py-5 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 border dark:border-gray-700">

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="p-4 mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Service Title --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Service Title *</span>
                            <input name="title" value="{{ old('title', $service->title) }}" required
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        {{-- Theme Color --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Theme Color</span>
                            <select name="theme_color"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                @foreach (['teal', 'blue', 'orange', 'purple', 'red'] as $color)
                                    <option value="{{ $color }}" @selected(old('theme_color', $service->theme_color) == $color)>
                                        {{ ucfirst($color) }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        {{-- Icon Selection System --}}
                        <div class="space-y-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Icon Type</span>
                                <select id="icon_type" name="icon_type" required
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                    <option value="emoji" @selected($service->icon_type === 'emoji')>Emoji</option>
                                    <option value="svg" @selected($service->icon_type === 'svg')>SVG Code</option>
                                    <option value="image" @selected($service->icon_type === 'image')>Image Upload</option>
                                </select>
                            </label>

                            <div class="block text-sm">
                                <span id="icon_label" class="text-gray-700 dark:text-gray-400 font-semibold">Icon
                                    Content</span>

                                {{-- For Emoji/SVG --}}
                                <input type="text" name="icon_value_text" id="icon_value_text"
                                    value="{{ old('icon_value_text', $service->icon_type !== 'image' ? $service->icon_value : '') }}"
                                    class="hidden block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2.5" />

                                {{-- For Image --}}
                                <input type="file" name="icon_image" id="icon_value_image"
                                    class="hidden block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 border-gray-300 rounded-md p-1.5 focus:outline-none" />
                            </div>
                        </div>

                        {{-- Display Order & Current Icon Preview --}}
                        <div class="grid grid-cols-2 gap-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Display Order</span>
                                <input name="order" type="number" value="{{ old('order', $service->order) }}"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2.5" />
                            </label>

                            <div class="flex flex-col items-center">
                                <span class="text-xs text-gray-500 mb-1 font-bold uppercase">Current Icon</span>
                                <div
                                    class="w-16 h-16 flex items-center justify-center bg-gray-50 dark:bg-gray-700 rounded-lg border dark:border-gray-600 overflow-hidden">
                                    @if ($service->icon_type === 'emoji')
                                        <span class="text-3xl">{{ $service->icon_value }}</span>
                                    @elseif($service->icon_type === 'image')
                                        <img src="{{ asset('storage/' . $service->icon_value) }}"
                                            class="w-full h-full object-contain p-1">
                                    @elseif($service->icon_type === 'svg')
                                        <div class="w-10 h-10 text-gray-600 dark:text-gray-300">{!! $service->icon_value !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Description (Full Width) --}}
                        <label class="block text-sm md:col-span-2">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Description *</span>
                            <textarea name="description" rows="4" required
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">{{ old('description', $service->description) }}</textarea>
                        </label>

                        {{-- Button Config --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Button Text</span>
                            <input name="button_text" value="{{ old('button_text', $service->button_text) }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Button Link (URL)</span>
                            <input type="text" name="button_link" value="{{ old('button_link', $service->button_link) }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        {{-- Active Status Toggle --}}
                        <div class="flex items-center mt-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                                    @checked(old('is_active', $service->is_active))>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600">
                                </div>
                                <span class="ml-3 text-sm font-semibold text-gray-700 dark:text-gray-300">Active
                                    Status</span>
                            </label>
                        </div>

                    </div>

                    {{-- Form Actions --}}
                    <div class="flex justify-end gap-3 mt-8 border-t pt-6">
                        <a href="{{ route('services.index') }}"
                            class="px-6 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:shadow-outline-gray dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-10 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple shadow-md">
                            Update Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    {{-- Script for Dynamic Icon Input --}}
    <script>
        function toggleIconInputs() {
            const type = document.getElementById('icon_type').value;
            const textInput = document.getElementById('icon_value_text');
            const imageInput = document.getElementById('icon_value_image');
            const label = document.getElementById('icon_label');

            textInput.classList.add('hidden');
            imageInput.classList.add('hidden');

            if (type === 'emoji' || type === 'svg') {
                textInput.classList.remove('hidden');
                label.innerText = (type === 'emoji') ? 'Enter Emoji' : 'Paste SVG Code';
                textInput.placeholder = (type === 'emoji') ? 'e.g. 💻' : '<svg>...</svg>';
            } else if (type === 'image') {
                imageInput.classList.remove('hidden');
                label.innerText = 'Upload New Icon Image';
            }
        }

        document.getElementById('icon_type').addEventListener('change', toggleIconInputs);
        window.addEventListener('DOMContentLoaded', toggleIconInputs);
    </script>
@endsection
