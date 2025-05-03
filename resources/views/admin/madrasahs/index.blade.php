<x-app-layout>
    <div class="p-6">
        <!-- Header -->
        <div class="bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl p-6 shadow-sm mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 text-green-600 rounded-full p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3v18" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">
                            🏫 All Madrasahs
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">List of all registered madrasahs</p>
                    </div>
                </div>
                <a href="{{ route('madrasahs.create') }}"
                   class="inline-flex items-center gap-2 bg-green-600 text-white hover:bg-green-700 px-4 py-2 rounded-md text-sm shadow-sm transition">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Madrasah
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold">Name</th>
                        <th class="px-4 py-3 text-left font-semibold">EIIN</th>
                        <th class="px-4 py-3 text-left font-semibold">Type</th>
                        <th class="px-4 py-3 text-left font-semibold">Phone</th>
                        <th class="px-4 py-3 text-center font-semibold">Status</th>
                        <th class="px-4 py-3 text-center font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-800 dark:text-gray-100">
                    @forelse($madrasahs as $madrasah)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-4 py-2">{{ $madrasah->name }}</td>
                            <td class="px-4 py-2">{{ $madrasah->eiin }}</td>
                            <td class="px-4 py-2 capitalize">{{ $madrasah->type }}</td>
                            <td class="px-4 py-2">{{ $madrasah->phone ?? '-' }}</td>
                            <td class="px-4 py-2 text-center">
                                <span class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                    {{ $madrasah->status === 'active' ? 'text-green-700 bg-green-100' : ($madrasah->status === 'pending' ? 'text-yellow-700 bg-yellow-100' : 'text-red-700 bg-red-100') }}">
                                    {{ ucfirst($madrasah->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('madrasahs.edit', $madrasah) }}"
                                   class="inline-block text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('madrasahs.destroy', $madrasah) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure to delete this madrasah?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-4 py-4 text-gray-500 dark:text-gray-400">No madrasahs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
