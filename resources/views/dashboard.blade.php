<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            📅 HajiraSoft Dashboard
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Improved Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <!-- Total Madrasahs -->
                <div
                    class="relative overflow-hidden bg-white shadow-lg rounded-xl p-5 border-l-8 border-blue-500 hover:shadow-2xl transition-all duration-300">
                    <div class="absolute top-2 right-2 bg-blue-100 text-blue-700 p-2 rounded-full shadow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 7l6 6-6 6M21 7l-6 6 6 6" />
                        </svg>
                    </div>
                    <h4 class="text-sm text-gray-500 font-semibold">Total Madrasahs</h4>
                    <p class="text-4xl font-extrabold text-blue-600 mt-2"> {{ $totalMadrasahs }}</p>
                    <span class="text-xs text-gray-400 block mt-1">as of today</span>
                </div>


                <!-- Total Teachers -->
                <div
                    class="relative overflow-hidden bg-white shadow-lg rounded-xl p-5 border-l-8 border-green-500 hover:shadow-2xl transition-all duration-300">
                    <div class="absolute top-2 right-2 bg-green-100 text-green-700 p-2 rounded-full shadow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h4 class="text-sm text-gray-500 font-semibold">Total Teachers</h4>
                    <p class="text-4xl font-extrabold text-green-600 mt-2">32</p>
                    <span class="text-xs text-gray-400 block mt-1">updated live</span>
                </div>

                <!-- Today's Attendance -->
                <div
                    class="relative overflow-hidden bg-white shadow-lg rounded-xl p-5 border-l-8 border-purple-500 hover:shadow-2xl transition-all duration-300">
                    <div class="absolute top-2 right-2 bg-purple-100 text-purple-700 p-2 rounded-full shadow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 8v4l3 3" />
                        </svg>
                    </div>
                    <h4 class="text-sm text-gray-500 font-semibold">Today's Attendance</h4>
                    <p class="text-4xl font-extrabold text-purple-600 mt-2">25</p>
                    <span class="text-xs text-gray-400 block mt-1">till now</span>
                </div>

                <!-- Absentees -->
                <div
                    class="relative overflow-hidden bg-white shadow-lg rounded-xl p-5 border-l-8 border-red-500 hover:shadow-2xl transition-all duration-300">
                    <div class="absolute top-2 right-2 bg-red-100 text-red-700 p-2 rounded-full shadow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <h4 class="text-sm text-gray-500 font-semibold">Absentees</h4>
                    <p class="text-4xl font-extrabold text-red-600 mt-2">7</p>
                    <span class="text-xs text-gray-400 block mt-1">just now</span>
                </div>

            </div>


            <!-- Ultra Enhanced Attendance Table (Version 2) -->
            <div
                class="bg-gradient-to-br from-white via-blue-50 to-white shadow-2xl rounded-3xl overflow-hidden mb-10 border border-blue-200">
                <div
                    class="px-6 py-6 bg-gradient-to-r from-blue-100 via-white to-blue-50 border-b border-blue-300 flex items-center justify-between">
                    <h3 class="text-xl font-extrabold text-blue-900 tracking-wide flex items-center gap-2">
                        <svg class="w-7 h-7 text-blue-600 drop-shadow-md animate-pulse" fill="none"
                            stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-opacity="0.2"
                                stroke-width="2" />
                            <path d="M9 17v-2a4 4 0 0 1 4-4h4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3 7v4a4 4 0 0 0 4 4h14" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Attendance Summary
                    </h3>
                    <span class="text-sm text-gray-500 italic">📆 Updated: Today</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left divide-y divide-gray-100">
                        <thead class="bg-white text-gray-700 uppercase text-[11px] font-bold tracking-wider border-b">
                            <tr class="text-gray-600">
                                <th class="px-6 py-4">👨‍🏫 Name</th>
                                <th class="px-6 py-4">🎓 Designation</th>
                                <th class="px-6 py-4">📌 Status</th>
                                <th class="px-6 py-4">⏰ Time In</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <tr class="hover:bg-blue-50 transition duration-200 group">
                                <td class="px-6 py-4 font-semibold text-gray-800 whitespace-nowrap">Md Karim</td>
                                <td class="px-6 py-4 text-gray-500 whitespace-nowrap">Assistant Maulana</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-200 text-green-800 shadow group-hover:scale-105 transition">
                                        ✅ Present
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-blue-900 font-mono">08:55 AM</td>
                            </tr>
                            <tr class="hover:bg-blue-50 transition duration-200 group">
                                <td class="px-6 py-4 font-semibold text-gray-800">Fatima Bibi</td>
                                <td class="px-6 py-4 text-gray-500">Senior Teacher</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-200 text-red-800 shadow group-hover:scale-105 transition">
                                        ❌ Absent
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-400 font-mono">—</td>
                            </tr>
                            <tr class="hover:bg-blue-50 transition duration-200 group">
                                <td class="px-6 py-4 font-semibold text-gray-800">Abul Haseen</td>
                                <td class="px-6 py-4 text-gray-500">Junior Teacher</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-200 text-green-800 shadow group-hover:scale-105 transition">
                                        ✅ Present
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-blue-900 font-mono">09:30 AM</td>
                            </tr>
                            <tr class="hover:bg-blue-50 transition duration-200 group">
                                <td class="px-6 py-4 font-semibold text-gray-800">Ayesha Akhtar</td>
                                <td class="px-6 py-4 text-gray-500">Assistant Maulana</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-200 text-green-800 shadow group-hover:scale-105 transition">
                                        ✅ Present
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-blue-900 font-mono">08:50 AM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Board Announcements -->
            <div
                class="bg-gradient-to-br from-indigo-50 via-white to-indigo-100 shadow-2xl rounded-3xl p-5 sm:p-8 md:p-10 border-l-[6px] border-indigo-500">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-3">
                    <h3
                        class="text-2xl md:text-3xl font-extrabold text-indigo-700 flex items-center gap-3 tracking-wide">
                        <svg class="w-6 h-6 md:w-7 md:h-7 text-indigo-500 animate-wiggle" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856C18.07 18.67 20 15.962 20 13c0-3.866-3.582-7-8-7S4 9.134 4 13c0 2.962 1.93 5.67 4.062 7z" />
                        </svg>
                        Central Board Announcements
                    </h3>
                    <span
                        class="text-xs sm:text-sm bg-indigo-600 text-white px-4 py-1.5 rounded-full shadow-lg animate-pulse whitespace-nowrap">
                        📣 Important from Board
                    </span>
                </div>

                <div class="space-y-6 text-indigo-900 text-sm sm:text-[15px]">

                    <!-- Notice 1 -->
                    <div
                        class="bg-white px-4 sm:px-6 py-5 sm:py-6 rounded-2xl border-l-4 border-indigo-500 shadow-md hover:shadow-xl transition flex flex-col gap-3">
                        <div class="flex flex-col sm:flex-row justify-between gap-3">
                            <div class="flex flex-wrap gap-3 items-start">
                                <span
                                    class="text-xs font-bold text-indigo-800 bg-indigo-100 px-3 py-1 rounded-full uppercase tracking-wide">Important</span>
                                <p><strong>07-Apr-2025:</strong> Biometric Setup Deadline — All institutes must comply
                                    by 15th.</p>
                            </div>
                            <div class="text-xs text-gray-500 text-right">🆔 ID: #20250407<br>📅 Expiry: 15-Apr-2025
                            </div>
                        </div>
                        <button onclick="alert('Previewing guideline.pdf')"
                            class="text-indigo-600 text-sm underline hover:text-indigo-800 flex items-center gap-1">
                            📎 View attached guideline.pdf <span class="text-gray-400">(250 KB)</span>
                        </button>
                    </div>

                    <!-- Notice 2 -->
                    <div
                        class="bg-white px-4 sm:px-6 py-5 sm:py-6 rounded-2xl border-l-4 border-indigo-400 shadow-md hover:shadow-xl transition flex flex-col gap-3">
                        <div class="flex flex-col sm:flex-row justify-between gap-3">
                            <div class="flex flex-wrap gap-3 items-start">
                                <span
                                    class="text-xs font-bold text-indigo-800 bg-indigo-100 px-3 py-1 rounded-full uppercase tracking-wide">General</span>
                                <p><strong>07-Apr-2025:</strong> Weekly Off Day Configuration Updated.</p>
                            </div>
                            <div class="text-xs text-gray-500 text-right">🆔 ID: #20250407-B<br>📅 Expiry: 30-Apr-2025
                            </div>
                        </div>
                        <button onclick="alert('Previewing weekly-off-notice.docx')"
                            class="text-indigo-600 text-sm underline hover:text-indigo-800 flex items-center gap-1">
                            📎 Download weekly-off-notice.docx <span class="text-gray-400">(118 KB)</span>
                        </button>
                    </div>

                    <!-- Notice 3 -->
                    <div
                        class="bg-white px-4 sm:px-6 py-5 sm:py-6 rounded-2xl border-l-4 border-indigo-300 shadow-md hover:shadow-xl transition flex flex-col gap-3">
                        <div class="flex flex-col sm:flex-row justify-between gap-3">
                            <div class="flex flex-wrap gap-3 items-start">
                                <span
                                    class="text-xs font-bold text-indigo-800 bg-indigo-100 px-3 py-1 rounded-full uppercase tracking-wide">Audit</span>
                                <p><strong>03-Apr-2025:</strong> Midterm Audit Notice issued to all admins.</p>
                            </div>
                            <div class="text-xs text-gray-500 text-right">🆔 ID: #20250403<br>📅 Expiry: 20-Apr-2025
                            </div>
                        </div>
                        <button onclick="alert('Previewing audit-instructions.pdf')"
                            class="text-indigo-600 text-sm underline hover:text-indigo-800 flex items-center gap-1">
                            📎 View audit-instructions.pdf <span class="text-gray-400">(320 KB)</span>
                        </button>
                    </div>

                    <!-- View All -->
                    <div class="text-right pt-4 sm:pt-6">
                        <a href="#"
                            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-6 sm:px-7 py-2 rounded-full shadow-lg">
                            View All Notices
                        </a>
                    </div>
                </div>
            </div>

            <style>
                @keyframes wiggle {

                    0%,
                    100% {
                        transform: rotate(-3deg);
                    }

                    50% {
                        transform: rotate(3deg);
                    }
                }

                .animate-wiggle {
                    animation: wiggle 1.5s infinite;
                }
            </style>



        </div>
    </div>
</x-app-layout>
