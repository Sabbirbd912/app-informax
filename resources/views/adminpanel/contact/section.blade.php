@extends('adminpanel.layout')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        
        {{-- Page Title --}}
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Contact Section Settings
        </h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="flex items-center p-4 mb-8 text-sm font-semibold text-white bg-green-500 rounded-lg shadow-md" role="alert">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Settings Form --}}
        <div class="px-6 py-5 mb-8 bg-white rounded-lg shadow-md">
            <form method="POST" action="{{ route('contact.section.update') }}">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    
                    {{-- Section Title --}}
                    <label class="block text-sm">
                        <span class="text-gray-700 font-bold uppercase tracking-wider">Section Title</span>
                        <input name="section_title" 
                            value="{{ old('section_title', $section->section_title) }}" 
                            class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5"
                            placeholder="e.g. Find Us on Google Map">
                    </label>

                    {{-- Map Title --}}
                    <label class="block text-sm">
                        <span class="text-gray-700 font-bold uppercase tracking-wider">Map Label / Title</span>
                        <input name="map_title" 
                            value="{{ old('map_title', $section->map_title) }}" 
                            class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input border-gray-300 rounded-md p-2.5"
                            placeholder="e.g. Our Head Office Location">
                    </label>

                    {{-- Map Embed URL --}}
                    <label class="block text-sm">
                        <span class="text-gray-700 font-bold uppercase tracking-wider">Google Map Iframe URL (src)</span>
                        <textarea name="map_embed_url" rows="4"
                            class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-textarea border-gray-300 rounded-md p-2.5"
                            placeholder="Paste only the 'src' link from Google Maps iframe tag">{{ old('map_embed_url', $section->map_embed_url) }}</textarea>
                        <span class="text-xs text-gray-500 mt-1">Hint: Google Maps -> Share -> Embed a map -> Copy the 'src' attribute value.</span>
                    </label>

                    {{-- Map Preview (Optional but helpful) --}}
                    @if($section->map_embed_url)
                        <div class="mt-4">
                            <span class="text-xs font-semibold text-gray-500 uppercase">Live Preview:</span>
                            <div class="mt-2 rounded-lg overflow-hidden border h-48 bg-gray-100">
                                <iframe src="{{ $section->map_embed_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    @endif

                </div>

                {{-- Submit Button --}}
                <div class="mt-10 pt-6 border-t text-right">
                    <button type="submit"
                        class="px-10 py-3 text-sm font-semibold text-white bg-purple-600 rounded-lg hover:bg-purple-700 active:bg-purple-600 focus:outline-none focus:shadow-outline-purple transition-colors duration-150 shadow-md uppercase tracking-widest">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection