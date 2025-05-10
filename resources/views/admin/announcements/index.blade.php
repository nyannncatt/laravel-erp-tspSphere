<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ __('Announcements Board') }}
            </h2>
            <div class="flex space-x-2">
                <button id="theme-toggle" type="button" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                    </svg>
                </button>
            </div>
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

            <!-- New Post Card -->
            <div>
                <form method="POST" action="{{ route('announcements.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                        <input type="text" id="title" name="title" placeholder="What's this about?" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content</label>
                        <textarea id="content" name="content" rows="4" placeholder="Share your announcement with the community..."
                                  class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5">
                            Post Announcement
                        </button>
                    </div>
                </form>
            </div>

            <!-- Announcements List -->
            <div class="mt-8 space-y-8">
                @foreach ($announcements as $announcement)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-xl">
                        <div class="p-6 sm:p-8">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white">{{ $announcement->title }}</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        Posted {{ $announcement->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <!-- Edit Button -->
                                    <button onclick="toggleEditForm('edit-form-{{ $announcement->id }}')" 
                                            class="p-2 text-gray-500 hover:text-blue-500 dark:hover:text-blue-400 transition duration-200 flex items-center space-x-1"
                                            aria-label="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span>Edit</span>
                                    </button>
                                    <!-- Delete Button -->
                                    <form method="POST" action="{{ route('announcements.destroy', $announcement->id) }}" class="flex items-center space-x-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 text-gray-500 hover:text-red-500 dark:hover:text-red-400 transition duration-200 flex items-center space-x-1"
                                                onclick="return confirm('Are you sure you want to delete this announcement?')"
                                                aria-label="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                            <p class="text-gray-700 dark:text-gray-300 mb-6 whitespace-pre-line">{{ $announcement->content }}</p>
                            
                            <!-- Edit Form (Hidden by default) -->
                            <div id="edit-form-{{ $announcement->id }}" class="hidden mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                                <form method="POST" action="{{ route('announcements.update', $announcement->id) }}" class="space-y-6">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label for="edit-title-{{ $announcement->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                                        <input type="text" id="edit-title-{{ $announcement->id }}" name="title" value="{{ $announcement->title }}" 
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                    </div>
                                    <div>
                                        <label for="edit-content-{{ $announcement->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content</label>
                                        <textarea id="edit-content-{{ $announcement->id }}" name="content" rows="4"
                                                  class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">{{ $announcement->content }}</textarea>
                                    </div>
                                    <div class="flex justify-end space-x-3">
                                        <button type="button" 
                                                onclick="toggleEditForm('edit-form-{{ $announcement->id }}')"
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

    <script>
        function toggleEditForm(formId) {
            const form = document.getElementById(formId);
            form.classList.toggle('hidden');
        }

        // Theme toggle functionality
        const themeToggle = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            lightIcon.classList.remove('hidden');
            document.documentElement.classList.add('dark');
        } else {
            darkIcon.classList.remove('hidden');
            document.documentElement.classList.remove('dark');
        }

        themeToggle.addEventListener('click', function() {
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');
            
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        });
    </script>
</x-app-layout>
