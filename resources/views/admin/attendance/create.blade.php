<x-app-layout>
    <div class="p-6">
        <!-- Header -->
        <div class="bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl p-6 shadow-sm mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 text-green-600 rounded-full p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">
                            ➕ Add Daily Attendance
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Record attendance for each teacher</p>
                    </div>
                </div>
                <a href="{{ route('attendances.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-800 text-white hover:bg-gray-900 px-4 py-2 rounded-md text-sm shadow-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to List
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('attendances.store') }}" method="POST"
              class="bg-white/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left Side -->
                <div class="space-y-4">
                    <div>
                        <label for="teacher_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            Select Teacher <span class="text-red-500">*</span>
                        </label>
                        <select id="teacher_id" name="teacher_id" required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm">
                            <option value="">-- Choose Teacher --</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->user->name ?? 'Unknown' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            Attendance Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status" id="status" required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm">
                            <option value="">-- Choose Status --</option>
                            <option value="present">✅ Present</option>
                            <option value="absent">❌ Absent</option>
                            <option value="late">⏰ Late</option>
                            <option value="leave">📝 Leave</option>
                        </select>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="space-y-4 md:col-span-2">
                    <div>
                        <label for="remarks" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            Remarks
                        </label>
                        <textarea id="remarks" name="remarks" rows="3"
                                  class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm"
                                  placeholder="Any notes or comments...">{{ old('remarks') }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="device" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Device
                            </label>
                            <input type="text" id="device" name="device" value="{{ old('device') }}"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm"
                                   placeholder="Device name or IP">
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Location
                            </label>
                            <input type="text" id="location" name="location" value="{{ old('location') }}"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm"
                                   placeholder="Location of entry">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6 flex justify-end gap-4">
                <a href="{{ route('attendances.index') }}"
                   class="bg-gray-600 hover:bg-red-600 text-white font-semibold text-sm px-5 py-2.5 rounded-lg shadow transition">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold text-sm px-6 py-2.5 rounded-lg shadow transition">
                    Save Attendance
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
