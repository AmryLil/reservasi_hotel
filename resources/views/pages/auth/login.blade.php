<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Azure Horizon Resort</title>
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

        <!-- Login Container -->
        <div class="relative w-full max-w-md">
            <!-- Hotel Logo/Brand -->
           
            <!-- Login Form Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-blue-100">
                <!-- Decorative Header -->
                <div class="relative h-24 bg-blue-600 overflow-hidden">
                    <div class="absolute inset-0 opacity-30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-full" viewBox="0 0 1440 320">
                            <path fill="#FFFFFF" fill-opacity="1" d="M0,224L48,213.3C96,203,192,181,288,154.7C384,128,480,96,576,90.7C672,85,768,107,864,133.3C960,160,1056,192,1152,186.7C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="absolute w-full h-full flex items-center justify-center">
                        <h1 class="font-bold text-2xl text-white">RESERVASI HOTEL</h1>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <!-- Title -->
                    <h2 class="text-center text-2xl font-bold text-blue-800 mb-2">Enter Your Account</h2>
                    <p class="font-light text-center mb-6 text-blue-600">Access your reservations and special offers</p>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-5 text-red-500 text-sm bg-red-50 p-3 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input
                                    class="w-full border bg-blue-50 border-blue-200 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm"
                                    type="text" name="email" placeholder="Email Address" required />
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input
                                    class="w-full border bg-blue-50 border-blue-200 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm"
                                    type="password" name="password" placeholder="Password" required />
                            </div>
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-blue-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-blue-700">Remember me</label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Forgot password?</a>
                            </div>
                        </div>
                        
                        <button
                            type="submit"
                            class="w-full bg-blue-600 rounded-lg text-white py-3 hover:bg-blue-700 transition duration-300 font-semibold shadow-md mt-4">
                            Sign in
                        </button>
                    </form>

                    <!-- Signup Link -->
                    <div class="mt-6 text-center text-sm text-blue-600">
                        Don't have an account? 
                        <a href="{{ route('signup') }}" class="text-blue-800 font-semibold hover:underline">Create Account</a>
                    </div>
                    
                    <!-- Divider -->
                    <div class="flex items-center my-6">
                        <div class="flex-grow border-t border-blue-200"></div>
                        <span class="px-2 text-sm text-blue-500">or continue with</span>
                        <div class="flex-grow border-t border-blue-200"></div>
                    </div>
                    
                    <!-- Social Login -->
                    <div class="flex justify-center space-x-4">
                        <button class="flex items-center justify-center p-2 rounded-full border border-blue-200 bg-white hover:bg-blue-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96C18.34 21.21 22 17.06 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                            </svg>
                        </button>
                        <button class="flex items-center justify-center p-2 rounded-full border border-blue-200 bg-white hover:bg-blue-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
      
        </div>
    </div>
</body>

</html>