<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - RESERVASI HOTEL</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-blue-50">
    <div class="flex items-center justify-center min-h-screen py-8 px-4">
        <!-- Wadah Registrasi -->
        <div class="w-full max-w-md">
            <!-- Kartu Form Registrasi -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-blue-100">
                <!-- Header -->
                <div class="bg-blue-600 p-4 text-center">
                    <h1 class="font-bold text-xl text-white">RESERVASI HOTEL</h1>
                </div>

                <!-- Konten Form -->
                <div class="p-6">
                    <!-- Judul -->
                    <h2 class="text-center text-xl font-bold text-blue-800 mb-2">Buat Akun Anda</h2>
                    <p class="text-center mb-6 text-blue-600 text-sm">Akses reservasi dan penawaran khusus Anda</p>

                    <!-- Pesan Error -->
                    @if ($errors->any())
                        <div class="mb-5 text-red-500 text-sm bg-red-50 p-3 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('signup') }}" method="POST" class="space-y-4">
                        @csrf
                        <!-- Kolom Wajib -->
                        <div class="flex flex-col space-y-4">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input
                                    class="w-full border bg-blue-50 border-blue-200 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm"
                                    type="text" name="nama_222320" placeholder="Nama Lengkap" required />
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input
                                    class="w-full border bg-blue-50 border-blue-200 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm"
                                    type="email" name="email_222320" placeholder="Alamat Email" required />
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input
                                    class="w-full border bg-blue-50 border-blue-200 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm"
                                    type="password" name="password_222320" placeholder="Kata Sandi" required />
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input
                                    class="w-full border bg-blue-50 border-blue-200 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm"
                                    type="password" name="password_222320_confirmation"
                                    placeholder="Konfirmasi Kata Sandi" required />
                            </div>
                        </div>

                        <!-- Toggle untuk Detail Tambahan -->
                        <div class="mt-2">
                            <button type="button" id="toggleDetails"
                                class="text-blue-600 text-sm font-semibold flex items-center hover:text-blue-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                                Tampilkan Detail Tambahan
                            </button>
                        </div>

                        <!-- Kolom Opsional (Disembunyikan secara Default) -->
                        <div id="additionalDetails" class="hidden space-y-4 pt-2 border-t border-blue-100 mt-2">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input
                                    class="w-full border bg-blue-50 border-blue-200 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm"
                                    type="text" name="phone_222320" placeholder="Nomor Telepon" />
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <textarea
                                    class="w-full border bg-blue-50 border-blue-200 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm"
                                    name="alamat_222320" placeholder="Alamat" rows="2"></textarea>
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-medium text-blue-700 mb-1 ml-1">Jenis Kelamin</label>
                                <div class="flex space-x-4 ml-1">
                                    <label class="flex items-center">
                                        <input type="radio" name="gender_222320" value="male"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500" />
                                        <span class="ml-2 text-sm text-gray-700">Laki-laki</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="gender_222320" value="female"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500" />
                                        <span class="ml-2 text-sm text-gray-700">Perempuan</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 rounded-lg text-white py-3 hover:bg-blue-700 transition duration-300 font-semibold shadow-md mt-6">
                            Daftar
                        </button>
                    </form>

                    <!-- Link Login -->
                    <div class="mt-6 text-center text-sm text-blue-600">
                        Sudah memiliki akun?
                        <a href="{{ route('login.form') }}"
                            class="text-blue-800 font-semibold hover:underline">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Fungsi Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleDetails');
            const detailsSection = document.getElementById('additionalDetails');

            toggleButton.addEventListener('click', function() {
                // Toggle visibilitas
                detailsSection.classList.toggle('hidden');

                // Ubah teks dan ikon tombol
                const isVisible = !detailsSection.classList.contains('hidden');
                toggleButton.innerHTML = isVisible ?
                    '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg> Sembunyikan Detail Tambahan' :
                    '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg> Tampilkan Detail Tambahan';
            });
        });
    </script>
</body>

</html>
