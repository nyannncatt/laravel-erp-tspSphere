<!-- resources/views/parents/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Parents Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">All Parents</h3>
                    <a href="{{ route('parents.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Add Parent Info
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-sm text-left text-gray-700 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase font-semibold">
                            <tr>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Phone</th>
                                <th class="px-6 py-3">Occupation</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parents as $parent)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $parent->name }}</td>
                                    <td class="px-6 py-4">{{ $parent->email }}</td>
                                    <td class="px-6 py-4">{{ $parent->phone }}</td>
                                    <td class="px-6 py-4">{{ $parent->occupation }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('parents.edit', $parent->id) }}" class="text-blue-600">Edit</a> |
                                        <form action="{{ route('parents.destroy', $parent->id) }}" method="POST" class="inline-block">
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
