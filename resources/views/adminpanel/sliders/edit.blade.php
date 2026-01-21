@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Slider
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">Title</span>
                            <input type="text" name="title" value="{{ old('title', $slider->title) }}"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700">Subtitle</span>
                            <input type="text" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2" />
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">Button Text</span>
                            <input type="text" name="button_text" value="{{ old('button_text', $slider->button_text) }}"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                placeholder="Click/Learn More" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700">Button Link</span>
                            <input type="text" name="button_link" value="{{ old('button_link', $slider->button_link) }}"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                placeholder="https://example.com" />
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">Display Order</span>
                            <input type="number" name="order" value="{{ old('order', $slider->order) }}" min="0"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2" />
                            <span class="text-xs text-gray-500 mt-1">Lower number = shown earlier</span>
                        </label>
                    </div>

                    <hr class="my-8" />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <span class="text-sm text-gray-700 font-semibold">Current Media</span>
                            <div class="mt-2 relative w-full h-32 border rounded-lg overflow-hidden bg-gray-50">
                                @if ($slider->media_type === 'image')
                                    <img src="{{ asset('storage/' . $slider->media_path) }}"
                                        class="object-cover w-full h-full">
                                @else
                                    <div class="flex flex-col items-center justify-center h-full text-gray-500">
                                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm2 0v8h12V6H4zm4 2l4 2-4 2V8z">
                                            </path>
                                        </svg>
                                        <span class="text-xs">Video File</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div>
                            <span class="text-sm text-gray-700 font-semibold">Replace Media</span>
                            <input type="file" name="media" id="mediaInput"
                                class="block w-full mt-2 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-1" />

                            <div id="previewContainer" class="mt-2 hidden">
                                <p class="text-xs text-purple-600 mb-1 font-semibold">New Preview:</p>
                                <img id="imagePreview" src="#" class="h-20 rounded border shadow-sm" />
                            </div>
                        </div>
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" {{ $slider->is_active ? 'checked' : '' }}
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" />
                            <span class="ml-2 font-medium">Active (Visible on Homepage)</span>
                        </label>
                    </div>

                    <div class="flex justify-start gap-3 mt-8">
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Update Slider
                        </button>
                        <a href="{{ route('sliders.index') }}"
                            class="px-5 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('mediaInput').onchange = evt => {
            const [file] = document.getElementById('mediaInput').files;
            if (file && file.type.startsWith('image/')) {
                const previewContainer = document.getElementById('previewContainer');
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = URL.createObjectURL(file);
                previewContainer.classList.remove('hidden');
            } else {
                document.getElementById('previewContainer').classList.add('hidden');
            }
        }
    </script>
@endsection
