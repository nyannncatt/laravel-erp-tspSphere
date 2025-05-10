<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Inbox</h3>
                    <a href="{{ route('messages.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Send Message
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-sm text-left text-gray-700 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase font-semibold">
                            <tr>
                                <th class="px-6 py-3">Sender</th>
                                <th class="px-6 py-3">Role</th>
                                <th class="px-6 py-3">Subject</th>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr class="dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $message->sender }}</td>
                                    <td class="px-6 py-4">{{ $message->role }}</td>
                                    <td class="px-6 py-4">{{ $message->subject }}</td>
                                    <td class="px-6 py-4">{{ $message->created_at->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('messages.edit', $message->id) }}" class="text-blue-600">Edit</a> |
                                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
