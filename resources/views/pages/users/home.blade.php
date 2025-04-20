@extends('layouts.app')

@section('title', 'Ocean Blue Resort')

@section('content')
<!-- Hero Banner Section -->
<section class="relative h-full ">
  <div class="h-[500px] w-full overflow-hidden bg-blue-50">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent z-10"></div>
    <img src="{{ asset('images/hotel.jpg') }}" alt="Luxury Hotel View" class="w-full h-full  object-cover ">
    <div class="absolute inset-0 flex items-center z-20">
      <div class="container mx-auto px-6">
        <div class="max-w-lg">
          <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight">Rasakan Kemewahan & Kenyamanan</h1>
          <p class="mt-4 text-blue-100 text-lg">Pesan liburan sempurna Anda di Ocean Blue Resort</p>
          <button class="mt-8 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-md transition duration-300">
            Booking Sekarang
          </button>
        </div>
        
      </div>
    </div>
  </div>
</section>



<!-- Featured Rooms Section -->
<section class="py-12">
  <div class="container mx-auto px-6">
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold text-blue-900">Kamar Kami</h2>
      <p class="text-blue-600 mt-2">Akomodasi nyaman untuk setiap kebutuhan Anda</p>
    </div>
    
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Kamar 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
        <img src="https://img.freepik.com/free-photo/room-interior-hotel-bedroom_23-2150683421.jpg?t=st=1745150781~exp=1745154381~hmac=8740b252f8fb0d69af71f4b66fc6be9273832757f88e39d8a416a702065c4644&w=1800" alt="Kamar Deluxe" class="w-full h-56 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-blue-900">Deluxe Pemandangan Laut</h3>
          <div class="flex text-blue-500 mt-1">
            ★★★★★
          </div>
          <p class="text-gray-600 mt-2">Kamar luas dengan pemandangan laut yang menakjubkan dan fasilitas premium.</p>
          <p class="text-blue-700 font-bold text-lg mt-4">Mulai dari Rp 2.000.000/malam</p>
          <button class="mt-4 w-full bg-blue-700 hover:bg-blue-800 text-white py-2 rounded transition duration-300">
            Lihat Detail
          </button>
        </div>
      </div>
    
      <!-- Kamar 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
        <img src="https://img.freepik.com/free-photo/cozy-studio-apartment-with-bedroom-living-space_1262-12323.jpg?t=st=1745150887~exp=1745154487~hmac=82cc13f5bfe303248368267f3999373468a9315e81d919b5b6839cc64320bd2d&w=1380" alt="Suite Eksekutif" class="w-full h-56 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-blue-900">Suite Eksekutif</h3>
          <div class="flex text-blue-500 mt-1">
            ★★★★★
          </div>
          <p class="text-gray-600 mt-2">Suite mewah dengan ruang tamu terpisah dan fasilitas lengkap.</p>
          <p class="text-blue-700 font-bold text-lg mt-4">Mulai dari Rp 1.500.000/malam</p>
          <button class="mt-4 w-full bg-blue-700 hover:bg-blue-800 text-white py-2 rounded transition duration-300">
            Lihat Detail
          </button>
        </div>
      </div>
    
      <!-- Kamar 3 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
        <img src="https://img.freepik.com/free-photo/full-shot-parents-kid-bed_23-2148974449.jpg?t=st=1745151006~exp=1745154606~hmac=a09f4b759b7e4b25d5536ed0410e1cd4b91321d52be90132794605a24c8ef66f&w=1380" alt="Kamar Keluarga" class="w-full h-56 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-blue-900">Kamar Keluarga</h3>
          <div class="flex text-blue-500 mt-1">
            ★★★★☆
          </div>
          <p class="text-gray-600 mt-2">Akomodasi luas yang sempurna untuk keluarga dengan anak-anak.</p>
          <p class="text-blue-700 font-bold text-lg mt-4">Mulai dari Rp 2.750.000/malam</p>
          <button class="mt-4 w-full bg-blue-700 hover:bg-blue-800 text-white py-2 rounded transition duration-300">
            Lihat Detail
          </button>
        </div>
      </div>
    </div>
    
  </div>
</section>

<!-- Amenities Section -->
<section class="py-12 bg-blue-50">
  <div class="container mx-auto px-6">
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold text-blue-900">Fasilitas Hotel</h2>
      <p class="text-blue-600 mt-2">Segala yang Anda butuhkan untuk pengalaman menginap yang sempurna</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Fasilitas 1 -->
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <div class="bg-blue-100 h-16 w-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <!-- Ikon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
          </svg>
        </div>
        <h3 class="font-bold text-lg text-blue-900 mb-2">Kolam Renang</h3>
        <p class="text-gray-600">Nikmati kolam renang outdoor infinity dengan pemandangan laut</p>
      </div>

      <!-- Fasilitas 2 -->
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <div class="bg-blue-100 h-16 w-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <!-- Ikon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
          </svg>
        </div>
        <h3 class="font-bold text-lg text-blue-900 mb-2">Restoran Mewah</h3>
        <p class="text-gray-600">Nikmati hidangan lezat di restoran kami yang eksklusif</p>
      </div>

      <!-- Fasilitas 3 -->
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <div class="bg-blue-100 h-16 w-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <!-- Ikon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
          </svg>
        </div>
        <h3 class="font-bold text-lg text-blue-900 mb-2">Spa & Kesehatan</h3>
        <p class="text-gray-600">Rileks dan pulihkan diri dengan perawatan spa premium kami</p>
      </div>

      <!-- Fasilitas 4 -->
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <div class="bg-blue-100 h-16 w-16 rounded-full flex items-center justify-center mx-auto mb-4">
          <!-- Ikon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
          </svg>
        </div>
        <h3 class="font-bold text-lg text-blue-900 mb-2">WiFi Gratis</h3>
        <p class="text-gray-600">Akses internet cepat tersedia di seluruh area hotel</p>
      </div>
    </div>
  </div>
