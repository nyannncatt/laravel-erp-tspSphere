<!-- resources/views/studentinfo/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">Edit Student</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <form action="{{ route('studentinfo.update', $studentinfo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block">Name</label>
                        <input type="text" name="name" value="{{ $studentinfo->name }}" class="w-full rounded border-gray-300" required>
                    </div>
                    <div class="mb-4">
                        <label class="block">Email</label>
                        <input type="email" name="email" value="{{ $studentinfo->email }}" class="w-full rounded border-gray-300" required>
                    </div>
                    <div class="mb-4">
                        <label class="block">Phone</label>
                        <input type="text" name="phone" value="{{ $studentinfo->phone }}" class="w-full rounded border-gray-300" required>
                    </div>
                    <div class="mb-4">
                        <label class="block">Grade</label>
                        <input type="text" name="grade" value="{{ $studentinfo->grade }}" class="w-full rounded border-gray-300" required>
                    </div>
                    <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
