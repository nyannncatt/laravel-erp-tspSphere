<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ __('Courses') }}
            </h2>
            <button class="px-6 py-3 bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition"
                    onclick="document.getElementById('addForm').classList.remove('hidden');">
                Add New Course
            </button>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-8 p-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-xl shadow-sm">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 dark:text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-white font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Add Course Form -->
            <div id="addForm" class="hidden">
                <form method="POST" action="{{ route('courses.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="course_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Course Name</label>
                        <input type="text" id="course_name" name="course_name" placeholder="Enter course name"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    </div>
                    <div>
                        <label for="instructor" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Instructor</label>
                        <input type="text" id="instructor" name="instructor" placeholder="Enter instructor's name"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    </div>
                    <div>
                        <label for="credits" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Credits</label>
                        <input type="number" id="credits" name="credits" placeholder="Enter credits"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5">
                            Add Course
                        </button>
                    </div>
                </form>
            </div>

            <!-- Courses List -->
            <div class="mt-8 space-y-8">
                @foreach ($courses as $course)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-xl">
                        <div class="p-6 sm:p-8">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white">Course: {{ $course->course_name }}</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        Instructor: {{ $course->instructor }} | Credits: {{ $course->credits }}
                                    </p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <!-- Edit Button -->
                                    <button onclick="document.getElementById('edit-form-{{ $course->id }}').classList.remove('hidden')" 
                                            class="p-2 text-gray-500 hover:text-blue-500 dark:hover:text-blue-400 transition duration-200 flex items-center space-x-1"
                                            aria-label="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span>Edit</span>
                                    </button>
                                    <!-- Delete Button -->
                                    <form method="POST" action="{{ route('courses.destroy', $course->id) }}" class="flex items-center space-x-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 text-gray-500 hover:text-red-500 dark:hover:text-red-400 transition duration-200 flex items-center space-x-1"
                                                onclick="return confirm('Are you sure you want to delete this course?')"
                                                aria-label="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Edit Form -->
                            <div id="edit-form-{{ $course->id }}" class="hidden mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                                <form method="POST" action="{{ route('courses.update', $course->id) }}" class="space-y-6">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label for="edit-course_name-{{ $course->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Course Name</label>
                                        <input type="text" id="edit-course_name-{{ $course->id }}" name="course_name" value="{{ $course->course_name }}"
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                    </div>
                                    <div>
                                        <label for="edit-instructor-{{ $course->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Instructor</label>
                                        <input type="text" id="edit-instructor-{{ $course->id }}" name="instructor" value="{{ $course->instructor }}"
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                    </div>
                                    <div>
                                        <label for="edit-credits-{{ $course->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Credits</label>
                                        <input type="number" id="edit-credits-{{ $course->id }}" name="credits" value="{{ $course->credits }}"
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                    </div>
                                    <div class="flex justify-end space-x-3">
                                        <button type="button" 
                                                onclick="document.getElementById('edit-form-{{ $course->id }}').classList.add('hidden')"
                                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-200">
                                            Cancel
                                        </button>
                                        <button type="submit" 
                                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                                            Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
