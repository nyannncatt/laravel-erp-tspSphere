<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Announcements Board') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-8 border border-gray-300 dark:border-gray-600">

                <!-- Add Feed Button -->
                <div class="mb-6 flex justify-end">
                    <button 
                        class="px-6 py-3 bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition"
                        onclick="openAddModal()">
                        Add Feed
                    </button>
                </div>

                <!-- Feed Post Boxes (Forum Style) -->
                <div class="space-y-4">
                    <!-- Post 1 -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md border border-gray-300 dark:border-gray-600">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">Welcome Back!</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">2025-05-10</span>
                        </div>
                        <p class="text-gray-800 dark:text-gray-200 mb-4">We are excited to start the new school year.</p>
                        <div class="flex justify-end space-x-2">
                            <button class="text-blue-600" onclick="openEditModal()">Edit</button> 
                            |
                            <button class="text-red-600" onclick="openDeleteModal()">Delete</button>
                        </div>
                    </div>

                    <!-- Additional Post Example -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md border border-gray-300 dark:border-gray-600">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">New Announcements</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">2025-05-09</span>
                        </div>
                        <p class="text-gray-800 dark:text-gray-200 mb-4">Important updates for this week’s events.</p>
                        <div class="flex justify-end space-x-2">
                            <button class="text-blue-600" onclick="openEditModal()">Edit</button> 
                            |
                            <button class="text-red-600" onclick="openDeleteModal()">Delete</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96 border border-gray-300 dark:border-gray-600">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Add Feed</h3>
            <form>
                <label class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4" placeholder="Enter title" />

                <label class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Content</label>
                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4" placeholder="Enter content..."></textarea>

                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md" onclick="closeAddModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Post</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96 border border-gray-300 dark:border-gray-600">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Edit Feed</h3>
            <form>
                <label class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4" value="Welcome Back!" />

                <label class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Content</label>
                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4">We are excited to start the new school year.</textarea>

                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96 border border-gray-300 dark:border-gray-600">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Delete Feed</h3>
            <p class="mb-4 text-gray-700 dark:text-gray-300">Are you sure you want to delete this feed post?</p>
            <div class="flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md" onclick="closeDeleteModal()">Cancel</button>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md" onclick="deleteRecord()">Delete</button>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    function openEditModal() {
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function deleteRecord() {
        alert('Feed item deleted.');
        closeDeleteModal();
    }
</script>
