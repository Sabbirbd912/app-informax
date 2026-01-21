@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Edit About Content
                </h2>
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center text-sm text-gray-500">Dashboard</li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">About Section</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            @if (session('success'))
                <div
                    class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-green-700 bg-green-100 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div
                class="px-6 py-6 mb-8 bg-white rounded-lg shadow-xl dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                <form method="POST" action="{{ route('admin.about.content.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-6">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400 font-bold uppercase tracking-wide text-xs">Section
                                Title</span>
                            <input type="text" name="title" required value="{{ old('title', $content->title ?? '') }}"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-3 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple @error('title') border-red-500 @enderror"
                                placeholder="Enter section title">
                            @error('title')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </label>

                        <label class="block text-sm">
                            <span
                                class="text-gray-700 dark:text-gray-400 font-bold uppercase tracking-wide text-xs">Description</span>
                            <textarea name="description" rows="6" required
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-3 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple @error('description') border-red-500 @enderror"
                                placeholder="Write a detailed description...">{{ old('description', $content->description ?? '') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </label>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <label class="block text-sm">
                                <span
                                    class="text-gray-700 dark:text-gray-400 font-bold uppercase tracking-wide text-xs">Button
                                    Label</span>
                                <input type="text" name="button_text"
                                    value="{{ old('button_text', $content->button_text ?? '') }}"
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-3 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                    placeholder="e.g. Learn More">
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400 font-bold uppercase tracking-wide text-xs">SEO
                                    Alt Text (Image)</span>
                                <input type="text" name="image_alt"
                                    value="{{ old('image_alt', $content->image_alt ?? '') }}"
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input border rounded-md p-3 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                                    placeholder="Description for search engines">
                            </label>
                        </div>

                        <hr class="my-4 border-gray-200 dark:border-gray-700">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                            <label class="block text-sm">
                                <span
                                    class="text-gray-700 dark:text-gray-400 font-bold uppercase tracking-wide text-xs">Upload
                                    New Image</span>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-purple-400 transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                            <input type="file" name="image"
                                                class="w-full cursor-pointer focus:outline-none">
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 1MB</p>
                                    </div>
                                </div>
                                @error('image')
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </label>

                            <div class="block text-sm">
                                <span
                                    class="text-gray-700 dark:text-gray-400 font-bold uppercase tracking-wide text-xs">Current
                                    Active Image</span>
                                <div class="mt-1">
                                    @if ($content && $content->image)
                                        <div
                                            class="relative group w-full h-48 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 shadow-inner">
                                            <img src="{{ asset('storage/' . $content->image) }}"
                                                class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                <span
                                                    class="text-white text-xs font-semibold bg-purple-600 px-2 py-1 rounded">Active
                                                    Image</span>
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class="flex items-center justify-center w-full h-48 bg-gray-100 dark:bg-gray-700 rounded-lg border border-dashed border-gray-300">
                                            <span class="text-gray-400">No image uploaded yet</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex justify-end border-t pt-6 border-gray-100 dark:border-gray-700">
                        <button type="submit"
                            class="flex items-center justify-center px-10 py-3 text-sm font-semibold leading-5 text-white transition-all duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple shadow-lg hover:shadow-purple-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
