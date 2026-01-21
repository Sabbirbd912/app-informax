@extends('adminpanel.layout')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            {{-- Page Title --}}
            <div class="flex items-center justify-between my-6">
                <h2 class="text-2xl font-semibold text-gray-700">
                    Membership Cards
                </h2>

                <a href="{{ route('membership-cards.create') }}"
                    class="px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700">
                    + Add Card
                </a>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 p-4 text-green-700 bg-green-100 border border-green-300 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table --}}
            <div class="w-full overflow-hidden rounded-lg shadow-md">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <th class="px-4 py-3">Order</th>
                                <th class="px-4 py-3">Icon</th>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Theme</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y">
                            @forelse($cards as $card)
                                <tr class="text-gray-700">

                                    {{-- Order --}}
                                    <td class="px-4 py-3 text-sm">
                                        {{ $card->order }}
                                    </td>

                                    {{-- Icon --}}
                                    <td class="px-4 py-3 text-lg">
                                        @if ($card->icon_type === 'emoji')
                                            <span>{{ $card->icon_value }}</span>
                                        @elseif($card->icon_type === 'svg')
                                            {!! $card->icon_value !!}
                                        @elseif($card->icon_type === 'image')
                                            <img src="{{ asset('storage/' . $card->icon_value) }}"
                                                class="w-8 h-8 object-contain" alt="icon">
                                        @endif
                                    </td>

                                    {{-- Title --}}
                                    <td class="px-4 py-3 text-sm font-semibold">
                                        {{ $card->title }}
                                    </td>

                                    {{-- Theme Color --}}
                                    <td class="px-4 py-3 text-sm capitalize">
                                        <span class="px-2 py-1 rounded text-white bg-{{ $card->theme_color }}-500">
                                            {{ $card->theme_color }}
                                        </span>
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-4 py-3 text-sm">
                                        @if ($card->is_active)
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                                Active
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-4 py-3 text-sm text-right">
                                        <div class="flex items-center justify-end gap-3">

                                            <a href="{{ route('membership-cards.edit', $card) }}"
                                                class="text-purple-600 hover:underline">
                                                Edit
                                            </a>

                                            <form action="{{ route('membership-cards.destroy', $card) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:underline">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                        No membership cards found.
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
