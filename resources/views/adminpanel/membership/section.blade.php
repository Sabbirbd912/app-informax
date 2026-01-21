@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Membership Section Settings
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

                <form action="{{ route('membership-section.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">
                                Section Title
                            </span>
                            <input type="text" name="title" value="{{ old('title', $membershipSection->title) }}" required
                                class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5"
                                placeholder="Our Membership Plans" />
                            <span class="text-xs text-gray-500 mt-1">
                                This title will be displayed as the main heading of the membership section.
                            </span>
                        </label>

                        <div class="flex items-center pt-2">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" class="sr-only peer" {{ $membershipSection->is_active ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600">
                                </div>
                                <span class="ml-3 text-sm font-semibold text-gray-700">Enable Membership
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
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-purple-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <h4 class="font-semibold text-purple-700">
                        Quick Navigation
                    </h4>
                </div>
                <p class="mt-2 text-sm text-purple-600">
                    To create or edit specific membership tiers (Gold, Silver, etc.), please visit the
                    <a href="{{ route('membership-cards.index') }}"
                        class="underline font-bold hover:text-purple-800 transition-colors">
                        Membership Items List
                    </a>.
                </p>
            </div>
        </div>
    </main>
@endsection