<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Reservasi Hotel</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-blue-50">
    <div class="flex items-center justify-center min-h-screen py-8 px-4">
        <!-- Wadah Login -->
        <div class="w-full max-w-md">
            <!-- Kartu Form Login -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-blue-100">
                <!-- Header -->
                <div class="bg-blue-600 p-4 text-center">
                    <h1 class="font-bold text-xl text-white">RESERVASI HOTEL</h1>
                </div>

                <!-- Konten Form -->
                <div class="p-6">
                    <!-- Judul -->
                    <h2 class="text-center text-xl font-bold text-blue-800 mb-2">Masuk ke Akun Anda</h2>
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
                    <form action="{{ route('login') }}" method="POST" class="space-y-4">
                        @csrf
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
                                    type="text" name="email" placeholder="Alamat Email" required />
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
                                    type="password" name="password" placeholder="Kata Sandi" required />
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 rounded-lg text-white py-3 hover:bg-blue-700 transition duration-300 font-semibold shadow-md mt-4">
                            Masuk
                        </button>
                    </form>

                    <!-- Link Daftar -->
                    <div class="mt-6 text-center text-sm text-blue-600">
                        Belum memiliki akun?
                        <a href="{{ route('signup.form') }}" class="text-blue-800 font-semibold hover:underline">Buat
                            Akun</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
