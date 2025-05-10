<!-- resources/views/messages/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Edit Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
            <form action="{{ route('messages.update', $message->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="sender" class="block text-sm text-gray-700 dark:text-gray-300">Sender</label>
                    <input type="text" name="sender" id="sender" class="w-full px-4 py-2 border border-gray-300 rounded-md" value="{{ $message->sender }}" required>
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm text-gray-700 dark:text-gray-300">Role</label>
                    <input type="text" name="role" id="role" class="w-full px-4 py-2 border border-gray-300 rounded-md" value="{{ $message->role }}" required>
                </div>

                <div class="mb-4">
                    <label for="subject" class="block text-sm text-gray-700 dark:text-gray-300">Subject</label>
                    <input type="text" name="subject" id="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md" value="{{ $message->subject }}" required>
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm text-gray-700 dark:text-gray-300">Message Content</label>
                    <textarea name="content" id="content" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>{{ $message->content }}</textarea>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('messages.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-md">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update Message</button>
                </div>
            </form>

        </div>
    </div>
</div>
</x-app-layout> 