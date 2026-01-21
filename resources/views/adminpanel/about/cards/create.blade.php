@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Add New About Card
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('about-cards.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 font-semibold">Title *</span>
                                <input type="text" name="title" required
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                    placeholder="e.g. Expert Support" />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 font-semibold">Order</span>
                                <input type="number" name="order" value="0"
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2" />
                            </label>

                            <div>
                                <span class="text-sm text-gray-700 font-semibold">Icon *</span>
                                <div class="flex items-center gap-4 mt-2">
                                    <label
                                        class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 cursor-pointer hover:border-purple-400 overflow-hidden">
                                        <input type="file" name="icon" id="iconInput" class="hidden" accept="image/*"
                                            required />
                                        <img id="iconPreview" src="#" class="hidden w-full h-full object-cover" />
                                        <svg id="placeholderIcon" class="w-6 h-6 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </label>
                                    <span class="text-xs text-red-500">Click to upload and thats Must be under 50kb (PNG/GIF)</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700 font-semibold">Content *</span>
                                <textarea name="content" rows="6" required
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2"
                                    placeholder="Describe the card details..."></textarea>
                            </label>
                        </div>
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" checked
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" />
                            <span class="ml-2 font-medium">Active Status</span>
                        </label>
                    </div>

                    <div class="flex justify-start gap-3 mt-8 pb-2">
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Save Card
                        </button>
                        <a href="{{ route('about-cards.index') }}"
                            class="px-5 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('iconInput').onchange = evt => {
            const [file] = document.getElementById('iconInput').files;
            if (file) {
                const preview = document.getElementById('iconPreview');
                const placeholder = document.getElementById('placeholderIcon');
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
        }
    </script>
@endsection
