<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-bind:data-theme="darkMode ? 'dark' : 'light'">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <!-- Modern CSS framework -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
    <!-- Improved font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Essential libraries -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Added Iconify for better icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    <title>Reservasi Hotel Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary: #4F46E5;
            --primary-light: #EEF2FF;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --dark: #1F2937;
            --light: #F9FAFB;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F3F4F6;
            overflow-x: hidden;
        }

        .shadow-soft {
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.04);
        }

        .shadow-hover {
            transition: box-shadow 0.3s ease;
        }

        .shadow-hover:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .bg-card {
            background-color: #ffffff;
            border-radius: 12px;
        }

        .sidebar-link {
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-link.active {
            background-color: var(--primary);
            color: white;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Dark mode adjustments */
        [data-theme="dark"] {
            --bg-main: #121212;
            --bg-card: #1E1E1E;
            --text-primary: #F3F4F6;
            --text-secondary: #D1D5DB;
        }

        [data-theme="dark"] body {
            background-color: var(--bg-main);
            color: var(--text-primary);
        }

        [data-theme="dark"] .bg-card {
            background-color: var(--bg-card);
        }

        /* Animation for notification bell */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .notification-bell:hover {
            animation: pulse 1s infinite;
        }
    </style>
</head>

<body class="antialiased" x-bind:class="darkMode ? 'dark bg-gray-900' : 'bg-gray-100'">
    <div x-data="{ sidebarOpen: false }">
        <!-- Sidebar with Alpine.js -->
        <aside id="default-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform duration-300 ease-in-out bg-white dark:bg-gray-800 shadow-soft"
            x-bind:class="sidebarOpen || window.innerWidth >= 640 ? 'translate-x-0' : '-translate-x-full'"
            aria-label="Sidebar">
            <div class="h-full px-3 py-6 overflow-y-auto">
                <!-- Logo -->
                <div class="flex items-center justify-center mb-8 px-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="bg-gradient-to-r from-indigo-500 to-purple-600 w-10 h-10 rounded-lg flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-xl">T</span>
                        </div>
                        <span class="text-xl font-bold text-gray-800 dark:text-white">Reservasi Hotel</span>
                    </div>
                </div>

                <!-- Navigation links placeholder - will be rendered by sidebar component -->
                <x-dashboard.sidebar />
            </div>
        </aside>

        <!-- Main Content Container -->
        <div class="transition-all duration-300 ease-in-out min-h-screen flex flex-col"
            x-bind:class="window.innerWidth >= 640 ? 'sm:ml-64' : ''">
            <!-- Enhanced Header with Alpine.js -->
            <header
                class="bg-white dark:bg-gray-800 shadow-soft sticky top-0 z-30 border-b border-gray-100 dark:border-gray-700">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <!-- Alpine.js Toggle Button -->
                        <button @click="sidebarOpen = !sidebarOpen" type="button"
                            class="p-2 mr-4 text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-300 dark:text-gray-400 dark:hover:bg-gray-700">
                            <span class="sr-only">Toggle sidebar</span>
                            <div class="w-6 flex flex-col gap-1.5">
                                <span
                                    class="h-0.5 w-6 bg-gray-600 dark:bg-gray-300 rounded-full transition-transform duration-300"
                                    x-bind:class="sidebarOpen ? 'rotate-45 translate-y-2' : ''"></span>
                                <span
                                    class="h-0.5 w-6 bg-gray-600 dark:bg-gray-300 rounded-full transition-opacity duration-300"
                                    x-bind:class="sidebarOpen ? 'opacity-0' : 'opacity-100'"></span>
                                <span
                                    class="h-0.5 w-6 bg-gray-600 dark:bg-gray-300 rounded-full transition-transform duration-300"
                                    x-bind:class="sidebarOpen ? '-rotate-45 -translate-y-2' : ''"></span>
                            </div>
                        </button>

                        <!-- Page title with subtle animation -->
                        <h1
                            class="text-xl font-bold text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                            @yield('header', 'Dashboard')
                        </h1>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Theme toggle with Alpine.js -->
                        <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                            class="p-2 text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                            <!-- Sun icon (light mode) -->
                            <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z">
                                </path>
                            </svg>
                            <!-- Moon icon (dark mode) -->
                            <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </button>



                        <!-- User Profile Dropdown with Alpine.js -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open" @click.outside="open = false"
                                class="flex items-center space-x-3 focus:outline-none" aria-expanded="false"
                                aria-haspopup="true">
                                <div
                                    class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-white shadow-md">
                                    <span class="font-semibold text-sm">A</span>
                                </div>
                                <div class="hidden md:flex flex-col items-start">
                                    <p class="text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ Auth::user()->nama_222320 }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email_222320 }}
                                    </p>
                                </div>
                                <!-- Dropdown arrow with animation -->
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-200"
                                    x-bind:class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <!-- Dropdown menu with Alpine.js transition -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg py-1 z-50 border border-gray-100 dark:border-gray-700">

                                <div class="border-t border-gray-100 dark:border-gray-700 my-1"></div>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <div class="flex items-center">
                                        <iconify-icon icon="heroicons:arrow-right-on-rectangle"
                                            class="mr-2"></iconify-icon>
                                        Sign out
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content with better spacing -->
            <main class="px-6 py-6 flex-grow">
                <div
                    class="rounded-xl shadow-soft bg-card dark:bg-gray-800 p-6 transition-all duration-300 dark:text-white shadow-hover">
                    @yield('content')
                </div>
            </main>

            <!-- Enhanced Footer -->
            <footer
                class="px-6 py-6 mt-auto bg-white dark:bg-gray-800 shadow-soft border-t border-gray-100 dark:border-gray-700">
                <div class="container mx-auto">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <p class="text-sm text-gray-600 dark:text-gray-400">&copy; 2025 ReservasiHotel. All rights
                                reserved.</p>
                        </div>
                        <div class="flex space-x-6">
                            <a href="#"
                                class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors">
                                <iconify-icon icon="mdi:facebook" width="20"></iconify-icon>
                            </a>
                            <a href="#"
                                class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors">
                                <iconify-icon icon="mdi:twitter" width="20"></iconify-icon>
                            </a>
                            <a href="#"
                                class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors">
                                <iconify-icon icon="mdi:instagram" width="20"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @yield('scripts')
    <script src="{{ asset('js/handleModalProduct.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- Alpine.js Initialization -->
    <script>
        // Check screen size for responsive sidebar
        document.addEventListener('DOMContentLoaded', () => {
            Alpine.start();
        });
    </script>
</body>

</html>
