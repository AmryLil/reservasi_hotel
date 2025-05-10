@extends('layouts.app')

@section('title', 'RESERVASI KAMAR')

@section('content')
    @extends('layouts.app')

@section('title', 'Detail Kamar')

@section('content')
    <section class="py-10 bg-blue-50">
        <div class="container mx-auto px-4">
            <!-- Breadcrumb -->


            <!-- Room Detail Card -->
            <div class="bg-white rounded-lg shadow-lg border border-blue-200 overflow-hidden">
                <!-- Room Images Gallery -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                    <div class="md:col-span-2 relative">
                        <span
                            class="absolute top-4 left-4 bg-blue-700 text-white text-sm font-bold px-3 py-1 rounded-md z-10">DELUXE</span>
                        <img src="{{ asset('images/room.jpg') }}" alt="Deluxe Room" class="w-full h-96 object-cover">
                    </div>
                    <div class="grid grid-cols-2 gap-1 p-1">
                        <img src="{{ asset('images/room.jpg') }}" alt="Room Image 1"
                            class="w-full h-48 object-cover rounded-sm">
                        <img src="{{ asset('images/room.jpg') }}" alt="Room Image 2"
                            class="w-full h-48 object-cover rounded-sm">
                        <img src="{{ asset('images/room.jpg') }}" alt="Room Image 3"
                            class="w-full h-48 object-cover rounded-sm">
                        <div class="relative">
                            <img src="{{ asset('images/room.jpg') }}" alt="Room Image 4"
                                class="w-full h-48 object-cover rounded-sm">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center rounded-sm">
                                <button
                                    class="text-white px-3 py-1 rounded-md border border-white hover:bg-white hover:text-blue-700 transition">
                                    +12 Foto Lainnya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room Details -->
                <div class="p-6">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-bold text-blue-800">Deluxe Room</h1>
                            <div class="flex items-center mt-2">
                                <div class="flex text-yellow-400">⭐⭐⭐⭐☆</div>
                                <span class="ml-2 text-gray-600">(128 ulasan)</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold text-blue-700">Rp 850.000<span
                                    class="text-sm font-normal text-gray-500">/malam</span></div>
                            <button id="reservasi-btn" data-room-id="2"
                                class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out font-medium">
                                Reservasi Sekarang
                            </button>
                        </div>
                    </div>

                    <hr class="my-6 border-blue-100">

                    <!-- Room Capacity & Amenities -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <h2 class="text-xl font-semibold text-blue-800 mb-4">Tentang Kamar Ini</h2>
                            <p class="text-gray-700 mb-6">
                                Nikmati pengalaman menginap mewah di Kamar Deluxe kami. Dengan luas 32m², kamar ini
                                menawarkan pemandangan kota yang menakjubkan dan dilengkapi dengan furnitur modern yang
                                elegan. Tempat tidur king-size yang nyaman dengan seprai berkualitas tinggi menjamin tidur
                                yang nyenyak, sementara area kerja yang luas memudahkan Anda untuk tetap produktif selama
                                perjalanan bisnis.
                            </p>
                            <p class="text-gray-700 mb-6">
                                Kamar mandi marmer mewah dilengkapi dengan shower hujan dan perlengkapan mandi premium.
                                Nikmati akses ke lounge eksklusif dengan sarapan komplemen dan minuman sepanjang hari. Cocok
                                untuk pelancong bisnis maupun liburan yang mencari kenyamanan dan kemewahan.
                            </p>

                            <!-- Room Features -->
                            <h3 class="text-lg font-semibold text-blue-700 mb-3">Fitur Kamar</h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-y-3">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">AC</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">TV LED 42"</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">WiFi Gratis</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">Mini Bar</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">Brankas</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">Coffee Maker</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">Shower Air Panas</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">Jubah Mandi</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">Meja Kerja</span>
                                </div>
                            </div>
                        </div>

                        <!-- Room Quick Info -->
                        <div class="bg-blue-50 rounded-lg p-5 border border-blue-100">
                            <h3 class="text-lg font-semibold text-blue-800 mb-4">Informasi Kamar</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mt-0.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <div class="ml-3">
                                        <h4 class="font-medium text-blue-700">Ukuran Kamar</h4>
                                        <p class="text-gray-600">32 m²</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mt-0.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4" />
                                    </svg>
                                    <div class="ml-3">
                                        <h4 class="font-medium text-blue-700">Tipe Tempat Tidur</h4>
                                        <p class="text-gray-600">1 King Size</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mt-0.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <div class="ml-3">
                                        <h4 class="font-medium text-blue-700">Kapasitas</h4>
                                        <p class="text-gray-600">2 orang (Maks. 3 dengan ekstra bed)</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mt-0.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <div class="ml-3">
                                        <h4 class="font-medium text-blue-700">Pemandangan</h4>
                                        <p class="text-gray-600">Pemandangan Kota</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6 border-blue-100">

                    <!-- Policies -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-blue-800 mb-4">Kebijakan Kamar</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-medium text-blue-700 mb-2">Check-in / Check-out</h4>
                                <ul class="list-disc list-inside text-gray-700 space-y-1">
                                    <li>Check-in: 14:00 - 23:00</li>
                                    <li>Check-out: sebelum 12:00</li>
                                    <li>Early check-in tersedia (tergantung ketersediaan)</li>
                                    <li>Late check-out tersedia dengan biaya tambahan</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-medium text-blue-700 mb-2">Kebijakan Pembatalan</h4>
                                <ul class="list-disc list-inside text-gray-700 space-y-1">
                                    <li>Pembatalan gratis hingga 3 hari sebelum check-in</li>
                                    <li>Pembatalan kurang dari 3 hari: biaya 1 malam</li>
                                    <li>No-show: biaya penuh</li>
                                    <li>Perubahan tanggal tergantung ketersediaan</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div x-data="{ showModal: false, step: 1, totalPrice: 850000, nights: 1, roomName: 'Deluxe Room', checkInDate: '', checkOutDate: '' }" x-init="() => {
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                checkInDate = tomorrow.toISOString().split('T')[0];
            
                const dayAfter = new Date();
                dayAfter.setDate(dayAfter.getDate() + 2);
                checkOutDate = dayAfter.toISOString().split('T')[0];
            
                document.getElementById('reservasi-btn').addEventListener('click', () => {
                    showModal = true;
                });
            }" x-show="showModal" x-cloak
                class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">

                <!-- Modal Backdrop - adjusted opacity to be more transparent -->
                <div class="fixed inset-0 bg-black bg-opacity-30 transition-opacity" x-show="showModal"
                    @click="showModal = false"></div>

                <!-- Modal Content -->
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div class="relative bg-white w-full max-w-md rounded-lg shadow-xl overflow-hidden" x-show="showModal"
                        @click.away="showModal = false" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100">

                        <!-- Modal Header -->
                        <div class="bg-blue-600 text-white px-6 py-4 flex items-center justify-between">
                            <h3 class="text-xl font-semibold">Reservasi Kamar</h3>
                            <button @click="showModal = false" class="text-white hover:text-blue-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Steps Indicator -->
                        <div class="px-6 pt-4">
                            <div class="flex items-center">
                                <div class="flex items-center text-blue-600 relative">
                                    <div
                                        class="rounded-full h-8 w-8 flex items-center justify-center bg-blue-600 text-white">
                                        1</div>
                                    <div
                                        class="absolute top-0 -ml-4 text-xs font-medium text-blue-600 mt-10 w-16 text-center">
                                        Detail</div>
                                </div>
                                <div class="flex-auto border-t-2"
                                    :class="step >= 2 ? 'border-blue-600' : 'border-gray-300'"></div>
                                <div class="flex items-center relative"
                                    :class="step >= 2 ? 'text-blue-600' : 'text-gray-400'">
                                    <div class="rounded-full h-8 w-8 flex items-center justify-center"
                                        :class="step >= 2 ? 'bg-blue-600 text-white' : 'bg-gray-300'">2</div>
                                    <div class="absolute top-0 -ml-4 text-xs font-medium mt-10 w-16 text-center">Pembayaran
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Body -->
                        <div class="px-6 py-4">
                            <!-- Step 1: Reservation Details -->
                            <div x-show="step === 1">
                                <h4 class="font-medium text-lg mb-4">Detail Reservasi</h4>

                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Check-in</label>
                                        <input type="date" x-model="checkInDate"
                                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Check-out</label>
                                        <input type="date" x-model="checkOutDate"
                                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="bg-blue-50 p-4 rounded-md mb-6">
                                    <h5 class="font-medium text-blue-800 mb-2">Informasi Kamar</h5>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-600">Tipe Kamar</span>
                                        <span class="font-medium" x-text="roomName">Deluxe Room</span>
                                    </div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-600">Harga per Malam</span>
                                        <span class="font-medium">Rp 850.000</span>
                                    </div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-600">Jumlah Malam</span>
                                        <span class="font-medium" x-text="nights">1</span>
                                    </div>
                                    <hr class="my-2 border-blue-200">
                                    <div class="flex justify-between font-medium">
                                        <span>Total</span>
                                        <span class="text-blue-700" x-text="`Rp ${totalPrice.toLocaleString('id-ID')}`">Rp
                                            850.000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Payment -->
                            <div x-show="step === 2">
                                <h4 class="font-medium text-lg mb-4">Informasi Pembayaran</h4>

                                <div class="bg-blue-50 p-4 rounded-md mb-6">
                                    <h5 class="font-medium text-blue-800 mb-2">Transfer Pembayaran</h5>
                                    <div class="mb-3">
                                        <p class="text-gray-700 mb-2">Silakan transfer ke rekening berikut:</p>
                                        <div class="bg-white p-3 rounded border border-blue-200">
                                            <p class="font-medium">Bank Central Asia (BCA)</p>
                                            <p>Nomor Rekening: 8734567890</p>
                                            <p>Atas Nama: PT Hotel Serenity</p>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-600 mt-3">
                                        <p>- Transfer sesuai dengan total pembayaran</p>
                                        <p>- Konfirmasi pembayaran diproses dalam 1x24 jam</p>
                                        <p>- Simpan bukti pembayaran Anda</p>
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-md">
                                    <h5 class="font-medium mb-2">Ringkasan Pembayaran</h5>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-600" x-text="roomName">Deluxe Room</span>
                                        <span>1 kamar × <span x-text="nights"></span> malam</span>
                                    </div>
                                    <hr class="my-2 border-gray-300">
                                    <div class="flex justify-between font-medium">
                                        <span>Total Pembayaran</span>
                                        <span class="text-blue-700" x-text="`Rp ${totalPrice.toLocaleString('id-ID')}`">Rp
                                            850.000</span>
                                    </div>
                                    <div class="mt-4 bg-yellow-50 p-3 rounded-md border border-yellow-100 text-sm">
                                        <p class="text-yellow-800">
                                            <span class="font-medium">Penting:</span> Reservasi akan dikonfirmasi setelah
                                            pembayaran diterima.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="px-6 py-4 bg-gray-50 text-right">
                            <button x-show="step > 1" @click="step--"
                                class="mr-2 px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition duration-300">
                                Kembali
                            </button>
                            <button x-show="step < 2" @click="step++"
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">
                                Lihat Informasi Pembayaran
                            </button>
                            <button x-show="step === 2" @click="showModal = false"
                                class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300">
                                Selesai
                            </button>
                        </div>
                    </div>
                </div>
            </div>



    </section>
@endsection

@section('scripts')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script>
        // Calculate nights when dates change
        document.addEventListener('alpine:init', () => {
            Alpine.effect(() => {
                const context = Alpine.$data.get(document.querySelector('[x-data]'));
                if (context.checkInDate && context.checkOutDate) {
                    const checkIn = new Date(context.checkInDate);
                    const checkOut = new Date(context.checkOutDate);
                    const diffTime = checkOut - checkIn;
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    if (diffDays > 0) {
                        context.nights = diffDays;
                        context.totalPrice = 850000 * diffDays;
                    }
                }
            });
        });
    </script>
@endsection
