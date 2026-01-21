@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit About Card
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('about-cards.update', $card) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <label class="block text-sm">
                                <span class="text-gray-700 font-semibold">Title</span>
                                <input type="text" name="title" value="{{ old('title', $card->title) }}"
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2" />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 font-semibold">Order</span>
                                <input type="number" name="order" value="{{ old('order', $card->order) }}"
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2" />
                            </label>

                            <div class="flex gap-4 items-end">
                                <div>
                                    <span class="text-xs text-gray-500 block mb-1">Current Icon</span>
                                    <div
                                        class="w-12 h-12 rounded-lg border flex items-center justify-center bg-gray-50 overflow-hidden">
                                        @if($card->icon)
                                            <img src="{{ asset('storage/' . $card->icon) }}" class="object-cover w-full h-full">
                                        @else
                                            <span class="text-[10px]">No Icon</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <span class="text-sm text-gray-700 font-semibold">Replace Icon</span>
                                    <input type="file" name="icon" id="iconInput"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-1"
                                        accept="image/*" />
                                </div>
                            </div>

                            <div id="previewWrapper" class="hidden">
                                <span class="text-xs text-purple-600 font-semibold">New Preview:</span>
                                <div class="w-12 h-12 mt-1 rounded-lg border-2 border-purple-400 overflow-hidden">
                                    <img id="iconPreview" src="#" class="w-full h-full object-cover" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700 font-semibold">Content</span>
                                <textarea name="content" rows="6"
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2">{{ old('content', $card->content) }}</textarea>
                            </label>
                        </div>
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" {{ $card->is_active ? 'checked' : '' }}
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" />
                            <span class="ml-2 font-medium">Active Status</span>
                        </label>
                    </div>

                    <div class="flex justify-start gap-3 mt-8">
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Update Card
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
                const wrapper = document.getElementById('previewWrapper');
                const preview = document.getElementById('iconPreview');
                preview.src = URL.createObjectURL(file);
                wrapper.classList.remove('hidden');
            }
        }
    </script>
@endsection