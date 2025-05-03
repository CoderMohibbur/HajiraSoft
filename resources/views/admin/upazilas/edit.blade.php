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
                            ✏️ Edit Upazila
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Update the selected upazila's information</p>
                    </div>
                </div>
                <a href="{{ route('upazilas.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-800 text-white hover:bg-gray-900 px-4 py-2 rounded-md text-sm shadow-sm transition">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to List
                </a>
            </div>
        </div>

        <!-- Edit Form -->
        <form action="{{ route('upazilas.update', $upazila) }}" method="POST"
              class="bg-white/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left Side -->
                <div class="md:col-span-2 space-y-4">
                    <!-- Upazila Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            Upazila Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $upazila->name) }}" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    <!-- District -->
                    <div>
                        <label for="district_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            District <span class="text-red-500">*</span>
                        </label>
                        <select id="district_id" name="district_id" required
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                            <option value="">-- Select District --</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ $upazila->district_id == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="space-y-4">
                    <!-- Code -->
                    <div>
                        <label for="code" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                            Upazila Code
                        </label>
                        <input type="text" id="code" name="code" value="{{ old('code', $upazila->code) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    <!-- Is Active -->
                    <div class="flex items-center gap-2 pt-2">
                        <input type="checkbox" id="is_active" name="is_active"
                               {{ old('is_active', $upazila->is_active) ? 'checked' : '' }}
                               class="text-indigo-600 border-gray-300 focus:ring-indigo-500 rounded">
                        <label for="is_active" class="text-sm text-gray-700 dark:text-gray-300 font-medium">Active</label>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-6 flex justify-end gap-4">
                <a href="{{ route('upazilas.index') }}"
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
