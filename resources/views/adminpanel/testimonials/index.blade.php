@extends('adminpanel.layout')

@section('content')
    <div class="container px-6 mx-auto grid">
        <div class="flex justify-between items-center my-6">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Testimonials</h2>
            <a href="{{ route('admin.testimonials.create') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + Add New
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Company/Designation</th>
                            <th class="px-4 py-3">Message</th>
                            <th class="px-4 py-3 text-center">Order</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                        @forelse($items as $item)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <p class="font-semibold">{{ $item->name }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->company }} <br>
                                    <span class="text-xs text-gray-500">{{ $item->designation }}</span>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ Str::limit($item->message, 50) }}
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $item->order }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    @if ($item->is_active)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Active
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                            Hidden
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-right">
                                    <div class="flex items-center justify-end space-x-4">
                                        <a href="{{ route('admin.testimonials.edit', $item) }}"
                                            class="text-purple-600 dark:text-purple-400 hover:underline">Edit</a>
                                        <form action="{{ route('admin.testimonials.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-3 text-center text-sm">No testimonials found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
