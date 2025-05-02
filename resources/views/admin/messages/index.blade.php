<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <!-- Header Row -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Inbox</h3>
                    <button onclick="openSendModal()"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Send Message
                    </button>
                </div>

                <!-- Inbox Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-sm text-left text-gray-700 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase font-semibold">
                            <tr>
                                <th class="px-6 py-3">Sender</th>
                                <th class="px-6 py-3">Role</th>
                                <th class="px-6 py-3">Subject</th>
                                <th class="px-6 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr onclick="openMessageModal('Mr. Smith', 'Teacher', 'Class Schedule', 'Please note the updated class timing.')"
                                class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                                <td class="px-6 py-4">Mr. Smith</td>
                                <td class="px-6 py-4">Teacher</td>
                                <td class="px-6 py-4">Class Schedule</td>
                                <td class="px-6 py-4">2025-05-01</td>
                            </tr>
                            <tr onclick="openMessageModal('Mrs. Doe', 'Parent', 'Meeting Request', 'Can we meet tomorrow to discuss progress?')"
                                class="cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                                <td class="px-6 py-4">Mrs. Doe</td>
                                <td class="px-6 py-4">Parent</td>
                                <td class="px-6 py-4">Meeting Request</td>
                                <td class="px-6 py-4">2025-04-29</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- View Message Modal -->
    <div id="messageModal"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-[28rem] max-w-full">
            <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100" id="modalSubject">Message Subject
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                <span id="modalSender">Sender Name</span> (<span id="modalRole">Role</span>)
            </p>
            <hr class="my-3 border-gray-300 dark:border-gray-600" />
            <p class="text-gray-800 dark:text-gray-200" id="modalContent">Message content goes here...</p>
            <div class="flex justify-end mt-6">
                <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md"
                    onclick="closeMessageModal()">Close</button>
            </div>
        </div>
    </div>

    <!-- Send Message Modal -->
    <div id="sendModal"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-[28rem] max-w-full">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Send Message</h3>
            <form>
                <label for="recipient" class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Recipient</label>
                <select id="recipient"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Recipient</option>
                    <option value="teacher">Teacher</option>
                    <option value="parent">Parent</option>
                </select>

                <label for="subject" class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                <input type="text" id="subject"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter subject">

                <label for="message" class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Message</label>
                <textarea id="message" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4 focus:ring-2 focus:ring-blue-500"
                    placeholder="Type your message here..."></textarea>

                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md"
                        onclick="closeSendModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Send</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function openMessageModal(sender, role, subject, content) {
            document.getElementById('modalSender').innerText = sender;
            document.getElementById('modalRole').innerText = role;
            document.getElementById('modalSubject').innerText = subject;
            document.getElementById('modalContent').innerText = content;
            document.getElementById('messageModal').classList.remove('hidden');
        }

        function closeMessageModal() {
            document.getElementById('messageModal').classList.add('hidden');
        }

        function openSendModal() {
            document.getElementById('sendModal').classList.remove('hidden');
        }

        function closeSendModal() {
            document.getElementById('sendModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
