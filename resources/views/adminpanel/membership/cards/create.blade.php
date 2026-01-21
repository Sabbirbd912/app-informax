{{-- @extends('adminpanel.layout')

@section('content')
<main class="p-6 max-w-3xl mx-auto bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Add Membership Card</h2>

    <form action="{{ route('membership-cards.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <input name="title" class="w-full border p-2" placeholder="Title" required>

        <textarea name="description" class="w-full border p-2" placeholder="Description" required></textarea>

        <select name="icon_type" class="w-full border p-2" required>
            <option value="emoji">Emoji</option>
            <option value="svg">SVG</option>
            <option value="image">Image</option>
        </select>

        <input name="icon_value" class="w-full border p-2" placeholder="Emoji / SVG code">

        <input type="file" name="icon_value" class="w-full border p-2">

        <input name="order" type="number" class="w-full border p-2">

        <label>
            <input type="checkbox" name="is_active" checked> Active
        </label>

        <button class="px-4 py-2 bg-purple-600 text-white rounded">
            Save
        </button>
    </form>
</main>
@endsection --}}



@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Add Membership Card
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

                @if ($errors->any())
                    <div class="p-4 mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('membership-cards.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Title</span>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5"
                                placeholder="e.g. Gold Membership" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Theme Color</span>
                            <select name="theme_color"
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                <option value="emerald">Emerald (Green)</option>
                                <option value="blue">Blue</option>
                                <option value="teal">Teal</option>
                                <option value="orange">Orange</option>
                            </select>
                        </label>

                        <label class="block text-sm md:col-span-2">
                            <span class="text-gray-700 font-semibold">Description</span>
                            <textarea name="description" rows="3" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5"
                                placeholder="Describe the membership benefits...">{{ old('description') }}</textarea>
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Icon Type</span>
                            <select name="icon_type" id="icon_type" required
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                <option value="">-- Select Type --</option>
                                <option value="emoji">Emoji</option>
                                <option value="svg">SVG Code</option>
                                <option value="image">Image Upload</option>
                            </select>
                        </label>

                        <div class="block text-sm">
                            <span class="text-gray-700 font-semibold" id="icon_label">Icon Value</span>

                            <input type="text" name="icon_value_text" id="icon_value_text"
                                class="hidden block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5"
                                placeholder="Emoji (🔥) or SVG code" />

                            <input type="file" name="icon_value_image" id="icon_value_image"
                                class="hidden block w-full mt-1 text-sm border border-gray-300 rounded-md p-1.5 focus:outline-none focus:border-purple-400" />
                        </div>
                        <span class="mt-1 p-3 text-sm text-red-700 bg-red-100 border border-red-300 rounded-md">
                            ⚠️ If you upload an image, it will be used as the icon.
                            Image size must be under 100KB.
                        </span>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Display Order</span>
                            <input type="number" name="order" value="{{ old('order', 0) }}"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        <div class="flex items-center pt-6">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" class="sr-only peer" checked>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600">
                                </div>
                                <span class="ml-3 text-sm font-semibold text-gray-700">Active
                                    Status</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 mt-8 border-t pt-6">
                        <a href="{{ route('membership-cards.index') }}"
                            class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Save Card
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('icon_type').addEventListener('change', function() {
            const textInput = document.getElementById('icon_value_text');
            const imageInput = document.getElementById('icon_value_image');
            const label = document.getElementById('icon_label');

            textInput.classList.add('hidden');
            imageInput.classList.add('hidden');

            if (this.value === 'emoji' || this.value === 'svg') {
                textInput.classList.remove('hidden');
                label.innerText = this.value === 'emoji' ? 'Enter Emoji' : 'Paste SVG Code';
            }

            if (this.value === 'image') {
                imageInput.classList.remove('hidden');
                label.innerText = 'Upload Image';
            }
        });
    </script>
@endsection
