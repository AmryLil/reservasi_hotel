@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <section class="relative bg-blue-50 py-16">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1">
                <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                    <div class="w-full flex-col justify-center items-start gap-8 flex">
                        <div class="flex-col justify-start lg:items-start items-center gap-4 flex">
                            <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                                <h2 class="text-4xl font-bold font-manrope leading-normal lg:text-start text-center text-blue-800">
                                    Selamat Datang di Azure Horizon Resort
                                </h2>
                                <p class="text-blue-600 text-base font-normal leading-relaxed lg:text-start text-center">
                                    Azure Horizon Resort adalah destinasi penginapan mewah yang didedikasikan untuk memberikan pengalaman 
                                    menginap tak terlupakan di tengah keindahan alam yang menakjubkan. Kami berkomitmen untuk menyediakan 
                                    layanan bintang lima dengan sentuhan keramahan Indonesia yang hangat.
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex-col justify-center items-start gap-6 flex">
                            <div class="w-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-blue-200 hover:border-blue-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-blue-100">
                                    <h4 class="text-2xl font-bold font-manrope leading-9 text-blue-800">150+ Kamar Mewah</h4>
                                    <p class="text-blue-600 text-base font-normal leading-relaxed">Akomodasi eksklusif dengan pemandangan laut yang spektakuler</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-blue-200 hover:border-blue-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-blue-100">
                                    <h4 class="text-2xl font-bold font-manrope leading-9 text-blue-800">Fasilitas Premium</h4>
                                    <p class="text-blue-600 text-base font-normal leading-relaxed">Spa, kolam renang infinity, restoran bintang 5, dan beach club</p>
                                </div>
                            </div>
                            <div class="w-full h-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full p-3.5 rounded-xl border border-blue-200 hover:border-blue-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-blue-100">
                                    <h4 class="text-2xl font-bold font-manrope leading-9 text-blue-800">15+ Tahun Pengalaman</h4>
                                    <p class="text-blue-600 text-base font-normal leading-relaxed">Melayani tamu dari seluruh dunia dengan standar internasional</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-blue-200 hover:border-blue-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-blue-100">
                                    <h4 class="text-2xl font-bold font-manrope leading-9 text-blue-800">98% Kepuasan Tamu</h4>
                                    <p class="text-blue-600 text-base font-normal leading-relaxed">Berdasarkan ulasan tamu dan penghargaan industri perhotelan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:justify-start justify-center items-start flex">
                    <div class="sm:w-[564px] w-full sm:h-[646px] h-full sm:border border-blue-200 rounded-xl overflow-hidden shadow-lg relative">
                        <img class="w-full h-full object-cover"
                            src="https://img.freepik.com/free-photo/beautiful-tropical-beach-sea-with-chair-blue-sky_74190-7488.jpg?w=740"
                            alt="Azure Horizon Resort View" />
                    </div>
                </div>
            </div>
            
            <!-- Vision & Mission Section -->
            <div class="mt-16 grid md:grid-cols-2 grid-cols-1 gap-8">
                <div class="bg-white p-8 rounded-xl border border-blue-200 shadow-md">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-800 mb-4">Visi Kami</h3>
                    <p class="text-blue-600">
                        Menjadi resor terdepan di Indonesia yang dikenal dengan keunggulan layanan, fasilitas berkelas dunia, 
                        dan pengalaman menginap yang melebihi ekspektasi setiap tamu. Kami beraspirasi untuk menciptakan kenangan 
                        tak terlupakan yang membuat tamu ingin kembali lagi dan lagi.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-xl border border-blue-200 shadow-md">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-800 mb-4">Misi Kami</h3>
                    <p class="text-blue-600">
                        Kami berkomitmen untuk:
                    </p>
                    <ul class="text-blue-600 mt-2 space-y-2 list-disc pl-5">
                        <li>Memberikan layanan hospitality terbaik dengan kualitas tanpa kompromi</li>
                        <li>Menciptakan lingkungan yang menyatu dengan alam sekitar</li>
                        <li>Mempromosikan pariwisata berkelanjutan dan mendukung komunitas lokal</li>
                        <li>Terus berinovasi dalam layanan dan fasilitas untuk memenuhi kebutuhan tamu</li>
                    </ul>
                </div>
            </div>
            
            <!-- Our Story Section -->
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-blue-800 text-center mb-8">Perjalanan Kami</h2>
                <div class="bg-white p-8 rounded-xl border border-blue-200 shadow-md">
                    <div class="prose max-w-none text-blue-600">
                        <p>
                            Azure Horizon Resort didirikan pada tahun 2008 oleh keluarga Wijaya dengan visi menciptakan 
                            destinasi penginapan mewah yang menyatu dengan keindahan alam Indonesia. Bermula dari sebuah 
                            villa kecil dengan 25 kamar, properti kami telah berkembang menjadi resor mewah bintang lima 
                            yang dikenal di seluruh dunia.
                        </p>
                        <p class="mt-4">
                            Selama lebih dari 15 tahun beroperasi, kami terus berkomitmen untuk menyempurnakan setiap aspek 
                            pengalaman tamu. Dari melakukan renovasi besar-besaran pada tahun 2015 yang menambahkan kolam renang 
                            infinity terbesar di pulau, hingga membangun spa mewah pada tahun 2018 yang telah memenangkan 
                            penghargaan internasional.
                        </p>
                        <p class="mt-4">
                            Azure Horizon Resort juga menjadi pionir dalam praktik pariwisata berkelanjutan, dengan inisiatif 
                            ramah lingkungan seperti penggunaan panel surya, sistem pengolahan air limbah canggih, dan program 
                            konservasi terumbu karang di perairan sekitar resor.
                        </p>
                        <p class="mt-4">
                            Hari ini, kami bangga memiliki tim profesional beranggotakan 350 staf yang berdedikasi tinggi untuk 
                            memberikan pengalaman menginap luar biasa bagi setiap tamu yang datang ke Azure Horizon Resort.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Team Section -->
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-blue-800 text-center mb-8">Tim Manajemen</h2>
                <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
                    <!-- Team Member 1 -->
                    <div class="bg-white rounded-xl border border-blue-200 shadow-md overflow-hidden">
                        <div class="h-64 bg-blue-200">
                            <!-- Placeholder for team member photo -->
                            <div class="w-full h-full flex items-center justify-center bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-blue-800">Budi Wijaya</h3>
                            <p class="text-blue-600 font-medium">CEO & Founder</p>
                            <p class="mt-2 text-blue-500 text-sm">
                                Memiliki lebih dari 25 tahun pengalaman dalam industri perhotelan dan pariwisata mewah.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Team Member 2 -->
                    <div class="bg-white rounded-xl border border-blue-200 shadow-md overflow-hidden">
                        <div class="h-64 bg-blue-200">
                            <!-- Placeholder for team member photo -->
                            <div class="w-full h-full flex items-center justify-center bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-blue-800">Sarah Tandjung</h3>
                            <p class="text-blue-600 font-medium">Operations Director</p>
                            <p class="mt-2 text-blue-500 text-sm">
                                Ahli dalam manajemen operasional resor mewah dengan latar belakang pendidikan dari Switzerland.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Team Member 3 -->
                    <div class="bg-white rounded-xl border border-blue-200 shadow-md overflow-hidden">
                        <div class="h-64 bg-blue-200">
                            <!-- Placeholder for team member photo -->
                            <div class="w-full h-full flex items-center justify-center bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-blue-800">Chef Andre Wibowo</h3>
                            <p class="text-blue-600 font-medium">Executive Chef</p>
                            <p class="mt-2 text-blue-500 text-sm">
                                Chef berpengalaman internasional yang membawa sentuhan kuliner kelas dunia ke seluruh restoran kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Awards Section -->
            <div class="mt-16 bg-white p-8 rounded-xl border border-blue-200 shadow-md">
                <h2 class="text-3xl font-bold text-blue-800 text-center mb-8">Penghargaan & Sertifikasi</h2>
                <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6 text-center">
                    <div class="p-4">
                        <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-blue-800">World Luxury Hotel Awards</h3>
                        <p class="text-blue-500 text-sm">2022, 2023</p>
                    </div>
                    <div class="p-4">
                        <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-blue-800">Five-Star Rating</h3>
                        <p class="text-blue-500 text-sm">Forbes Travel Guide</p>
                    </div>
                    <div class="p-4">
                        <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-blue-800">Spa Excellence</h3>
                        <p class="text-blue-500 text-sm">World Spa Awards</p>
                    </div>
                    <div class="p-4">
                        <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-blue-800">Green Globe</h3>
                        <p class="text-blue-500 text-sm">Sertifikasi Berkelanjutan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection