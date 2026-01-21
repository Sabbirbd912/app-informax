@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            {{-- Page Header --}}
            <div class="flex items-center justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Products List
                </h2>
                <a href="{{ route('products.create') }}"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple shadow-sm">
                    <span class="mr-1">+</span> Add Product
                </a>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div
                    class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
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

            {{-- Table Container --}}
            <div class="w-full overflow-hidden rounded-lg shadow-xs border dark:border-gray-700">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Product Info</th>
                                <th class="px-4 py-3">CTA Button</th>
                                <th class="px-4 py-3 text-center">Theme Color</th>
                                <th class="px-4 py-3 text-center w-20">Order</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse($products as $product)
                                <tr
                                    class="text-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors duration-150">

                                    {{-- Product Image & Title --}}
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div
                                                class="relative w-10 h-10 mr-3 bg-gray-100 border border-gray-200 rounded p-1 flex items-center justify-center overflow-hidden dark:bg-gray-700 dark:border-gray-600 shadow-sm">
                                                @if ($product->icon)
                                                    @if (Str::startsWith($product->icon, '<svg'))
                                                        <div class="w-6 h-6">{!! $product->icon !!}</div>
                                                    @elseif(Str::contains($product->icon, '/'))
                                                        <img src="{{ asset('storage/' . $product->icon) }}"
                                                            class="w-full h-full object-contain" alt="">
                                                    @else
                                                        <span class="text-xl">{{ $product->icon }}</span>
                                                    @endif
                                                @else
                                                    <span
                                                        class="text-[8px] text-gray-400 font-bold uppercase text-center">No<br>Icon</span>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $product->title }}</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    {{ Str::limit($product->description, 35) }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- CTA Button --}}
                                    <td class="px-4 py-3 text-sm">
                                        @if ($product->button_text)
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-xs font-medium px-2 py-0.5 bg-gray-100 rounded border w-fit dark:bg-gray-700 dark:border-gray-600">
                                                    {{ $product->button_text }}
                                                </span>
                                                @if ($product->button_link)
                                                    <a href="{{ $product->button_link }}" target="_blank"
                                                        class="text-[10px] text-blue-500 hover:underline mt-1 truncate w-32">
                                                        {{ $product->button_link }}
                                                    </a>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-gray-400 italic text-xs">No Button</span>
                                        @endif
                                    </td>

                                    {{-- Theme Color --}}
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            @php
                                                $themeColors = [
                                                    'emerald' => 'bg-emerald-500',
                                                    'teal' => 'bg-teal-500',
                                                    'blue' => 'bg-blue-500',
                                                    'orange' => 'bg-orange-500',
                                                    'purple' => 'bg-purple-500',
                                                    'red' => 'bg-red-500',
                                                ];
                                                $bgClass = $themeColors[$product->theme_color] ?? 'bg-gray-400';
                                            @endphp
                                            <span class="w-3 h-3 mr-2 rounded-full {{ $bgClass }} shadow-sm"></span>
                                            <span class="text-xs capitalize">{{ $product->theme_color }}</span>
                                        </div>
                                    </td>

                                    {{-- Order --}}
                                    <td class="px-4 py-3 text-center text-sm">
                                        <span class="px-2 py-0.5 font-medium bg-gray-100 dark:bg-gray-700 rounded text-xs">
                                            {{ $product->order }}
                                        </span>
                                    </td>

                                    {{-- Status Badge --}}
                                    <td class="px-4 py-3 text-xs">
                                        @if ($product->is_active)
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                Active
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-900 dark:bg-red-200">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-4 py-3 text-right">
                                        <div class="flex items-center justify-end space-x-2 text-sm">
                                            <a href="{{ route('products.edit', $product) }}"
                                                class="p-2 text-purple-600 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none"
                                                aria-label="Edit">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                onsubmit="return confirm('Delete this product?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 text-red-600 rounded-lg dark:text-gray-400 hover:bg-red-50 dark:hover:bg-gray-700 focus:outline-none"
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
                                    <td colspan="6"
                                        class="px-4 py-16 text-center text-gray-500 dark:text-gray-400 italic text-sm">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 mb-3 opacity-20" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                                </path>
                                            </svg>
                                            <span>No products found in database.</span>
                                        </div>
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
