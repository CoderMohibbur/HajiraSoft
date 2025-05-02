<x-app-layout>
    <div class="max-w-2xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="mb-6 px-6 py-4 bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-800 dark:text-white flex items-center gap-2">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5h6M11 9h6M5 15h6m-6 4h6m6-4v4m0 0v-4m0 0l-2 2m2-2l2 2" />
                </svg>
                Edit Employee
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Update employee information</p>
        </div>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="bg-white dark:bg-gray-800/70 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ $employee->name }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm dark:bg-gray-900 dark:text-white" required>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ $employee->email }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm dark:bg-gray-900 dark:text-white" required>
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Phone Number</label>
                    <input type="text" name="phone" value="{{ $employee->phone }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm dark:bg-gray-900 dark:text-white">
                </div>

                <!-- Designation -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Designation</label>
                    <input type="text" name="designation" value="{{ $employee->designation }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm dark:bg-gray-900 dark:text-white">
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-4 flex items-center gap-4">
                <button type="submit"class="inline-flex items-center bg-gray-800 text-white font-semibold px-5 py-2.5 rounded-md shadow hover:bg-black transition duration-300">

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update
                </button>

                <a href="{{ route('employees.index') }}"  class="inline-flex items-center bg-gray-800 text-white font-semibold px-5 py-2.5 rounded-md shadow hover:bg-black transition duration-300">

                    <svg class="w-4 h-4 text-red-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
