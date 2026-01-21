@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            {{-- Header Section --}}
            <div class="flex items-center justify-between my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Add New Service
                </h2>
                <a href="{{ route('services.index') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg dark:text-gray-400 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray shadow-sm">
                    &larr; Back to List
                </a>
            </div>

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

                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Service Title --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Service Title *</span>
                            <input name="title" value="{{ old('title') }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-gray-300 rounded-md p-2.5"
                                placeholder="e.g. Web Development" required />
                        </label>

                        {{-- Theme Color --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Theme Color</span>
                            <select name="theme_color"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray border-gray-300 rounded-md p-2.5"
                                required>
                                <option value="teal">Teal (Greenish)</option>
                                <option value="blue">Blue</option>
                                <option value="orange">Orange</option>
                                <option value="purple">Purple</option>
                                <option value="red">Red</option>
                            </select>
                        </label>

                        {{-- Icon Selection System --}}
                        <div class="space-y-4 md:col-span-1">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Icon Type</span>
                                <select id="icon_type" name="icon_type" required
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                    <option value="emoji">Emoji</option>
                                    <option value="svg">SVG Code</option>
                                    <option value="image">Image Upload</option>
                                </select>
                            </label>

                            <label class="block text-sm">
                                <span id="icon_label" class="text-gray-700 dark:text-gray-400 font-semibold">Enter
                                    Emoji</span>

                                {{-- For Emoji/SVG --}}
                                <input type="text" name="icon_value" id="icon_value_text"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2.5"
                                    placeholder="e.g. 💻" />

                                {{-- For Image --}}
                                <input type="file" name="icon_image" id="icon_value_image"
                                    class="hidden block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 border-gray-300 rounded-md p-1.5 focus:outline-none" />
                            </label>
                        </div>

                        {{-- Order Number --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Display Order</span>
                            <input name="order" type="number" value="{{ old('order', 0) }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        {{-- Description (Full Width) --}}
                        <label class="block text-sm md:col-span-2">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Description *</span>
                            <textarea name="description"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray border-gray-300 rounded-md p-2.5"
                                rows="4" placeholder="Describe your service in detail..." required>{{ old('description') }}</textarea>
                        </label>

                        {{-- Button Config --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Button Text</span>
                            <input name="button_text" value="{{ old('button_text', 'Learn More') }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-semibold">Button Link (URL)</span>
                            <input name="button_link" value="{{ old('button_link') }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-gray-300 rounded-md p-2.5"
                                placeholder="https://..." />
                        </label>

                        {{-- Toggle Status --}}
                        <div class="flex items-center mt-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600">
                                </div>
                                <span class="ml-3 text-sm font-semibold text-gray-700 dark:text-gray-300">Active
                                    Status</span>
                            </label>
                        </div>

                    </div>

                    {{-- Action Button --}}
                    <div class="flex justify-end gap-3 mt-8 border-t pt-6">
                        <button type="submit"
                            class="px-10 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple shadow-md">
                            Save Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    {{-- Script for Dynamic Icon Input --}}
    <script>
        document.getElementById('icon_type').addEventListener('change', function() {
            const textInput = document.getElementById('icon_value_text');
            const imageInput = document.getElementById('icon_value_image');
            const label = document.getElementById('icon_label');

            if (this.value === 'image') {
                imageInput.classList.remove('hidden');
                textInput.classList.add('hidden');
                label.innerText = 'Upload Icon Image';
            } else {
                imageInput.classList.add('hidden');
                textInput.classList.remove('hidden');
                label.innerText = (this.value === 'emoji') ? 'Enter Emoji' : 'Paste SVG Code';
                textInput.placeholder = (this.value === 'emoji') ? 'e.g. 💻' : '<svg>...</svg>';
            }
        });
    </script>
@endsection
