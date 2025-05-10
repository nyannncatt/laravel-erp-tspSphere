<!-- resources/views/studentinfo/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">Student Info</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">All Students</h3>
                    <a href="{{ route('studentinfo.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Student</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Phone</th>
                                <th class="px-6 py-3">Grade</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $student->name }}</td>
                                    <td class="px-6 py-4">{{ $student->email }}</td>
                                    <td class="px-6 py-4">{{ $student->phone }}</td>
                                    <td class="px-6 py-4">{{ $student->grade }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('studentinfo.edit', $student->id) }}" class="text-blue-600">Edit</a> |
                                        <form action="{{ route('studentinfo.destroy', $student->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this student?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600">Delete</button>
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
