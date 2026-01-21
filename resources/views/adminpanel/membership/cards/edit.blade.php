@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Membership Card: <span class="text-purple-600">{{ $card->title }}</span>
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

                @if ($errors->any())
                    <div
                        class="p-4 mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('membership-cards.update', $card) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Card Title</span>
                            <input type="text" name="title" value="{{ old('title', $card->title) }}" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Theme Color</span>
                            <select name="theme_color"
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                @foreach(['blue', 'teal', 'orange'] as $color)
                                    <option value="{{ $color }}" @selected($card->theme_color === $color)>
                                        {{ ucfirst($color) }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <label class="block text-sm md:col-span-2">
                            <span class="text-gray-700 font-semibold">Description</span>
                            <textarea name="description" rows="3" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5">{{ old('description', $card->description) }}</textarea>
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Icon Type</span>
                            <select name="icon_type" id="icon_type" required
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                @foreach(['emoji', 'svg', 'image'] as $type)
                                    <option value="{{ $type }}" @selected($card->icon_type === $type)>
                                        {{ ucfirst($type) }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <div class="block text-sm">
                            <span class="text-gray-700 font-semibold" id="icon_label">Icon Content</span>

                            <input type="text" name="icon_value_text" id="icon_value_text"
                                value="{{ old('icon_value_text', $card->icon_type !== 'image' ? $card->icon_value : '') }}"
                                class="hidden block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5" />

                            <input type="file" name="icon_value_image" id="icon_value_image"
                                class="hidden block w-full mt-1 text-sm border border-gray-300 rounded-md p-1.5 focus:outline-none focus:border-purple-400" />
                        </div>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Display Order</span>
                            <input type="number" name="order" value="{{ old('order', $card->order) }}"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center pt-2">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" class="sr-only peer" @checked($card->is_active)>
                                    <div
                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600">
                                    </div>
                                    <span class="ml-3 text-sm font-semibold text-gray-700">Active</span>
                                </label>
                            </div>

                            <div class="flex flex-col items-center">
                                <span class="text-xs text-gray-500 mb-1">Current Icon</span>
                                <div
                                    class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded-lg border overflow-hidden">
                                    @if($card->icon_type === 'emoji')
                                        <span class="text-3xl">{{ $card->icon_value }}</span>
                                    @elseif($card->icon_type === 'image')
                                        <img src="{{ asset('storage/' . $card->icon_value) }}"
                                            class="w-full h-full object-contain p-1">
                                    @elseif($card->icon_type === 'svg')
                                        <div class="w-10 h-10 text-gray-600">{!! $card->icon_value !!}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 mt-8 border-t pt-6">
                        <a href="{{ route('membership-cards.index') }}"
                            class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Update Card
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

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
                label.innerText = type === 'emoji' ? 'Enter Emoji' : 'Paste SVG Code';
            }

            if (type === 'image') {
                imageInput.classList.remove('hidden');
                label.innerText = 'Replace Image (Optional)';
            }
        }

        document.getElementById('icon_type').addEventListener('change', toggleIconInputs);
        window.addEventListener('DOMContentLoaded', toggleIconInputs);
    </script>
@endsection
