<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Add New Course Button -->
                <div class="mb-6 flex justify-end">
                    <button 
                        class="px-6 py-3 bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition"
                        onclick="openAddModal()"> <!-- Trigger modal on click -->
                        Add New Course
                    </button>
                </div>

                <!-- Courses Table -->
                <div class="overflow-x-auto bg-white dark:bg-gray-700 rounded-lg shadow-lg">
                    <table class="min-w-full table-auto text-gray-800 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Course Name</th>
                                <th class="px-6 py-4">Instructor</th>
                                <th class="px-6 py-4">Credits</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Current Course's Record -->
                            <tr class="border-b border-gray-200 dark:border-gray-600">
                                <td class="px-6 py-4">1</td>
                                <td class="px-6 py-4" id="current_course_name">Introduction to Programming</td>
                                <td class="px-6 py-4" id="current_course_instructor">Dr. Jane Doe</td>
                                <td class="px-6 py-4" id="current_course_credits">3</td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600" onclick="openEditModal()">Edit</button> 
                                    |
                                    <button class="text-red-600" onclick="openDeleteModal()">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Add New Course</h3>
            <form>
                <label for="course_name" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Course Name</label>
                <input type="text" id="course_name" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" placeholder="Enter course name" />

                <label for="instructor" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Instructor</label>
                <input type="text" id="instructor" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" placeholder="Enter instructor's name" />

                <label for="credits" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Credits</label>
                <input type="number" id="credits" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" placeholder="Enter credits" />

                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md" onclick="closeAddModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-72">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Edit Course</h3>
            <form>
                <label for="edit_course_name" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Course Name</label>
                <input type="text" id="edit_course_name" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" value="Introduction to Programming" />

                <label for="edit_instructor" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Instructor</label>
                <input type="text" id="edit_instructor" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" value="Dr. Jane Doe" />

                <label for="edit_credits" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Credits</label>
                <input type="number" id="edit_credits" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" value="3" />

                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Delete Course</h3>
            <p class="mb-4 text-gray-700 dark:text-gray-300">Are you sure you want to delete this course record?</p>
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
        alert('Record deleted.');
        closeDeleteModal();
    }
</script>
