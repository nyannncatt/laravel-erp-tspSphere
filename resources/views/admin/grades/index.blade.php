<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Add New Grade Button -->
                <div class="mb-6 flex justify-end">
                    <a href="{{ route('grades.create') }}" 
                        class="px-6 py-3 bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                        Add New Grade
                    </a>
                </div>

                <!-- Grades Table -->
                <div class="overflow-x-auto bg-white dark:bg-gray-700 rounded-lg shadow-lg">
                    <table class="min-w-full table-auto text-gray-800 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Student Name</th>
                                <th class="px-6 py-4">Course</th>
                                <th class="px-6 py-4">Grade</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grades as $grade)
                                <tr class="border-b border-gray-200 dark:border-gray-600">
                                    <td class="px-6 py-4">{{ $grade->id }}</td>
                                    <td class="px-6 py-4">{{ $grade->student_name }}</td>
                                    <td class="px-6 py-4">{{ $grade->course }}</td>
                                    <td class="px-6 py-4">{{ $grade->grade }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('grades.edit', $grade->id) }}" class="text-blue-600">Edit</a> |
                                        <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" class="inline-block">
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