</section>


<!-- Special Offer Section -->
<section class="py-12">
  <div class="container mx-auto px-6 h-96 ">
    <div class="bg-blue-800 rounded-lg shadow-xl overflow-hidden">
      <div class="md:flex justify-center items-center">
        <div class="md:w-1/2">
          <img src="https://img.freepik.com/free-photo/hotel-receptionist-work_23-2149661556.jpg?t=st=1745151085~exp=1745154685~hmac=c8e95fb538e8ca2f19a0453a4ec96562674f5c2fce26f59fb1e3fb8ac9a8b8fa&w=740" alt="Special Offer" class="w-full h-[410px] object-cover">
        </div>
        <div class="md:w-1/2 p-8 md:p-12 flex items-center">
          <div>
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold mb-4">Waktu Terbatas</span>
            <h2 class="text-3xl font-bold text-white mb-4">Paket Layanan Spesial Hotel</h2>
            <p class="text-blue-100 mb-6">Nikmati pelayanan eksklusif kami dengan menginap minimal 3 malam:</p>
            <ul class="text-blue-100 space-y-2 mb-8">
              <li class="flex items-center">
                <svg class="h-5 w-5 mr-2 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Sarapan gratis untuk 2 orang setiap hari
              </li>
              <li class="flex items-center">
                <svg class="h-5 w-5 mr-2 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Kredit layanan spa senilai Rp750.000
              </li>
              <li class="flex items-center">
                <svg class="h-5 w-5 mr-2 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Layanan checkout lambat hingga pukul 14.00 WITA
              </li>
            </ul>
            <button class="bg-white hover:bg-blue-100 text-blue-800 font-bold py-3 px-6 rounded-md transition duration-300">
              Pesan Sekarang
            </button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="py-12 bg-blue-50">
  <div class="container mx-auto px-6">
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold text-blue-900">Ulasan Tamu</h2>
      <p class="text-blue-600 mt-2">Apa kata para tamu tentang pengalaman menginap mereka</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Testimoni 1 -->
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex text-blue-500 mb-4">★★★★★</div>
        <p class="text-gray-600 italic mb-4">"Kamarnya sangat nyaman dan pemandangan lautnya luar biasa. Staf sangat membantu dan membuat pengalaman menginap kami sempurna."</p>
        <div class="flex items-center">
          <div class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center mr-3">
            <span class="text-blue-700 font-bold">JD</span>
          </div>
          <div>
            <p class="font-semibold text-blue-900">John Doe</p>
            <p class="text-sm text-gray-500">New York, Amerika Serikat</p>
          </div>
        </div>
      </div>
      
      <!-- Testimoni 2 -->
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex text-blue-500 mb-4">★★★★★</div>
        <p class="text-gray-600 italic mb-4">"Semua mulai dari makanan hingga layanan spa sangat luar biasa. Saya pasti akan kembali menginap lagi!"</p>
        <div class="flex items-center">
          <div class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center mr-3">
            <span class="text-blue-700 font-bold">JS</span>
          </div>
          <div>
            <p class="font-semibold text-blue-900">Jane Smith</p>
            <p class="text-sm text-gray-500">London, Inggris</p>
          </div>
        </div>
      </div>
      
      <!-- Testimoni 3 -->
      <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex text-blue-500 mb-4">★★★★★</div>
        <p class="text-gray-600 italic mb-4">"Tempat liburan yang sempurna! Lokasinya tenang, kamar-kamarnya indah, dan kolam infinity-nya luar biasa. Kami akan kembali musim panas mendatang!"</p>
        <div class="flex items-center">
          <div class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center mr-3">
            <span class="text-blue-700 font-bold">RJ</span>
          </div>
          <div>
            <p class="font-semibold text-blue-900">Robert Johnson</p>
            <p class="text-sm text-gray-500">Sydney, Australia</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Call to Action -->
<section class="py-12 bg-blue-900">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-white mb-4">Siap untuk Penginapan Tak Terlupakan?</h2>
    <p class="text-blue-100 mb-8 max-w-2xl mx-auto">Pesan kamar Anda hari ini dan rasakan perpaduan sempurna antara kemewahan, kenyamanan, dan pelayanan istimewa.</p>
    <button class="bg-white hover:bg-blue-100 text-blue-800 font-bold py-3 px-8 rounded-md transition duration-300">
      Pesan Sekarang
    </button>
  </div>
</section>


<!-- Back to Top Button -->
<button id="scrollToTopButton" class="fixed bottom-8 right-8 bg-blue-700 text-white p-3 rounded-full shadow-lg cursor-pointer hidden hover:bg-blue-800 transition duration-300">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
  </svg>
</button>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const scrollToTopButton = document.getElementById("scrollToTopButton");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            scrollToTopButton.classList.remove("hidden");
        } else {
            scrollToTopButton.classList.add("hidden");
        }
    });

    scrollToTopButton.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
});
</script>
@endsection