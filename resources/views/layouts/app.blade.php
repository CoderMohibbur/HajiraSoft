{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html> --}}



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>



    <!-- ✅ drag and drop CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <!-- ✅ TinyMCE Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- tinymce dark mood light mode --}}
    <style>
        /* ✅ Remove TinyMCE Border */
        .tox .tox-editor-container,
        .tox .tox-tinymce {
            border: #374151 !important;
            box-shadow: none !important;
            background: transparent !important;
        }

        /* ✅ Remove Extra Padding */
        .tox .tox-tinymce {
            padding: 0 !important;
        }

        /* ✅ Fix TinyMCE Toolbar & Statusbar Background in Dark Mode */
        .tox .tox-toolbar,
        .tox .tox-statusbar,
        .tox .tox-toolbar-overlord {

            border: none !important;
        }

        /* ✅ Fix TinyMCE Editor Background in Dark Mode */
        .tox .tox-edit-area__iframe {
            background-color: #374151 !important;
            /* Dark Mode Background */
            color: white !important;
            /* Dark Mode Text */
        }

        /* ✅ Remove "Upgrade" Button & Premium Alerts */
        .tox .tox-notification,
        .tox .tox-statusbar__branding,
        .tox .tox-promotion {
            display: none !important;
        }
    </style>


</head>

<body class="font-sans antialiased">
    @include('layouts.header')
    <div class="flex items-start pt-16">
        <div class="lg:!block hidden">
            @include('layouts.sidebar')

            {{-- <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif --}}
        </div>
        <main class="overflow-y-auto relative w-full h-full bg-gray-50 dark:bg-gray-900 lg:ml-64">
            <div class="px-4 pt-6">
                {{ $slot }}
            </div>

        </main>

</body>

</html>

{{-- Dark Mode light mode --}}
<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

    });
</script>

{{-- drag and drop --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.querySelector('.upload-area');
        const fileInput = document.getElementById('fileInput');
        const uploadForm = document.getElementById('uploadForm');

        // ✅ Click to open file selector
        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        // ✅ Auto submit when file is selected
        fileInput.addEventListener('change', () => {
            uploadForm.submit();
        });

        // ✅ Drag & Drop behavior
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('border-blue-400', 'bg-blue-50');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('border-blue-400', 'bg-blue-50');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('border-blue-400', 'bg-blue-50');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files; // Set dropped file
                uploadForm.submit(); // Submit form
            }
        });
    });
</script>

{{-- tinymce er image intrigate js --}}
<script>
    function openModal(url) {
        const modal = document.getElementById('orderModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('modalContent').innerHTML = data;

                // টিনিমসি রি-ইনিশিয়ালাইজ যদি দরকার হয়
                setTimeout(() => {
                    if (document.getElementById("description")) {
                        tinymce.remove();
                        initTinyMCE();
                    }
                }, 100);
            });
    }


    function insertImageToEditor(url) {
        if (typeof tinymce !== 'undefined' && tinymce.activeEditor) {
            tinymce.activeEditor.execCommand('mceInsertContent', false, `<img src="${url}" alt="" />`);
            document.getElementById('orderModal').classList.add('hidden'); // মডাল বন্ধ
        } else {
            console.error("TinyMCE not initialized!");
        }
    }
</script>
{{-- tinymce er image intrigate js end --}}



