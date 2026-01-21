@extends('adminpanel.layout')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        
        {{-- Header Section --}}
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Contact Messages
        </h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-green-500 rounded-lg shadow-md" role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        {{-- Table Container --}}
        <div class="w-full overflow-hidden rounded-lg shadow-xs border">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Client Info</th>
                            <th class="px-4 py-3">Service</th>
                            <th class="px-4 py-3">Message Snippet</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse($messages as $msg)
                            <tr class="text-gray-700">
                                {{-- Client Info --}}
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $msg->name }}</p>
                                            <p class="text-xs text-gray-600">{{ $msg->email }}</p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Service Badge --}}
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-full">
                                        {{ $msg->service }}
                                    </span>
                                </td>

                                {{-- Message Preview --}}
                                <td class="px-4 py-3 text-sm">
                                    <div class="group relative flex cursor-help">
                                        {{ Str::limit($msg->message, 40) }}
                                        {{-- Tooltip style detail on hover --}}
                                        <span class="absolute bottom-full mb-2 hidden group-hover:block w-64 p-2 bg-gray-900 text-white text-xs rounded shadow-lg z-50">
                                            {{ $msg->message }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Received Date --}}
                                <td class="px-4 py-3 text-sm">
                                    {{ $msg->created_at->format('d M, Y') }}
                                </td>

                                {{-- Actions --}}

                                {{-- Actions --}}
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        
                                        {{-- View Button --}}
                                        <a href="{{ route('contact.messages.show', $msg) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:bg-purple-100 focus:outline-none focus:shadow-outline-gray"
                                        title="View Message">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>

                                        {{-- Delete Button --}}
                                        <form method="POST" action="{{ route('contact.messages.destroy', $msg) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                onclick="return confirm('Permanently delete this message?')"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg hover:bg-red-100 focus:outline-none focus:shadow-outline-gray"
                                                title="Delete Message">
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
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500 italic">
                                    No messages received yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Pagination Space --}}
            <div class="px-4 py-3 border-t">
                </div>
        </div>
    </div>
</main>
@endsection