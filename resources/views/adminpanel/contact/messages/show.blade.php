@extends('adminpanel.layout')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        
        {{-- Header Section --}}
        <div class="flex items-center justify-between my-6">
            <h2 class="text-2xl font-semibold text-gray-700">
                Message Details
            </h2>
            <a href="{{ route('contact.messages.index') }}"
                class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:shadow-outline-gray shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to List</span>
            </a>
        </div>

        {{-- Main Message Card --}}
        <div class="px-6 py-5 mb-8 bg-white rounded-lg shadow-md border">
            
            {{-- Client Header --}}
            <div class="flex items-center justify-between border-b pb-4 mb-6">
                <div class="flex items-center">
                    <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">{{ $message->name }}</h4>
                        <p class="text-sm text-gray-600">{{ $message->email }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="inline-block px-2 py-1 text-xs font-semibold leading-tight text-purple-700 bg-purple-100 rounded-full">
                        {{ $message->service }}
                    </span>
                    <p class="text-xs text-gray-500 mt-1 italic">{{ $message->created_at->format('d M, Y - h:i A') }}</p>
                </div>
            </div>

            {{-- Message Content --}}
            <div class="mb-8">
                <h5 class="text-sm font-bold text-gray-700 uppercase mb-3">Original Message:</h5>
                <div class="p-6 text-gray-700 bg-gray-50 rounded-xl border leading-relaxed italic">
                    "{{ $message->message }}"
                </div>
            </div>

            <hr class="my-8 border-gray-200">

            {{-- Reply Form Section --}}
            <div class="mt-4">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                    </svg>
                    Reply to Message
                </h3>

                <form action="{{ route('contacts.reply', $message) }}" method="POST">
                    @csrf
                    <label class="block text-sm">
                        <textarea
                            name="reply_message"
                            rows="5"
                            class="block w-full mt-1 text-sm focus:border-emerald-400 focus:outline-none focus:shadow-outline-emerald form-input border-gray-300 rounded-md p-3"
                            placeholder="Write your professional reply here..."
                            required
                        ></textarea>
                    </label>

                    <div class="flex justify-between items-center mt-4">
                        <p class="text-xs text-gray-500">
                            * This reply will be sent to <strong>{{ $message->email }}</strong>
                        </p>
                        <button type="submit"
                            class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald shadow-md">
                            Send Reply
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Dangerous Zone (Optional: Delete) --}}
        <div class="flex justify-end mb-8">
            <form action="{{ route('contact.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm text-red-600 hover:underline">
                    Delete this conversation
                </button>
            </form>
        </div>
    </div>
</main>
@endsection