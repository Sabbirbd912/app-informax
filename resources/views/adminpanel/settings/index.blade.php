@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            {{-- Page Title --}}
            <div class="flex justify-between items-center my-6">
                <h2 class="text-2xl font-semibold text-gray-700">
                    General Website Settings
                </h2>
            </div>

            {{-- Success message --}}
            @if(session('success'))
                <div class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-green-500 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green"
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

            @php
                $order = [
                    'company_name',
                    'company_logo',
                    'contact_email',
                    'contact_phone',
                    'contact_address',
                    'footer_intro',
                    'footer_text',
                ];

                $orderedSettings = $settings->sortBy(function ($item) use ($order) {
                    return array_search($item->key, $order);
                });
            @endphp

            {{-- Settings Form --}}
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="px-6 py-5 mb-8 bg-white rounded-lg shadow-md">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                        @foreach($orderedSettings as $setting)
                            <div class="{{ in_array($setting->type, ['textarea']) ? 'md:col-span-2' : '' }}">

                                {{-- Label --}}
                                <label
                                    class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                                    {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                                </label>

                                {{-- TEXT INPUT --}}
                                @if($setting->type === 'text')
                                    <input type="text" name="settings[{{ $setting->id }}]"
                                        value="{{ old('settings.' . $setting->id, $setting->value) }}"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5">
                                @endif

                                {{-- TEXTAREA --}}
                                @if($setting->type === 'textarea')
                                    <textarea name="settings[{{ $setting->id }}]" rows="3"
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-textarea border-gray-300 rounded-md p-2.5">{{ old('settings.' . $setting->id, $setting->value) }}</textarea>
                                @endif

                                {{-- IMAGE INPUT --}}
                                @if($setting->type === 'image')
                                    <div class="flex items-center gap-4 mt-1">
                                        @if($setting->value)
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('storage/' . $setting->value) }}" alt="Logo Preview"
                                                    class="h-12 max-w-xs w-auto object-contain rounded border bg-gray-50 p-1 shadow-sm">
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <input type="file" name="settings[{{ $setting->id }}]"
                                                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                                        </div>
                                    </div>
                                @endif

                                {{-- BOOLEAN/SWITCH --}}
                                @if($setting->type === 'boolean')
                                    <div class="flex items-center mt-2">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="settings[{{ $setting->id }}]" value="1" {{ $setting->value ? 'checked' : '' }} class="sr-only peer">
                                            <div
                                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600">
                                            </div>
                                            <span class="ml-3 text-sm font-medium text-gray-600">Enabled</span>
                                        </label>
                                    </div>
                                @endif

                            </div>
                        @endforeach

                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-10 pt-6 border-t">
                        <button type="submit"
                            class="px-10 py-3 text-sm font-semibold text-white bg-purple-600 rounded-lg hover:bg-purple-700 active:bg-purple-600 focus:outline-none focus:shadow-outline-purple transition-colors duration-150 shadow-md">
                            Update All Settings
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </main>
@endsection