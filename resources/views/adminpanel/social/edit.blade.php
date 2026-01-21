@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            {{-- Page Title --}}
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Social Link: <span class="text-purple-600">{{ $social_link->name }}</span>
            </h2>

            {{-- Form Container --}}
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('social-links.update', $social_link) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Name --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Social Media Name</span>
                            <input type="text" name="name" value="{{ $social_link->name }}" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        {{-- URL --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">URL</span>
                            <input type="url" name="url" value="{{ $social_link->url }}" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        {{-- Icon Type --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Icon Type</span>
                            <select name="icon_type"
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                <option value="emoji" @selected($social_link->icon_type == 'emoji')>Emoji</option>
                                <option value="svg" @selected($social_link->icon_type == 'svg')>SVG Code</option>
                            </select>
                        </label>

                        {{-- Theme Color --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Theme Color</span>
                            <select name="theme_color"
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300 rounded-md p-2.5">
                                @foreach(['green', 'teal', 'blue', 'orange'] as $color)
                                    <option value="{{ $color }}" @selected($social_link->theme_color == $color)>
                                        {{ ucfirst($color) }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        {{-- Icon Value --}}
                        <label class="block text-sm md:col-span-2">
                            <span class="text-gray-700 font-semibold">Icon Value (Emoji or SVG
                                Code)</span>
                            <textarea name="icon_value" rows="3" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5">{{ $social_link->icon_value }}</textarea>
                        </label>

                        {{-- Order --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Display Order</span>
                            <input type="number" name="order" value="{{ $social_link->order }}"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5" />
                        </label>

                        {{-- Active Status Toggle --}}
                        <div class="flex items-center">
                            <label class="relative inline-flex items-center cursor-pointer mt-5">
                                <input type="checkbox" name="is_active" class="sr-only peer" {{ $social_link->is_active ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600">
                                </div>
                                <span class="ml-3 text-sm font-semibold text-gray-700">Active</span>
                            </label>
                        </div>

                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex justify-end gap-4 mt-10 border-t pt-6">
                        <a href="{{ route('social-links.index') }}"
                            class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-8 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple shadow-md">
                            Update Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection