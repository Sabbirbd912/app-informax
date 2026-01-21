@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Testimonial
            </h2>

            <div class="bg-white rounded-lg shadow-md p-6">

                {{-- Errors --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Name --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Client Name</span>
                            <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required
                                class="form-input mt-1 block w-full border-gray-300 rounded-md">
                        </label>

                        {{-- Company --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Company</span>
                            <input type="text" name="company" value="{{ old('company', $testimonial->company) }}"
                                class="form-input mt-1 block w-full border-gray-300 rounded-md">
                        </label>

                        {{-- Designation --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Designation</span>
                            <input type="text" name="designation"
                                value="{{ old('designation', $testimonial->designation) }}"
                                class="form-input mt-1 block w-full border-gray-300 rounded-md">
                        </label>

                        {{-- Order --}}
                        <label class="block text-sm">
                            <span class="text-gray-700 font-semibold">Display Order</span>
                            <input type="number" name="order" value="{{ old('order', $testimonial->order) }}"
                                class="form-input mt-1 block w-full border-gray-300 rounded-md">
                        </label>

                        {{-- Message --}}
                        <label class="block text-sm md:col-span-2">
                            <span class="text-gray-700 font-semibold">Message</span>
                            <textarea name="message" rows="4" required class="form-input mt-1 block w-full border-gray-300 rounded-md">{{ old('message', $testimonial->message) }}</textarea>
                        </label>

                        {{-- Existing Photo --}}
                        @if ($testimonial->photo)
                            <div class="md:col-span-2">
                                <img src="{{ asset('storage/' . $testimonial->photo) }}" class="w-20 h-20 rounded-full mb-2">
                            </div>
                        @endif

                        {{-- Photo --}}
                        <label class="block text-sm md:col-span-2">
                            <span class="text-gray-700 font-semibold">Change Photo</span>
                            <input type="file" name="photo"
                                class="mt-1 block w-full text-sm border border-gray-300 rounded-md">
                        </label>

                        {{-- Active --}}
                        <div class="flex items-center pt-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_active" {{ $testimonial->is_active ? 'checked' : '' }}
                                    class="rounded border-gray-300">
                                <span class="ml-2 text-sm text-gray-700 font-semibold">Active</span>
                            </label>
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 border rounded-lg">Cancel</a>

                        <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                            Update Testimonial
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
