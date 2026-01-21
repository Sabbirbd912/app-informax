@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex items-center justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700">
                    Sliders List
                </h2>
                <a href="{{ route('sliders.create') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    + Add Slider
                </a>
            </div>

            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <th class="px-4 py-3 text-center w-20">Order</th>
                                <th class="px-4 py-3">Media Preview</th>
                                <th class="px-4 py-3">Slider Content</th>
                                <th class="px-4 py-3">CTA Button</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @forelse($sliders as $slider)
                                <tr
                                    class="text-gray-700 hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3 text-center text-sm font-semibold">
                                        {{ $slider->order }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <div
                                            class="relative w-20 h-12 rounded-lg border overflow-hidden bg-gray-100 flex items-center justify-center shadow-sm">
                                            @if($slider->media_type === 'image' && $slider->media_path)
                                                <img src="{{ asset('storage/' . $slider->media_path) }}"
                                                    class="object-cover w-full h-full" alt="" />
                                            @elseif($slider->media_type === 'video')
                                                <div class="flex flex-col items-center">
                                                    <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm2 0v8h12V6H4zm4 2l4 2-4 2V8z">
                                                        </path>
                                                    </svg>
                                                    <span class="text-[8px] uppercase font-bold text-purple-500">Video</span>
                                                </div>
                                            @else
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $slider->title }}</p>
                                            @if($slider->subtitle)
                                                <p class="text-xs text-gray-500 truncate w-48">{{ $slider->subtitle }}</p>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        @if($slider->button_text)
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-xs font-medium px-2 py-0.5 bg-gray-100 rounded border w-fit">
                                                    {{ $slider->button_text }}
                                                </span>
                                                @if($slider->button_link)
                                                    <a href="{{ $slider->button_link }}" target="_blank"
                                                        class="text-[10px] text-blue-500 hover:underline mt-1 truncate w-32">
                                                        {{ $slider->button_link }}
                                                    </a>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-gray-400 italic text-xs">No Button</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-xs">
                                        @if($slider->is_active)
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                                Active
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full">
                                                Disabled
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-end space-x-4 text-sm">
                                            <a href="{{ route('sliders.edit', $slider) }}"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <form action="{{ route('sliders.destroy', $slider) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this slider?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                        No sliders found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection