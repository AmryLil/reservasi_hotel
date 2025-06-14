<header
    class="flex top-0 justify-between items-center py-3 px-6 md:px-12 lg:px-24 bg-white z-50 w-full fixed font-jost shadow-md border-b border-gray-100">
    {{-- logo with blue accent --}}
    <div class="flex items-center space-x-2">
        <div class="text-2xl font-bold">
            <span class="text-blue-600">RESERVASI</span><span class="text-gray-800">HOTEL</span>
        </div>
    </div>

    {{-- menu - redesigned as horizontal tabs with indicators --}}
    <nav class="hidden md:flex items-center">
        <div class="flex space-x-1">
            <a href="/"
                class="relative group px-4 py-2 {{ Request::is('/') ? 'text-blue-600 font-medium' : 'text-gray-700' }}">
                Beranda
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform {{ Request::is('/') ? 'scale-x-100' : '' }}"></span>
            </a>

            <a href="{{ route('user.rooms.index') }}"
                class="relative group px-4 py-2 {{ Request::is('rooms') ? 'text-blue-600 font-medium' : 'text-gray-700' }}">
                Kamar
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform {{ Request::is('shop') ? 'scale-x-100' : '' }}"></span>
            </a>

            <a href="{{ route('gallery.index') }}"
                class="relative group px-4 py-2 {{ Request::is('gallery.index') ? 'text-blue-600 font-medium' : 'text-gray-700' }}">
                Gallery
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform {{ Request::is('gallery.index') ? 'scale-x-100' : '' }}"></span>
            </a>

            <a href="#"
                class="relative group px-4 py-2 {{ Request::is('about') ? 'text-blue-600 font-medium' : 'text-gray-700' }}">
                Tentang Kami
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform {{ Request::is('about') ? 'scale-x-100' : '' }}"></span>
            </a>

            <a href="#"
                class="relative group px-4 py-2 {{ Request::is('contact-us') ? 'text-blue-600 font-medium' : 'text-gray-700' }}">
                Kontak
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform {{ Request::is('contact-us') ? 'scale-x-100' : '' }}"></span>
            </a>
        </div>
    </nav>

    {{-- right section with search and auth --}}
    <div class="flex items-center space-x-4">

        @if (Auth::check())
            {{-- user profile menu --}}
            <div class="drawer drawer-end z-50">
                <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    <label for="my-drawer-4" class="drawer-button">
                        <div
                            class="flex items-center cursor-pointer space-x-2 border border-gray-200 rounded-full pr-3 pl-1 py-1 hover:bg-gray-50 transition-colors">
                            <div
                                class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-medium overflow-hidden">
                                @if (Auth::user()->profile_photo)
                                    <img alt="User Avatar" class="h-full w-full object-cover"
                                        src="{{ asset('storage/' . Auth::user()->profile_photo) }}" />
                                @else
                                    <span>{{ strtoupper(substr(session('name'), 0, 1)) .
                                        (str_word_count(session('name')) > 1 ? strtoupper(substr(explode(' ', session('name'))[1], 0, 1)) : '') }}</span>
                                @endif
                            </div>
                            <span
                                class="text-sm font-medium text-gray-700 hidden sm:inline">{{ session('name') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </label>
                </div>

                <div class="drawer-side">
                    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
                    <div class="min-h-full w-80 sm:w-96 bg-white overflow-y-auto">
                        <!-- Sidebar header -->
                        <div class="p-6 bg-blue-600 text-white">
                            <div class="flex items-center space-x-4">
                                <div class="h-16 w-16 rounded-full bg-white p-1 flex items-center justify-center">
                                    @if (Auth::user()->profile_photo)
                                        <img class="w-full h-full rounded-full object-cover"
                                            src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Avatar">
                                    @else
                                        <div
                                            class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-white text-2xl font-bold">
                                            {{ strtoupper(substr(session('name'), 0, 1)) .
                                                (str_word_count(session('name')) > 1 ? strtoupper(substr(explode(' ', session('name'))[1], 0, 1)) : '') }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">{{ session('name') }}</h2>
                                    <p class="text-blue-200 text-sm">{{ session('email') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation menu -->
                        <nav class="p-4">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-4">Menu</p>



                            <a href="{{ route('reservasi.user') }}"
                                class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-100 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-medium text-gray-700">Reservasi Saya</span>
                            </a>

                            <div class="border-t border-gray-200 my-4"></div>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-50 w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span class="font-medium text-red-600">Logout</span>
                                </button>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        @else
            {{-- login and register --}}
            <div class="flex items-center space-x-3">
                <a href="/login"
                    class="text-gray-700 hover:text-blue-600 font-medium text-sm transition-colors">Login</a>
                <a href="/signup"
                    class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm font-medium shadow-sm transition-colors">
                    Register
                </a>
            </div>
        @endif

        {{-- mobile menu button --}}
        <button class="md:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</header>

{{-- mobile menu drawer (would need JavaScript to toggle) --}}
<div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 hidden" id="mobile-menu-overlay">
    <div
        class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-xl z-50 transform transition-transform duration-300">
        <div class="flex justify-between items-center p-4 border-b">
            <div class="text-xl font-bold">
                <span class="text-blue-600">RESERVASI</span><span class="text-gray-800">HOTEL</span>
            </div>
            <button class="p-2 rounded-full hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="p-4">
            <a href="/" class="block py-3 px-4 text-gray-700 border-b border-gray-100">Beranda</a>
            <a href="#" class="block py-3 px-4 text-gray-700 border-b border-gray-100">Kamar</a>
            <a href="#" class="block py-3 px-4 text-gray-700 border-b border-gray-100">Gallery</a>
            <a href="#" class="block py-3 px-4 text-gray-700 border-b border-gray-100">Tentang Kami</a>
            <a href="#" class="block py-3 px-4 text-gray-700 border-b border-gray-100">Kontak</a>
        </nav>
    </div>
</div>
