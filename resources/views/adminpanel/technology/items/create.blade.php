@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Add New Technology
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('technology-items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Technology Name *</span>
                            <input type="text" name="name" required
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input p-2"
                                placeholder="e.g. Laravel" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Display Order</span>
                            <input type="number" name="order" value="0"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input p-2" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Emoji</span>
                            <input type="text" name="emoji"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input p-2"
                                placeholder="ex: ⚡" />
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Border Color Class *</span>
                            <select name="border_color" required
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-select p-2">
                                <option value="border-blue-500">Blue</option>
                                <option value="border-red-500">Red</option>
                                <option value="border-green-500">Green</option>
                                <option value="border-yellow-500">Yellow</option>
                                <option value="border-purple-500">Purple</option>
                                <option value="border-indigo-500">Indigo</option>
                            </select>
                        </label>

                        <label class="block text-sm md:col-span-2">
                            <span class="text-gray-700 font-semibold">Technology Image (Optional)</span>
                            <input type="file" name="image"
                                class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input p-2" />
                            <p class="text-xs text-gray-500 mt-1">If image is uploaded, emoji will be hidden on frontend.
                            </p>
                        </label>
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" checked
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" />
                            <span class="ml-2 font-medium text-gray-600">Show on Website</span>
                        </label>
                    </div>

                    <div class="flex justify-start gap-3 mt-8">
                        <button type="submit"
                            class="px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Save Item
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
