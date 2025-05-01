<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Student Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Add Student Button -->
                <div class="mb-6 flex justify-end">
                    <button 
                        class="px-6 py-3 bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition"
                        onclick="openAddModal()">
                        Add Student Info
                    </button>
                </div>

                <!-- Student Info Table -->
                <div class="overflow-x-auto bg-white dark:bg-gray-700 rounded-lg shadow-lg">
                    <table class="min-w-full table-auto text-gray-800 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Name</th>
                                <th class="px-6 py-4">Email</th>
                                <th class="px-6 py-4">Phone</th>
                                <th class="px-6 py-4">Photo</th>
                                <th class="px-6 py-4">Date of Birth</th>
                                <th class="px-6 py-4">Address</th>
                                <th class="px-6 py-4">Grade/Class</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-600">
                                <td class="px-6 py-4">1</td>
                                <td class="px-6 py-4">John Doe</td>
                                <td class="px-6 py-4">john.doe@example.com</td>
                                <td class="px-6 py-4">+1 123-456-7890</td>
                                <td class="px-6 py-4">
                                    <img src="path_to_image.jpg" alt="John's photo" class="w-12 h-12 rounded-full">
                                </td>
                                <td class="px-6 py-4">2005-06-15</td>
                                <td class="px-6 py-4">123 Elm Street</td>
                                <td class="px-6 py-4">Grade 10</td>
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
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Add Student Info</h3>
            <form enctype="multipart/form-data">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md mb-3" placeholder="Enter full name" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input type="email" class="w-full px-4 py-2 border rounded-md mb-3" placeholder="Enter email" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md mb-3" placeholder="Enter phone number" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Date of Birth</label>
                <input type="date" class="w-full px-4 py-2 border rounded-md mb-3" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Address</label>
                <textarea class="w-full px-4 py-2 border rounded-md mb-3" placeholder="Enter address"></textarea>

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Grade/Class</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md mb-3" placeholder="e.g. Grade 10" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Student Photo</label>
                <input type="file" accept="image/*" class="w-full px-4 py-2 border rounded-md mb-4 bg-white dark:bg-gray-900" />

                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md" onclick="closeAddModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Edit Student Info</h3>
            <form enctype="multipart/form-data">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md mb-3" value="John Doe" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input type="email" class="w-full px-4 py-2 border rounded-md mb-3" value="john.doe@example.com" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md mb-3" value="+1 123-456-7890" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Date of Birth</label>
                <input type="date" class="w-full px-4 py-2 border rounded-md mb-3" value="2005-06-15" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Address</label>
                <textarea class="w-full px-4 py-2 border rounded-md mb-3">123 Elm Street</textarea>

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Grade/Class</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md mb-3" value="Grade 10" />

                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Change Photo</label>
                <input type="file" accept="image/*" class="w-full px-4 py-2 border rounded-md mb-4 bg-white dark:bg-gray-900" />

                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Delete Student Info</h3>
            <p class="mb-4 text-gray-700 dark:text-gray-300">Are you sure you want to delete this student?</p>
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
        alert('Student record deleted.');
        closeDeleteModal();
    }
</script>
