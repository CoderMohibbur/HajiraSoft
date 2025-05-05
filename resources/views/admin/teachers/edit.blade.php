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
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">✏️ Edit Teacher</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Update teacher details and save changes</p>
                    </div>
                </div>
                <a href="{{ route('teachers.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-800 text-white hover:bg-gray-900 px-4 py-2 rounded-md text-sm shadow-sm transition">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to List
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('teachers.update', $teacher) }}" method="POST"
              class="bg-white/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User -->
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        User <span class="text-red-500">*</span>
                    </label>
                    <select name="user_id" id="user_id" required
                            class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Select a user</option>
                        @foreach($madrasahs as $id => $name)
                        <option value="{{ $id }}" {{ old('madrasah_id') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach


                    </select>
                </div>

                <!-- Madrasah -->
                <div>
                    <label for="madrasah_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Madrasah <span class="text-red-500">*</span>
                    </label>
                    <select name="madrasah_id" id="madrasah_id" required
                            class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Select a madrasah</option>
                        @foreach ($madrasahs as $id => $name)
                        <option value="{{ $id }}" {{ old('madrasah_id') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach


                    </select>
                </div>

                <!-- Subject -->
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject', $teacher->subject) }}"
                           class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                </div>

                <!-- Designation -->
                <div>
                    <label for="designation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Designation</label>
                    <input type="text" name="designation" id="designation" value="{{ old('designation', $teacher->designation) }}"
                           class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                </div>

                <!-- Join Date -->
                <div>
                    <label for="join_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Join Date</label>
                    <input type="date" name="join_date" id="join_date" value="{{ old('join_date', $teacher->join_date) }}"
                           class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Gender</label>
                    <select name="gender" id="gender" class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Select gender</option>
                        <option value="male" {{ old('gender', $teacher->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $teacher->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', $teacher->gender) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- NID -->
                <div>
                    <label for="nid_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">NID Number</label>
                    <input type="text" name="nid_number" id="nid_number" value="{{ old('nid_number', $teacher->nid_number) }}"
                           class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                </div>

                <!-- Leave Balance -->
                <div>
                    <label for="leave_balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Leave Balance</label>
                    <input type="number" name="leave_balance" id="leave_balance" value="{{ old('leave_balance', $teacher->leave_balance) }}"
                           class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                </div>
            </div>

            <!-- Remarks -->
            <div class="mt-6">
                <label for="remarks" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Remarks</label>
                <textarea name="remarks" id="remarks" rows="4"
                          class="w-full rounded border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">{{ old('remarks', $teacher->remarks) }}</textarea>
            </div>

            <!-- Status -->
            <div class="mt-4 flex items-center gap-2">
                <input type="checkbox" name="status" value="active" {{ $teacher->status === 'active' ? 'checked' : '' }}
                       class="text-indigo-600 border-gray-300 rounded">
                <label for="status" class="text-sm text-gray-700 dark:text-gray-300 font-medium">Active</label>
            </div>

            <!-- Buttons -->
            <div class="pt-6 flex justify-end gap-4">
                <a href="{{ route('teachers.index') }}"
                   class="bg-gray-600 hover:bg-red-600 text-white font-semibold text-sm px-5 py-2.5 rounded-lg shadow transition">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm px-6 py-2.5 rounded-lg shadow transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
