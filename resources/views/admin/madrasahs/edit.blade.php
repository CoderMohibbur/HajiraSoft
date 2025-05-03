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
                        <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">✏️ Edit Madrasah</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Update existing madrasah details below</p>
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
        <form action="{{ route('madrasahs.update', $madrasah) }}" method="POST" enctype="multipart/form-data"
              class="bg-white/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left -->
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Madrasah Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $madrasah->name) }}" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="eiin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">EIIN <span class="text-red-500">*</span></label>
                        <input type="text" name="eiin" id="eiin" value="{{ old('eiin', $madrasah->eiin) }}" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="institute_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Institute Code</label>
                        <input type="text" name="institute_code" id="institute_code" value="{{ old('institute_code', $madrasah->institute_code) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $madrasah->email) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $madrasah->phone) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="established_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Established Date</label>
                        <input type="date" name="established_at" id="established_at" value="{{ old('established_at', $madrasah->established_at) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <!-- Right -->
                <div class="space-y-4">
                    <div>
                        <label for="district_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">District</label>
                        <select name="district_id" id="district_id"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-indigo-500">
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ $madrasah->district_id == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="upazila_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upazila</label>
                        <select name="upazila_id" id="upazila_id"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-indigo-500">
                            @foreach($upazilas as $upazila)
                                <option value="{{ $upazila->id }}" {{ $madrasah->upazila_id == $upazila->id ? 'selected' : '' }}>
                                    {{ $upazila->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                        <select name="type" id="type"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-indigo-500">
                            @foreach(['ebtedayee', 'dakhil', 'alim', 'fazil'] as $type)
                                <option value="{{ $type }}" {{ $madrasah->type == $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Logo</label>
                        <input type="file" name="logo" id="logo"
                               class="w-full text-sm text-gray-600 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200">
                        @if ($madrasah->logo)
                            <img src="{{ asset('storage/' . $madrasah->logo) }}" alt="Logo" class="h-16 mt-2">
                        @endif
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select name="status" id="status"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-sm focus:ring-indigo-500">
                            @foreach(['active', 'pending', 'inactive'] as $status)
                                <option value="{{ $status }}" {{ $madrasah->status == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Form Buttons -->
            <div class="pt-6 flex justify-end gap-4">
                <a href="{{ route('madrasahs.index') }}"
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
