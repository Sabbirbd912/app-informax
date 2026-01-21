@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Client Section Settings
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

                @if(session('success'))
                    <div class="flex items-center justify-between p-4 mb-6 text-sm font-semibold text-white bg-green-500 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green"
                        role="alert">
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

                <form action="{{ route('client.section.update') }}" method="POST">
                    @csrf

                    <div class="space-y-4">
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">
                                Section Title
                            </span>
                            <input type="text" name="title" value="{{ old('title', $section->title) }}"
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5"
                                placeholder="Our Trusted Clients" />
                            <span class="text-xs text-gray-500 mt-1">
                                This title will appear at the top of your client logos.
                            </span>
                        </label>

                        <div class="flex items-center pt-2">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" class="sr-only peer" {{ $section->is_active ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600">
                                </div>
                                <span class="ml-3 text-sm font-semibold text-gray-700">Enable Client
                                    Section</span>
                            </label>
                        </div>

                        <div class="flex justify-end mt-6 border-t pt-4">
                            <button type="submit"
                                class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div
                class="p-4 mb-8 bg-purple-50 rounded-lg border border-purple-100">
                <h4 class="mb-2 font-semibold text-purple-700">
                    Manage Client Logos
                </h4>
                <p class="text-sm text-purple-600">
                    To manage individual client logos, please go to the
                    <a href="#" class="underline font-bold">Client Logos List</a> page.
                </p>
            </div>
        </div>
    </main>
@endsection