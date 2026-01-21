@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Add New Client
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

                @if ($errors->any())
                    <div class="p-4 mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('client-items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Name -->
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Client Name</span>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="block w-full mt-1 text-sm form-input border-gray-300 rounded-md p-2.5"
                                placeholder="Enterprise Client 1">
                        </label>

                        <!-- Theme -->
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Theme Color</span>
                            <select name="theme_color"
                                class="block w-full mt-1 text-sm form-select border-gray-300 rounded-md p-2.5">
                                <option value="">Default (Gray)</option>
                                @foreach (['green', 'teal', 'blue', 'orange', 'white'] as $color)
                                    <option value="{{ $color }}"
                                        {{ old('theme_color') === $color ? 'selected' : '' }}>
                                        {{ ucfirst($color) }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <!-- Icon Type -->
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Icon Type</span>
                            <select name="icon_type" id="icon_type" required
                                class="block w-full mt-1 text-sm form-select border-gray-300 rounded-md p-2.5">
                                <option value="emoji" {{ old('icon_type', 'emoji') === 'emoji' ? 'selected' : '' }}>Emoji
                                </option>
                                <option value="svg" {{ old('icon_type') === 'svg' ? 'selected' : '' }}>SVG Code</option>
                                <option value="image" {{ old('icon_type') === 'image' ? 'selected' : '' }}>Image Upload
                                </option>
                            </select>
                        </label>

                        <!-- Icon Value -->
                        <div class="block text-sm">
                            <span class="text-gray-700 font-semibold" id="icon_label">Icon Value (Emoji)</span>

                            <div id="text_input_container">
                                <input type="text" name="icon_value" id="icon_value_text" value="{{ old('icon_value') }}"
                                    class="block w-full mt-1 text-sm form-input border-gray-300 rounded-md p-2.5"
                                    placeholder="Example: 🏢">
                            </div>

                            <div id="file_input_container" class="hidden mt-1">
                                <input type="file" name="icon_value"
                                    class="block w-full text-sm border border-gray-300 rounded-md p-1.5">
                            </div>

                            <p class="text-xs text-gray-500 mt-1" id="icon_help">
                                Copy and paste an emoji here.
                            </p>
                        </div>

                        <!-- Order -->
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Display Order</span>
                            <input type="number" name="order" value="{{ old('order', 0) }}"
                                class="block w-full mt-1 text-sm form-input border-gray-300 rounded-md p-2.5">
                        </label>

                        <!-- Active -->
                        <div class="flex items-center pt-6">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" class="sr-only peer"
                                    {{ old('is_active', 1) ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer-checked:bg-purple-600"></div>
                                <span class="ml-3 text-sm font-semibold">Active Status</span>
                            </label>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end gap-4 mt-8 border-t pt-6">
                        <a href="{{ route('client-items.index') }}" class="px-4 py-2 border rounded-lg">Cancel</a>
                        <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg">
                            Save Client Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const iconType = document.getElementById('icon_type');
            const textBox = document.getElementById('text_input_container');
            const fileBox = document.getElementById('file_input_container');
            const label = document.getElementById('icon_label');
            const help = document.getElementById('icon_help');
            const textInput = document.getElementById('icon_value_text');

            function toggleIconInput() {
                const type = iconType.value;

                if (type === 'image') {
                    textBox.classList.add('hidden');
                    fileBox.classList.remove('hidden');
                    label.innerText = 'Upload Image';
                    help.innerText = 'Upload an image file (PNG, JPG, SVG).';
                    textInput.value = '';
                } else if (type === 'svg') {
                    textBox.classList.remove('hidden');
                    fileBox.classList.add('hidden');
                    label.innerText = 'SVG Code';
                    help.innerText = 'Paste the raw <svg>...</svg> code here.';
                    textInput.placeholder = '<svg>...</svg>';
                } else {
                    textBox.classList.remove('hidden');
                    fileBox.classList.add('hidden');
                    label.innerText = 'Icon Value (Emoji)';
                    help.innerText = 'Copy and paste an emoji here.';
                    textInput.placeholder = 'Example: 🏢';
                }
            }

            iconType.addEventListener('change', toggleIconInput);
            toggleIconInput(); // run on page load
        });
    </script>
@endsection
