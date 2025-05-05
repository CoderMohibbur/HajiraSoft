<x-app-layout>
    <div class="p-6">
        <!-- Header -->
        <div class="bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl p-6 shadow-sm mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 text-green-600 rounded-full p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7v4l3 3m5-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">
                            🗓️ Attendance Records
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">All recorded teacher attendances</p>
                    </div>
                </div>
                <a href="{{ route('attendances.create') }}"
                   class="inline-flex items-center gap-2 bg-indigo-600 text-white hover:bg-indigo-700 px-4 py-2 rounded-md text-sm shadow-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Attendance
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold">Teacher</th>
                        <th class="px-4 py-3 text-left font-semibold">Date</th>
                        <th class="px-4 py-3 text-center font-semibold">Status</th>
                        <th class="px-4 py-3 text-left font-semibold">Remarks</th>
                        <th class="px-4 py-3 text-left font-semibold">Device</th>
                        <th class="px-4 py-3 text-center font-semibold">Verified</th>
                        <th class="px-4 py-3 text-center font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-800 dark:text-gray-100">
                    @forelse($attendances as $attendance)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-4 py-2">{{ $attendance->teacher->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $attendance->date->format('d M Y') }}</td>
                            <td class="px-4 py-2 text-center">
                                @php
                                    $statusColors = [
                                        'present' => 'green',
                                        'absent' => 'red',
                                        'late' => 'yellow',
                                        'leave' => 'blue',
                                    ];
                                @endphp
                                <span class="inline-block px-2 py-1 text-xs font-medium text-{{ $statusColors[$attendance->status] }}-700 bg-{{ $statusColors[$attendance->status] }}-100 rounded-full capitalize">
                                    {{ $attendance->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ $attendance->remarks }}</td>
                            <td class="px-4 py-2">{{ $attendance->device }}</td>
                            <td class="px-4 py-2 text-center">
                                @if($attendance->is_verified)
                                    ✅
                                @else
                                    ❌
                                @endif
                            </td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('attendances.edit', $attendance) }}"
                                   class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('attendances.destroy', $attendance) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure to delete this record?');">
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
                            <td colspan="7" class="text-center px-4 py-4 text-gray-500 dark:text-gray-400">
                                No attendance records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
