<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Edit Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('grades.update', $grade->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="student_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Student Name</label>
                        <input type="text" id="student_name" name="student_name" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" 
                               value="{{ $grade->student_name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="course" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course</label>
                        <input type="text" id="course" name="course" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" 
                               value="{{ $grade->course }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Grade</label>
                        <select name="grade" id="grade" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                            <option value="A" {{ $grade->grade == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $grade->grade == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $grade->grade == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $grade->grade == 'D' ? 'selected' : '' }}>D</option>
                            <option value="F" {{ $grade->grade == 'F' ? 'selected' : '' }}>F</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-2">
<a href="{{ route('grades.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-md">Cancel</a>
<button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update Grade</button>
</div>
</form>
</div>
</div>
</div>
</x-app-layout>
