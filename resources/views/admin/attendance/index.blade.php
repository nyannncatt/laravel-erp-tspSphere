<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Add New Attendance Button -->
                <div class="mb-6 flex justify-end">
                    <button 
                        class="px-6 py-3 bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition"
                        onclick="openAddModal()"> <!-- Trigger modal on click -->
                        Add New Attendance
                    </button>
                </div>

                <!-- Attendance Table -->
                <div class="overflow-x-auto bg-white dark:bg-gray-700 rounded-lg shadow-lg">
                    <table class="min-w-full table-auto text-gray-800 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Student Name</th>
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Current Student's Record -->
                            <tr class="border-b border-gray-200 dark:border-gray-600">
                                <td class="px-6 py-4">1</td>
                                <td class="px-6 py-4" id="current_student_name">John Doe</td>
                                <td class="px-6 py-4" id="current_student_date">2025-05-01</td>
                                <td class="px-6 py-4" id="current_student_status">Present</td>
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
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Add New Attendance</h3>
            <form>
                <label for="student_name" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Student Name</label>
                <input type="text" id="student_name" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" placeholder="Enter student name" />

                <label for="date" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Date</label>
                <input type="date" id="date" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" />

                <label for="status" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Status</label>
                <select id="status" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500">
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                    <option value="late">Late</option>
                </select>

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
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Edit Attendance</h3>
            <form>
                <label for="edit_student_name" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Student Name</label>
                <input type="text" id="edit_student_name" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" value="John Doe" />

                <label for="edit_date" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Date</label>
                <input type="date" id="edit_date" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500" value="2025-05-01" />

                <label for="edit_status" class="block mb-2 text-sm text-gray-700 dark:text-gray-300">Status</label>
                <select id="edit_status" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500">
                    <option value="present" selected>Present</option>
                    <option value="absent">Absent</option>
                    <option value="late">Late</option>
                </select>

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
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Delete Attendance</h3>
            <p class="mb-4 text-gray-700 dark:text-gray-300">Are you sure you want to delete this attendance record?</p>
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
