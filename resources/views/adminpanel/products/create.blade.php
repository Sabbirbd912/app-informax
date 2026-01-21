@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add New Product
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                {{-- Error Messages --}}
                @if ($errors->any())
                    <div class="p-4 mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Left Column --}}
                        <div class="space-y-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Product Title *</span>
                                <input type="text" name="title" value="{{ old('title') }}" required
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300"
                                    placeholder="e.g. Premium SaaS Tool" />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Icon Type</span>
                                <select id="icon_type" name="icon_type" required
                                    class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300">
                                    <option value="emoji">Emoji</option>
                                    <option value="svg">SVG Code</option>
                                    <option value="image">Image Upload</option>
                                </select>
                            </label>

                            {{-- Dynamic Icon Inputs --}}
                            <div id="icon_input_container">
                                <label class="block text-sm">
                                    <span id="icon_label" class="text-gray-700 dark:text-gray-400 font-semibold">Enter
                                        Emoji</span>

                                    {{-- Text Input for Emoji/SVG --}}
                                    <input type="text" name="icon_value" id="icon_value_text"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300"
                                        placeholder="Paste here..." />

                                    {{-- File Input for Image --}}
                                    <input type="file" name="icon_image" id="icon_value_image"
                                        class="hidden block w-full mt-1 text-sm border border-gray-300 rounded-md p-1.5 focus:outline-none focus:border-purple-400 dark:bg-gray-700 dark:text-gray-300" />
                                </label>
                            </div>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Theme Color</span>
                                <select name="theme_color"
                                    class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300">
                                    <option value="orange">Orange</option>
                                    <option value="teal">Teal</option>
                                    <option value="blue">Blue</option>
                                    <option value="emerald">Emerald</option>
                                </select>
                            </label>
                        </div>

                        {{-- Right Column --}}
                        <div class="space-y-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Description *</span>
                                <textarea name="description" rows="4" required
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300"
                                    placeholder="Enter product details...">{{ old('description') }}</textarea>
                            </label>

                            <div class="grid grid-cols-2 gap-4">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold">Button Text</span>
                                    <input type="text" name="button_text" value="{{ old('button_text', 'Buy Now') }}"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300" />
                                </label>

                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold">Button Link</span>
                                    <input type="url" name="button_link" value="{{ old('button_link') }}"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300"
                                        placeholder="https://..." />
                                </label>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold">Display Order</span>
                                    <input type="number" name="order" value="{{ old('order', 0) }}"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300" />
                                </label>

                                <div class="flex items-center pt-6">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="is_active" class="sr-only peer" checked>
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600">
                                        </div>
                                        <span
                                            class="ml-3 text-sm font-semibold text-gray-700 dark:text-gray-300">Active</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-8 border-t pt-6">
                        <a href="{{ route('products.index') }}"
                            class="px-5 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray dark:bg-gray-700 dark:text-gray-300">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    {{-- Script to handle dynamic icon inputs --}}
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
                textInput.placeholder = (this.value === 'emoji') ? 'e.g. 🚀' : '<svg>...</svg>';
            }
        });
    </script>
@endsection
