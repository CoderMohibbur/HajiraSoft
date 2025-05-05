<x-app-layout>
    <div class="p-6">
        <!-- Header -->
        <div class="bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl p-6 shadow-sm mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-yellow-100 text-yellow-600 rounded-full p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">
                            ✏️ Edit Attendance
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Update attendance record for a teacher</p>
                    </div>
                </div>
                <a href="{{ route('attendances.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-800 text-white hover:bg-gray-900 px-4 py-2 rounded-md text-sm shadow-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to List
                </a>
            </div>
        </div>

        <!-- Edit Form -->
        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST"
              class="bg-white/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left -->
                <div class="md:col-span-2 space-y-4">
                    <!-- Teacher -->
                    <div>
                        <label for="teacher_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Teacher</label>
                        <select name="teacher_id" id="teacher_id" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm" required>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id', $attendance->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->user->name ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Date</label>
                        <input type="date" name="date" id="date" value="{{ old('date', $attendance->date) }}"
                               class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm" required>
                    </div>
                </div>

                <!-- Right -->
                <div class="space-y-4">
                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Status</label>
                        <select name="status" id="status" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm" required>
                            @foreach(['present', 'absent', 'late', 'leave'] as $status)
                                <option value="{{ $status }}" {{ old('status', $attendance->status) == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Verified By -->
                    <div>
                        <label for="verified_by" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Verified By</label>
                        <input type="text" name="verified_by" id="verified_by" value="{{ old('verified_by', $attendance->verified_by) }}"
                               class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm">
                    </div>
                </div>
            </div>

            <!-- Remarks & Buttons -->
            <div class="mt-6 space-y-4">
                <div>
                    <label for="remarks" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Remarks</label>
                    <textarea name="remarks" id="remarks" rows="3"
                              class="w-full px-4 py-2 rounded-lg border dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm">{{ old('remarks', $attendance->remarks) }}</textarea>
                </div>

                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ route('attendances.index') }}"
                       class="bg-gray-600 hover:bg-red-600 text-white font-semibold text-sm px-5 py-2.5 rounded-lg shadow transition">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm px-6 py-2.5 rounded-lg shadow transition">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
