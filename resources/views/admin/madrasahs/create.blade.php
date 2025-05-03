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
                            ➕ Add New Madrasah
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Fill in madrasah details and submit</p>
                    </div>
                </div>
                <a href="{{ route('madrasahs.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-800 text-white hover:bg-gray-900 px-4 py-2 rounded-md text-sm shadow-sm transition">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to List
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('madrasahs.store') }}" method="POST" enctype="multipart/form-data"
              class="bg-white/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="eiin" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">EIIN</label>
                            <input type="text" id="eiin" name="eiin" value="{{ old('eiin') }}"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="institute_code" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Institute Code</label>
                            <input type="text" id="institute_code" name="institute_code" value="{{ old('institute_code') }}"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="district_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">District</label>
                            <select id="district_id" name="district_id" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm">
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="upazila_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Upazila</label>
                            <select id="upazila_id" name="upazila_id" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm">
                                <option value="">Select Upazila</option>
                                @foreach($upazilas as $upazila)
                                    <option value="{{ $upazila->id }}" {{ old('upazila_id') == $upazila->id ? 'selected' : '' }}>{{ $upazila->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Type</label>
                        <select id="type" name="type"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm">
                            <option value="dakhil" {{ old('type') == 'dakhil' ? 'selected' : '' }}>Dakhil</option>
                            <option value="ebtedayee" {{ old('type') == 'ebtedayee' ? 'selected' : '' }}>Ebtedayee</option>
                            <option value="alim" {{ old('type') == 'alim' ? 'selected' : '' }}>Alim</option>
                            <option value="fazil" {{ old('type') == 'fazil' ? 'selected' : '' }}>Fazil</option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Status</label>
                        <select id="status" name="status"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm">
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div>
                        <label for="established_at" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Established At</label>
                        <input type="date" id="established_at" name="established_at" value="{{ old('established_at') }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white text-sm">
                    </div>

                    <div>
                        <label for="logo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Logo</label>
                        <input type="file" id="logo" name="logo"
                               class="w-full text-sm text-gray-700 dark:text-gray-300 file:bg-gray-100 file:border-0 file:px-4 file:py-2 file:rounded-lg file:text-sm file:font-semibold file:text-indigo-600 hover:file:bg-gray-200">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-6 flex justify-end gap-4">
                <a href="{{ route('madrasahs.index') }}"
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
