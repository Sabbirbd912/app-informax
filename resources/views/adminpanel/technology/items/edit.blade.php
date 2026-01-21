@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Technology: {{ $item->name }}
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('technology-items.update', $item) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Technology Name *</span>
                            <input type="text" name="name" value="{{ old('name', $item->name) }}" required
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input p-2" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Display Order</span>
                            <input type="number" name="order" value="{{ old('order', $item->order) }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input p-2" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Emoji</span>
                            <input type="text" name="emoji" value="{{ old('emoji', $item->emoji) }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input p-2" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Border Color Class *</span>
                            <select name="border_color" required
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-select p-2">
                                @foreach (['border-blue-500', 'border-amber-500', 'border-violet-500', 'border-red-500', 'border-green-500', 'border-yellow-500', 'border-purple-500', 'border-indigo-500', 'border-emerald-500', 'border-sky-500', 'border-rose-500', 'border-fuchsia-500'] as $color)
                                    <option value="{{ $color }}"
                                        {{ $item->border_color == $color ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('border-', '', str_replace('-500', '', $color))) }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <div class="block text-sm md:col-span-2">
                            <span class="text-gray-700 font-semibold">Technology Image</span>
                            <div class="flex items-center gap-4 mt-2">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        class="w-12 h-12 rounded border p-1 object-contain bg-gray-50">
                                @else
                                    <div
                                        class="w-12 h-12 flex items-center justify-center bg-gray-100 rounded border text-xl">
                                        {{ $item->emoji }}</div>
                                @endif
                                <input type="file" name="image"
                                    class="block w-full text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input p-2" />
                            </div>
                        </div>
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" {{ $item->is_active ? 'checked' : '' }}
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" />
                            <span class="ml-2 font-medium text-gray-600">Active Status</span>
                        </label>
                    </div>

                    <div class="flex justify-start gap-3 mt-8">
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Update Item
                        </button>
                        <a href="{{ route('technology-items.index') }}"
                            class="px-5 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
