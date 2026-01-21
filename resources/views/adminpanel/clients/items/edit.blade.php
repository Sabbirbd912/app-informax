@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Client: <span class="text-purple-600">{{ $clientItem->name }}</span>
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

                <form action="{{ route('client-items.update', $clientItem->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Name -->
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Client Name</span>
                            <input type="text" name="name" value="{{ old('name', $clientItem->name) }}" required
                                class="block w-full mt-1 text-sm form-input border-gray-300 rounded-md p-2.5">
                        </label>

                        <!-- Theme Color -->
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Theme Color</span>
                            <select name="theme_color"
                                class="block w-full mt-1 text-sm form-select border-gray-300 rounded-md p-2.5">
                                <option value="">Default (Gray)</option>
                                @foreach (['green', 'teal', 'blue', 'orange', 'white'] as $color)
                                    <option value="{{ $color }}"
                                        {{ old('theme_color', $clientItem->theme_color) === $color ? 'selected' : '' }}>
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
                                <option value="emoji" {{ $clientItem->icon_type === 'emoji' ? 'selected' : '' }}>Emoji
                                </option>
                                <option value="svg" {{ $clientItem->icon_type === 'svg' ? 'selected' : '' }}>SVG Code
                                </option>
                                <option value="image" {{ $clientItem->icon_type === 'image' ? 'selected' : '' }}>Image
                                </option>
                            </select>
                        </label>

                        <!-- Icon Value -->
                        <div class="block text-sm">
                            <span class="text-gray-700 font-semibold" id="icon_label">
                                {{ $clientItem->icon_type === 'image' ? 'Replace Image' : 'Icon Value' }}
                            </span>

                            <!-- Text -->
                            <div id="text_input_container"
                                class="{{ $clientItem->icon_type === 'image' ? 'hidden' : '' }}">
                                <input type="text" name="icon_value"
                                    value="{{ old('icon_value', $clientItem->icon_value) }}"
                                    class="block w-full mt-1 text-sm form-input border-gray-300 rounded-md p-2.5">
                            </div>

                            <!-- File -->
                            <div id="file_input_container"
                                class="{{ $clientItem->icon_type === 'image' ? '' : 'hidden' }} mt-1">
                                <input type="file" name="icon_value"
                                    class="block w-full text-sm border border-gray-300 rounded-md p-1.5">
                                @if ($clientItem->icon_type === 'image')
                                    <p class="text-[10px] text-gray-500 mt-1 italic">
                                        Current: {{ basename($clientItem->icon_value) }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Order -->
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Display Order</span>
                            <input type="number" name="order" value="{{ old('order', $clientItem->order) }}"
                                class="block w-full mt-1 text-sm form-input border-gray-300 rounded-md p-2.5">
                        </label>

                        <!-- Preview -->
                        <div class="block text-sm">
                            <span class="text-gray-700 font-semibold">Current Icon Preview</span>
                            <div class="mt-2 flex items-center justify-center w-16 h-16 bg-gray-100 rounded-lg border">
                                @if ($clientItem->icon_type === 'emoji')
                                    <span class="text-3xl">{{ $clientItem->icon_value }}</span>
                                @elseif($clientItem->icon_type === 'image')
                                    <img src="{{ asset('storage/' . $clientItem->icon_value) }}"
                                        class="w-12 h-12 object-contain">
                                @elseif($clientItem->icon_type === 'svg')
                                    <div class="w-10 h-10">{!! $clientItem->icon_value !!}</div>
                                @endif
                            </div>
                        </div>

                        <!-- Active -->
                        <div class="flex items-center pt-2">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" class="sr-only peer"
                                    {{ $clientItem->is_active ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer-checked:bg-purple-600"></div>
                                <span class="ml-3 text-sm font-semibold">Active</span>
                            </label>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end gap-4 mt-8 border-t pt-6">
                        <a href="{{ route('client-items.index') }}" class="px-4 py-2 border rounded-lg">Cancel</a>
                        <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg">
                            Update Client Item
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

            iconType.addEventListener('change', function() {
                if (this.value === 'image') {
                    textBox.classList.add('hidden');
                    fileBox.classList.remove('hidden');
                    label.innerText = 'Upload New Image';
                } else {
                    textBox.classList.remove('hidden');
                    fileBox.classList.add('hidden');
                    label.innerText = this.value === 'svg' ? 'SVG Code' : 'Emoji Value';
                }
            });
        });
    </script>
@endsection
