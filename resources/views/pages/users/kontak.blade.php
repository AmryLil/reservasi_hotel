@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
    <section class="relative bg-blue-50">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto py-12">
            <div class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1">
                <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                    <div class="w-full flex-col justify-center items-start gap-8 flex">
                        <div class="flex-col justify-start lg:items-start items-center gap-4 flex">
                            <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                                <h2 class="text-4xl font-bold font-manrope leading-normal lg:text-start text-center text-blue-800">
                                    Hubungi Kami
                                </h2>
                                <p class="text-blue-600 text-base font-normal leading-relaxed lg:text-start text-center">
                                    Kami menawarkan pengalaman menginap yang mewah dan nyaman di lokasi strategis.
                                    Hubungi tim reservasi kami untuk informasi lebih lanjut atau bantuan dalam merencanakan liburan Anda.
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex-col justify-center items-start gap-6 flex">
                            <div class="w-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-blue-200 hover:border-blue-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-blue-100">
                                    <h4 class="text-2xl font-bold font-manrope leading-9 text-blue-800">Telepon</h4>
                                    <p class="text-blue-600 text-base font-normal leading-relaxed">+62 123 4567 890</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-blue-200 hover:border-blue-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-blue-100">
                                    <h4 class="text-2xl font-bold font-manrope leading-9 text-blue-800">Email</h4>
                                    <p class="text-blue-600 text-base font-normal leading-relaxed">reservasi@azurehorizon.com</p>
                                </div>
                            </div>
                            <div class="w-full h-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full p-3.5 rounded-xl border border-blue-200 hover:border-blue-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-blue-100">
                                    <h4 class="text-2xl font-bold font-manrope leading-9 text-blue-800">Alamat</h4>
                                    <p class="text-blue-600 text-base font-normal leading-relaxed">Jl. Pantai Indah No. 123, Bali, Indonesia</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-blue-200 hover:border-blue-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-blue-100">
                                    <h4 class="text-2xl font-bold font-manrope leading-9 text-blue-800">Jam Operasional</h4>
                                    <p class="text-blue-600 text-base font-normal leading-relaxed">24/7, Layanan Pelanggan selalu siap membantu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full p-6 bg-white rounded-xl border border-blue-200 shadow-md">
                        <h3 class="text-2xl font-bold font-manrope mb-4 text-blue-800">Kirim Pesan</h3>
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-blue-700 mb-1">Nama Lengkap</label>
                                    <input type="text" id="name" class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="email" class="block text-blue-700 mb-1">Email</label>
                                    <input type="email" id="email" class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                            <div>
                                <label for="subject" class="block text-blue-700 mb-1">Subjek</label>
                                <input type="text" id="subject" class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="message" class="block text-blue-700 mb-1">Pesan</label>
                                <textarea id="message" rows="4" class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-300">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
                
                <div class="w-full lg:justify-start justify-center items-start flex">
                    <div class="sm:w-[564px] w-full sm:h-[946px] h-full sm:border border-blue-200 rounded-xl overflow-hidden shadow-lg relative">
                        <img class="w-full h-full object-cover"
                            src="https://img.freepik.com/free-photo/young-attractive-couple-relaxing-by-swimming-pool-tropical-garden_1258-52402.jpg?t=st=1745163701~exp=1745167301~hmac=4f566a7789ef2850adb23c77576cd3a42d6a7db24cd9aff5b1d5273ec3ee7971&w=740"
                            alt="Azure Horizon Resort" />
                        <div class="absolute bottom-0 left-0 right-0 bg-blue-800 bg-opacity-80 text-white p-4">
                            <h3 class="text-xl font-bold mb-2">Resort Kami</h3>
                            <p class="text-sm">Pengalaman menginap mewah dengan pemandangan alam yang menakjubkan</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 w-full">
                <h3 class="text-2xl font-bold font-manrope mb-6 text-blue-800 text-center">Lokasi Kami</h3>
                <div class="w-full h-80 bg-blue-100 rounded-xl border border-blue-200 flex items-center justify-center">
                    <!-- Placeholder for map embed -->
                    <div class="text-blue-600 text-center">
                        <p class="text-lg font-medium">Peta Lokasi Hotel</p>
                        <p class="mt-2">Embed Google Maps atau peta interaktif di sini</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection