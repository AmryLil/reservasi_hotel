<div
    class="sidebar fixed top-0 left-0 h-full w-64 bg-gradient-to-b from-blue-800 to-blue-900 text-white shadow-xl z-40 font-jost">
    <!-- Logo Section -->
    <div class="px-6 py-8 border-b border-blue-700/50">
        <div class="text-2xl font-bold flex items-center">
            <span class="text-white">RESERVASI</span><span class="text-blue-300">HOTEL</span>
        </div>
    </div>

    <!-- Admin Info Section -->
    <div class="px-6 py-4 flex items-center border-b border-blue-700/50">
        <div class="h-10 w-10 rounded-full bg-blue-700 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium">Admin Panel</p>
            <p class="text-xs text-blue-300">Administrator</p>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="px-4 py-6">
        <p class="px-2 text-xs font-semibold text-blue-300 uppercase tracking-wider mb-4">Menu Utama</p>

        <!-- Kamar -->
        <a href="{{ route('admin.rooms.index') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-700/50 mb-1 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="font-medium">Kamar</span>
        </a>

        <!-- Tipe Kamar -->
        <a href="{{ route('admin.tiperoom.index') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-700/50 mb-1 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <span class="font-medium">Tipe Kamar</span>
        </a>

        <div class="border-t border-blue-700/50 my-6"></div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-700/50 mb-1 transition-colors w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-50" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="font-medium text-slate-50">Logout</span>
            </button>
        </form>
    </nav>

    <!-- Footer -->
    <div class="absolute bottom-0 left-0 w-full px-6 py-4 text-center text-xs text-blue-400">
        <p>© 2025 Hotel Reservation System</p>
    </div>
</div>
