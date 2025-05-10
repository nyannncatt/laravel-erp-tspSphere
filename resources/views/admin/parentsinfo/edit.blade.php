<!-- resources/views/parents/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Edit Parent Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <form method="POST" action="{{ route('parents.update', $parent->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-md" value="{{ $parent->name }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="email">Email</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-md" value="{{ $parent->email }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="w-full px-4 py-2 border rounded-md" value="{{ $parent->phone }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="dob">Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="w-full px-4 py-2 border rounded-md" value="{{ $parent->dob }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="address">Address</label>
                        <textarea name="address" id="address" class="w-full px-4 py-2 border rounded-md" required>{{ $parent->address }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="occupation">Occupation</label>
                        <input type="text" name="occupation" id="occupation" class="w-full px-4 py-2 border rounded-md" value="{{ $parent->occupation }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="photo">Change Photo</label>
                        <input type="file" name="photo" id="photo" accept="image/*" class="w-full px-4 py-2 border rounded-md">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update Parent Info</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
