<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 px-4 py-5 bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="bg-indigo-100 text-indigo-600 p-2 rounded-full">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-800 dark:text-white">Employee Management</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Add and manage your staff records efficiently</p>
                </div>
            </div>

            <a href="{{ route('employees.create') }}"
            class="inline-flex items-center bg-gray-800 text-white font-semibold px-5 py-2.5 rounded-md shadow hover:bg-black transition duration-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add Employee
            </a>
        </div>


        <!-- Success Alert -->
        @if(session('success'))
            <div class="flex items-center bg-green-100 text-green-800 border border-green-300 rounded-lg p-4 mb-6 shadow-sm text-sm">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12h2V7H9v5zm1 6a9 9 0 100-18 9 9 0 000 18z"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Table -->
        <div class="overflow-x-auto rounded-xl shadow-md border border-gray-200 bg-white">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4 border-b">#</th>
                        <th class="px-6 py-4 border-b">Name</th>
                        <th class="px-6 py-4 border-b">Email</th>
                        <th class="px-6 py-4 border-b">Phone</th>
                        <th class="px-6 py-4 border-b">Designation</th>
                        <th class="px-6 py-4 border-b text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($employees as $employee)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $employee->name }}</td>
                            <td class="px-6 py-4">{{ $employee->email }}</td>
                            <td class="px-6 py-4">{{ $employee->phone }}</td>
                            <td class="px-6 py-4">{{ $employee->designation }}</td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                   class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium transition">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure you want to delete this employee?')"
                                            class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 font-medium transition">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500">
                                🚫 No employees found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
