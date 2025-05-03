<x-app-layout>
    <div class="p-6">
        <!-- Header -->
        <div class="bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-xl p-6 shadow-sm mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-blue-100 text-blue-600 rounded-full p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">
                            ➕ Add Leave Type
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Create a new leave type</p>
                    </div>
                </div>
                <a href="{{ route('leave-types.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-800 text-white hover:bg-gray-900 px-4 py-2 rounded-md text-sm shadow-sm transition">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to List
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('leave-types.store') }}" method="POST"
              class="bg-white/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                        Leave Type Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                           required>
                </div>

                <!-- Max Days -->
                <div>
                    <label for="max_days" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                        Maximum Days
                    </label>
                    <input type="number" id="max_days" name="max_days" value="{{ old('max_days') }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <!-- Is Paid -->
                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" id="is_paid" name="is_paid" checked
                           class="text-indigo-600 border-gray-300 focus:ring-indigo-500 rounded">
                    <label for="is_paid" class="text-sm text-gray-700 dark:text-gray-300 font-medium">Is Paid</label>
                </div>

                <!-- Is Active -->
                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" id="is_active" name="is_active" checked
                           class="text-indigo-600 border-gray-300 focus:ring-indigo-500 rounded">
                    <label for="is_active" class="text-sm text-gray-700 dark:text-gray-300 font-medium">Is Active</label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-6 flex justify-end gap-4">
                <a href="{{ route('leave-types.index') }}"
                   class="bg-gray-600 hover:bg-red-600 text-white font-semibold text-sm px-5 py-2.5 rounded-lg shadow transition">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm px-6 py-2.5 rounded-lg shadow transition">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
