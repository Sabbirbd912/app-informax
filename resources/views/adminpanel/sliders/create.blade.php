@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Create New Slider
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">Title *</span>
                            <input type="text" name="title" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                placeholder="Main Heading" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700">Subtitle</span>
                            <input type="text" name="subtitle"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                placeholder="Supporting Text" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700">Button Text</span>
                            <input type="text" name="button_text"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                placeholder="Click/Learn More" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700">Button Link</span>
                            <input type="url" name="button_link"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                placeholder="https://example.com" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700">Media Type *</span>
                            <select name="media_type" required
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2">
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                            </select>
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700">Display Order</span>
                            <input type="number" name="order"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                placeholder="0" />
                        </label>
                    </div>

                    <div class="mt-4">
                        <span class="text-sm text-gray-700">Media File *</span>
                        <div class="flex items-center gap-4 mt-1">
                            <input type="file" name="media" id="mediaInput" required
                                class="block w-full text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-1"
                                accept="image/*,video/*" />
                        </div>
                        <div id="previewContainer" class="mt-3 hidden">
                            <img id="imagePreview" src="#" alt="Preview" class="h-32 rounded-lg border shadow-sm" />
                        </div>
                    </div>

                    <div class="mt-3 p-3 text-sm text-red-100 bg-red-100 border border-red-300 rounded-md">
                        ⚠️ If you upload an image Or Video, it will be used in Hero Section.
                        Image/Video size must be under 40 MB.
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" checked
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" />
                            <span class="ml-2">Active (Visible on Homepage)</span>
                        </label>
                    </div>

                    <div class="flex justify-start gap-3 mt-8">
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Save Slider
                        </button>
                        <a href="{{ route('sliders.index') }}"
                            class="px-5 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg active:bg-transparent hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
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
