@extends('adminpanel.layout')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <div class="flex items-center justify-between">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                About Cards
            </h2>
            <a href="{{ route('about-cards.create') }}"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + Add New Card
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
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Icon</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3 text-center">Order</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($cards as $card)
                        <tr class="text-gray-700 hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative w-8 h-8 p-1 rounded-full bg-gray-100 border">
                                        @if($card->icon)
                                            <img src="{{ asset('storage/'.$card->icon) }}" 
                                                 class="object-cover w-full h-full rounded-full" 
                                                 alt="icon" />
                                        @else
                                            <div class="w-full h-full bg-gray-200 rounded-full flex items-center justify-center">
                                                <span class="text-[10px] text-gray-400">N/A</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $card->title }}
                            </td>

                            <td class="px-4 py-3 text-center text-sm">
                                {{ $card->order }}
                            </td>

                            <td class="px-4 py-3 text-xs">
                                @if($card->is_active)
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full">
                                        Disabled
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end space-x-4 text-sm">
                                    <a href="{{ route('about-cards.edit', $card) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    
                                    <form action="{{ route('about-cards.destroy', $card) }}" method="POST" onsubmit="return confirm('Delete this card?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection