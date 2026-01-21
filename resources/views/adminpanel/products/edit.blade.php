@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Edit Product: <span class="text-purple-600">{{ $product->title }}</span>
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                {{-- এরর মেসেজ দেখানোর জন্য --}}
                @if ($errors->any())
                    <div class="p-4 mb-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                        <p class="font-bold">Please correct the following errors:</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- বাম পাশ: সাধারণ তথ্য --}}
                        <div class="space-y-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Product Title *</span>
                                <input type="text" name="title" value="{{ old('title', $product->title) }}" required
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2" />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Icon Type</span>
                                <select id="icon_type" name="icon_type"
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2">
                                    <option value="emoji" {{ $product->icon_type == 'emoji' ? 'selected' : '' }}>Emoji /
                                        Text</option>
                                    <option value="svg" {{ $product->icon_type == 'svg' ? 'selected' : '' }}>SVG Code
                                    </option>
                                    <option value="image" {{ $product->icon_type == 'image' ? 'selected' : '' }}>Image File
                                    </option>
                                </select>
                            </label>

                            <div id="icon_input_container">
                                <label class="block text-sm">
                                    <span id="icon_label" class="text-gray-700 dark:text-gray-400 font-semibold">Icon
                                        Content</span>
                                    <input type="text" name="icon" id="icon_text_field"
                                        value="{{ old('icon', $product->icon) }}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2" />

                                    <input type="file" name="icon_image" id="icon_file_field"
                                        class="hidden w-full mt-1 text-sm dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100" />
                                </label>
                            </div>

                            <div class="flex items-center gap-4 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <span class="text-xs font-bold text-gray-500 uppercase">Current Icon:</span>
                                <div
                                    class="w-10 h-10 flex items-center justify-center border rounded bg-white dark:bg-gray-600">
                                    @if (Str::startsWith($product->icon, '<svg'))
                                        <div class="w-6 h-6">{!! $product->icon !!}</div>
                                    @elseif(Str::contains($product->icon, '/'))
                                        <img src="{{ asset('storage/' . $product->icon) }}"
                                            class="w-full h-full object-contain p-1">
                                    @else
                                        <span class="text-xl">{{ $product->icon }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- ডান পাশ: স্ট্যাটাস ও অন্যান্য --}}
                        <div class="space-y-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-semibold">Description *</span>
                                <textarea name="description" rows="4" required
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2">{{ old('description', $product->description) }}</textarea>
                            </label>

                            <div class="grid grid-cols-2 gap-4">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold">Theme Color</span>
                                    <select name="theme_color"
                                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2">
                                        @foreach (['orange', 'teal', 'blue'] as $color)
                                            <option value="{{ $color }}"
                                                {{ $product->theme_color === $color ? 'selected' : '' }}>
                                                {{ ucfirst($color) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>


                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold">Button Text</span>
                                    <input type="text" name="button_text" value="{{ old('button_text', 'Know More') }}"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300" />
                                </label>

                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold">Button Link</span>
                                    <input type="text" name="button_link" value="{{ old('button_link') }}"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5 dark:bg-gray-700 dark:text-gray-300"
                                        placeholder="https://..." />
                                </label>


                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400 font-semibold">Order</span>
                                    <input type="number" name="order" value="{{ old('order', $product->order) }}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 form-input border-gray-300 rounded-md p-2" />
                                </label>
                            </div>

                            <div class="flex items-center pt-4">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                                        {{ $product->is_active ? 'checked' : '' }}>
                                    <div
                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600">
                                    </div>
                                    <span class="ml-3 text-sm font-semibold text-gray-700 dark:text-gray-300">Active
                                        Status</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- একশন বাটন --}}
                    <div class="flex justify-start gap-3 mt-8 pb-4">
                        <button type="submit"
                            class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple shadow-md">
                            Update Product
                        </button>
                        <a href="{{ route('products.index') }}"
                            class="px-6 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray dark:bg-gray-700 dark:text-gray-300">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    {{-- জাভাস্ক্রিপ্ট দিয়ে আইকন ফিল্ড পরিবর্তন --}}
    <script>
        const iconType = document.getElementById('icon_type');
        const textField = document.getElementById('icon_text_field');
        const fileField = document.getElementById('icon_file_field');
        const label = document.getElementById('icon_label');

        function updateFields() {
            if (iconType.value === 'image') {
                textField.classList.add('hidden');
                fileField.classList.remove('hidden');
                label.innerText = 'Upload Icon Image';
            } else {
                textField.classList.remove('hidden');
                fileField.classList.add('hidden');
                label.innerText = iconType.value === 'emoji' ? 'Enter Emoji' : 'Paste SVG Code';
            }
        }

        iconType.addEventListener('change', updateFields);
        window.onload = updateFields;
    </script>
@endsection
