<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - RESERVASI HOTEL</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-blue-50">
    <div class="relative flex items-center w-full justify-center min-h-screen py-12 px-4">
        <!-- Background Decoration -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-72 bg-blue-600 -skew-y-6 transform origin-top-right"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-blue-300 rounded-full opacity-20 -mr-20 -mb-20"></div>
            <div class="absolute top-1/4 left-10 w-32 h-32 bg-blue-200 rounded-full opacity-40"></div>
        </div>

        <!-- Register Container -->
        <div class="relative w-full max-w-md">
            <!-- Login Form Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-blue-100">
                <!-- Decorative Header -->
                <div class="relative h-24 bg-blue-600 overflow-hidden">
                    <div class="absolute inset-0 opacity-30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-full" viewBox="0 0 1440 320">
                            <path fill="#FFFFFF" fill-opacity="1"
                                d="M0,224L48,213.3C96,203,192,181,288,154.7C384,128,480,96,576,90.7C672,85,768,107,864,133.3C960,160,1056,192,1152,186.7C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                            </path>
                        </svg>
                    </div>
                    <div class="absolute w-full h-full flex items-center justify-center">
                        <h1 class="font-bold text-2xl text-white">RESERVASI HOTEL</h1>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <!-- Title -->
                    <h2 class="text-center text-2xl font-bold text-blue-800 mb-2">Create Your Account</h2>
                    <p class="font-light text-center mb-6 text-blue-600">Access your reservations and special offers</p>

                    <!-- Error Messages -->
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
                        <!-- Required Fields -->
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
                                    type="text" name="nama_222320" placeholder="Full Name" required />
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
                                    type="email" name="email_222320" placeholder="Email Address" required />
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
                                    type="password" name="password_222320" placeholder="Password" required />
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
                                    type="password" name="password_222320_confirmation" placeholder="Confirm Password"
                                    required />
                            </div>
                        </div>

                        <!-- Toggle for Additional Details -->
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

                        <!-- Optional Fields (Hidden by Default) -->
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
                                    type="text" name="phone_222320" placeholder="Phone Number" />
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
                                    name="alamat_222320" placeholder="Address" rows="2"></textarea>
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-medium text-blue-700 mb-1 ml-1">Gender</label>
                                <div class="flex space-x-4 ml-1">
                                    <label class="flex items-center">
                                        <input type="radio" name="gender_222320" value="male"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500" />
                                        <span class="ml-2 text-sm text-gray-700">Male</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="gender_222320" value="female"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500" />
                                        <span class="ml-2 text-sm text-gray-700">Female</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 rounded-lg text-white py-3 hover:bg-blue-700 transition duration-300 font-semibold shadow-md mt-6">
                            Sign Up
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-6 text-center text-sm text-blue-600">
                        You have an account?
                        <a href="{{ route('login.form') }}"
                            class="text-blue-800 font-semibold hover:underline">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Toggle Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleDetails');
            const detailsSection = document.getElementById('additionalDetails');

            toggleButton.addEventListener('click', function() {
                // Toggle visibility
                detailsSection.classList.toggle('hidden');

                // Change button text and icon
                const isVisible = !detailsSection.classList.contains('hidden');
                toggleButton.innerHTML = isVisible ?
                    '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg> Sembunyikan Detail Tambahan' :
                    '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg> Tampilkan Detail Tambahan';
            });
        });
    </script>
</body>

</html>
