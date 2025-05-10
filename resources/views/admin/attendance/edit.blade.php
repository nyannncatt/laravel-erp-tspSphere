<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Edit Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="student_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Student Name</label>
                        <input type="text" id="student_name" name="student_name" value="{{ $attendance->student_name }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" 
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                        <input type="date" id="date" name="date" value="{{ $attendance->date }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" 
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select id="status" name="status" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                            <option value="present" @if($attendance->status == 'present') selected @endif>Present</option>
                            <option value="absent" @if($attendance->status == 'absent') selected @endif>Absent</option>
                            <option value="late" @if($attendance->status == 'late') selected @endif>Late</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('attendance.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-md">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
