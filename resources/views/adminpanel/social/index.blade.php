@extends('adminpanel.layout')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        
        {{-- Header Section --}}
        <div class="flex justify-between items-center my-6">
            <h2 class="text-2xl font-semibold text-gray-700">
                Social Media Links
            </h2>
            <a href="{{ route('social-links.create') }}"
                class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add Social</span>
            </a>
        </div>

        {{-- Table Card --}}
        <div class="w-full overflow-hidden rounded-lg shadow-xs border">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Platform</th>
                            <th class="px-4 py-3 text-center">Icon</th>
                            <th class="px-4 py-3">Theme</th>
                            <th class="px-4 py-3 text-center">Order</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse($links as $link)
                            <tr class="text-gray-700 hover:bg-gray-50 transition-colors">
                                {{-- Name --}}
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <p class="font-semibold">{{ $link->name }}</p>
                                    </div>
                                </td>

                                {{-- Icon Preview --}}
                                <td class="px-4 py-3 text-center">
                                    <div class="inline-flex items-center justify-center w-10 h-10 bg-gray-100 rounded-lg border shadow-sm overflow-hidden text-lg">
                                        @if($link->icon_type === 'svg')
                                            <div class="w-6 h-6 text-gray-600 fill-current">
                                                {!! $link->icon_value !!}
                                            </div>
                                        @else
                                            <span>{{ $link->icon_value }}</span>
                                        @endif
                                    </div>
                                </td>

                                {{-- Theme Color --}}
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 mr-3 rounded-full border border-gray-300" style="background-color: {{ $link->theme_color }};"></span>
                                        <span class="capitalize">{{ $link->theme_color }}</span>
                                    </div>
                                </td>

                                {{-- Order --}}
                                <td class="px-4 py-3 text-sm text-center font-bold text-purple-600">
                                    {{ $link->order }}
                                </td>

                                {{-- Status Badge --}}
                                <td class="px-4 py-3 text-xs">
                                    <span class="px-3 py-1 font-semibold leading-tight rounded-full 
                                        {{ $link->is_active 
                                            ? 'text-green-700 bg-green-100' 
                                            : 'text-red-700 bg-red-100' 
                                        }}">
                                        {{ $link->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>

                                {{-- Actions --}}
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        {{-- Edit --}}
                                        <a href="{{ route('social-links.edit', $link) }}"
                                            class="p-2 text-sm font-medium text-purple-600 rounded-lg hover:bg-purple-100 transition-colors"
                                            title="Edit Link">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('social-links.destroy', $link) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                onclick="return confirm('Delete this social link?')"
                                                class="p-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-100 transition-colors"
                                                title="Delete Link">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500 italic">
                                    No social links found.
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