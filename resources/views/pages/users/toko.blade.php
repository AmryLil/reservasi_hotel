@extends('layouts.app')

@section('title', 'RESERVASI KAMAR')

@section('content')
    <section class="py-10 bg-blue-50">
        <div class="container mx-auto px-4">
            <h1 class="font-semibold text-3xl text-center text-blue-800">RESERVASI KAMAR</h1>

            <!-- Filter Section -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md border border-blue-200">
                <h2 class="text-xl font-medium text-blue-700 mb-4">Filter Pencarian</h2>
                <form class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label class="block text-blue-700 font-medium">Tipe Kamar</label>
                        <select
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Semua Tipe</option>
                            <option value="standard">Standard Room</option>
                            <option value="deluxe">Deluxe Room</option>
                            <option value="suite">Suite Room</option>
                            <option value="family">Family Room</option>
                        </select>
                    </div>


                </form>
            </div>

            <!-- Room List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                <!-- Room 1 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden fade-in border border-blue-200">
                    <div class="relative">
                        <span
                            class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded">STANDARD</span>
                        <img src="{{ asset('images/room.jpg') }}" alt="Standard Room" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-blue-800 font-semibold text-xl">Standard Room</h2>
                        <div class="flex items-center mt-1 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-1 text-sm">Max: 2 Orang</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Kamar nyaman dengan fasilitas dasar untuk kenyamanan menginap
                            Anda.</p>
                        <div class="flex mt-2">⭐⭐⭐☆☆</div>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-blue-700 font-bold">Rp 550.000<span
                                    class="text-sm font-normal text-gray-500">/malam</span></p>
                            <button id="reservasi-btn" data-room-id="1"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded transition duration-300 ease-in-out">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Room 2 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden fade-in border border-blue-200">
                    <div class="relative">
                        <span
                            class="absolute top-2 left-2 bg-blue-700 text-white text-xs font-bold px-2 py-1 rounded">DELUXE</span>
                        <img src="{{ asset('images/room.jpg') }}" alt="Deluxe Room" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-blue-800 font-semibold text-xl">Deluxe Room</h2>
                        <div class="flex items-center mt-1 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-1 text-sm">Max: 2 Orang</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Kamar luas dengan pemandangan kota dan fasilitas premium.</p>
                        <div class="flex mt-2">⭐⭐⭐⭐☆</div>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-blue-700 font-bold">Rp 850.000<span
                                    class="text-sm font-normal text-gray-500">/malam</span></p>
                            <button id="reservasi-btn" data-room-id="2"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded transition duration-300 ease-in-out">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Room 3 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden fade-in border border-blue-200">
                    <div class="relative">
                        <span
                            class="absolute top-2 left-2 bg-blue-800 text-white text-xs font-bold px-2 py-1 rounded">SUITE</span>
                        <img src="{{ asset('images/room.jpg') }}" alt="Suite Room" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-blue-800 font-semibold text-xl">Suite Room</h2>
                        <div class="flex items-center mt-1 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-1 text-sm">Max: 4 Orang</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Kamar mewah dengan ruang tamu terpisah dan fasilitas
                            eksklusif.</p>
                        <div class="flex mt-2">⭐⭐⭐⭐⭐</div>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-blue-700 font-bold">Rp 1.250.000<span
                                    class="text-sm font-normal text-gray-500">/malam</span></p>
                            <button id="reservasi-btn" data-room-id="3"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded transition duration-300 ease-in-out">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Room 4 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden fade-in border border-blue-200">
                    <div class="relative">
                        <span
                            class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded">FAMILY</span>
                        <span
                            class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">DISKON
                            10%</span>
                        <img src="{{ asset('images/room.jpg') }}" alt="Family Room" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-blue-800 font-semibold text-xl">Family Room</h2>
                        <div class="flex items-center mt-1 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-1 text-sm">Max: 6 Orang</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Kamar keluarga luas dengan dua tempat tidur queen-size dan
                            area bermain anak.</p>
                        <div class="flex mt-2">⭐⭐⭐⭐☆</div>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-blue-700 font-bold">
                                <span class="line-through text-gray-500 text-sm">Rp 1.500.000</span>
                                Rp 1.350.000<span class="text-sm font-normal text-gray-500">/malam</span>
                            </p>
                            <button id="reservasi-btn" data-room-id="4"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded transition duration-300 ease-in-out">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Room 5 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden fade-in border border-blue-200">
                    <div class="relative">
                        <span
                            class="absolute top-2 left-2 bg-blue-800 text-white text-xs font-bold px-2 py-1 rounded">SUITE</span>
                        <span
                            class="absolute top-2 right-2 bg-blue-400 text-white text-xs font-bold px-2 py-1 rounded">POPULER</span>
                        <img src="{{ asset('images/room.jpg') }}" alt="Executive Suite" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-blue-800 font-semibold text-xl">Executive Suite</h2>
                        <div class="flex items-center mt-1 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-1 text-sm">Max: 2 Orang</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Suite eksklusif dengan pemandangan laut, jacuzzi pribadi dan
                            layanan butler.</p>
                        <div class="flex mt-2">⭐⭐⭐⭐⭐</div>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-blue-700 font-bold">Rp 1.800.000<span
                                    class="text-sm font-normal text-gray-500">/malam</span></p>
                            <button id="reservasi-btn" data-room-id="5"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded transition duration-300 ease-in-out">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Room 6 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden fade-in border border-blue-200">
                    <div class="relative">
                        <span
                            class="absolute top-2 left-2 bg-blue-700 text-white text-xs font-bold px-2 py-1 rounded">DELUXE</span>
                        <span
                            class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">DISKON
                            15%</span>
                        <img src="{{ asset('images/room.jpg') }}" alt="Premium Deluxe" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-blue-800 font-semibold text-xl">Premium Deluxe</h2>
                        <div class="flex items-center mt-1 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-1 text-sm">Max: 3 Orang</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Kamar deluxe premium dengan balkon pribadi dan akses ke kolam
                            renang infinity.</p>
                        <div class="flex mt-2">⭐⭐⭐⭐☆</div>
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-blue-700 font-bold">
                                <span class="line-through text-gray-500 text-sm">Rp 1.150.000</span>
                                Rp 977.500<span class="text-sm font-normal text-gray-500">/malam</span>
                            </p>
                            <button id="reservasi-btn" data-room-id="6"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded transition duration-300 ease-in-out">
                                Reservasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                <nav class="inline-flex rounded-md shadow">
                    <a href="#"
                        class="py-2 px-4 bg-blue-50 text-blue-600 font-medium border border-blue-200 rounded-l-md hover:bg-blue-100">
                        &laquo; Prev
                    </a>
                    <a href="#" class="py-2 px-4 bg-blue-600 text-white font-medium border border-blue-600">1</a>
                    <a href="#"
                        class="py-2 px-4 bg-blue-50 text-blue-600 font-medium border border-blue-200 hover:bg-blue-100">2</a>
                    <a href="#"
                        class="py-2 px-4 bg-blue-50 text-blue-600 font-medium border border-blue-200 hover:bg-blue-100">3</a>
                    <a href="#"
                        class="py-2 px-4 bg-blue-50 text-blue-600 font-medium border border-blue-200 rounded-r-md hover:bg-blue-100">
                        Next &raquo;
                    </a>
                </nav>
            </div>
        </div>

        <!-- Scroll to Top Button -->
        <button id="scrollToTopButton"
            class="fixed bottom-4 right-4 p-3 bg-blue-600 text-white rounded-full shadow-lg z-50 transition-opacity duration-300 hover:bg-blue-700 hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
            </svg>
        </button>

        <!-- Reservation Modal -->
        <dialog id="reservation-modal"
            class="modal p-0 rounded-lg shadow-xl w-full max-w-md mx-auto opacity-0 transform scale-95 transition-all duration-300">
            <div class="bg-blue-700 py-3 px-4">
                <h3 class="text-lg font-bold text-white">Reservasi Kamar</h3>
            </div>
            <div class="p-6 bg-white">
                <form id="reservation-form" class="space-y-4">
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">Nama Lengkap</label>
                        <input type="text"
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">Email</label>
                        <input type="email"
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">No. Telepon</label>
                        <input type="tel"
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-blue-700 font-medium mb-1">Check-in</label>
                            <input type="date"
                                class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label class="block text-blue-700 font-medium mb-1">Check-out</label>
                            <input type="date"
                                class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">Jumlah Tamu</label>
                        <input type="number" min="1" max="6"
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">Catatan Tambahan</label>
                        <textarea
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-24"></textarea>
                    </div>
                    <div class="flex space-x-3 justify-end pt-4">
                        <button type="button" id="close-modal"
                            class="px-4 py-2 border border-blue-500 text-blue-500 rounded-md hover:bg-blue-50">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Konfirmasi Reservasi
                        </button>
                    </div>
                </form>
            </div>
        </dialog>
    </section>
@endsection


@section('scripts')
    <style>
        /* Animasi Fade-in untuk Kartu Kamar */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi Modal */
        .modal[open] {
            opacity: 1 !important;
            transform: scale(1) !important;
        }
    </style>
    <script>
        // Modal Toggle Function
        function toggleReservationModal(show = true) {
            const modal = document.getElementById('reservation-modal');
            if (show) {
                modal.showModal();
                setTimeout(() => {
                    modal.classList.add('opacity-100', 'scale-100');
                    modal.classList.remove('opacity-0', 'scale-95');
                }, 10);
            } else {
                modal.classList.remove('opacity-100', 'scale-100');
                modal.classList.add('opacity-0', 'scale-95');
                setTimeout(() => modal.close(), 300);
            }
        }

        // Check if user is logged in
        function isUserLoggedIn() {
            return {{ auth()->check() ? 'true' : 'false' }};
        }

        // Room filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Setup reservasi buttons
            document.querySelectorAll('#reservasi-btn').forEach(button => {
                button.addEventListener('click', function() {
                    if (!isUserLoggedIn()) {
                        window.location.href = "{{ route('login') }}";
                        return;
                    }

                    const roomId = this.dataset.roomId;
                    // You can use roomId to pre-fill modal data if needed
                    toggleReservationModal(true);
                });
            });

            // Setup modal close button
            document.getElementById('close-modal').addEventListener('click', function() {
                toggleReservationModal(false);
            });

            // Close modal when clicking outside
            const modal = document.getElementById('reservation-modal');
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    toggleReservationModal(false);
                }
            });

            // Handle form submission
            document.getElementById('reservation-form').addEventListener('submit', async function(event) {
                event.preventDefault();

                // Here you would typically collect form data and send to server
                // For demo purposes, just show success message
                toggleReservationModal(false);

                // Using SweetAlert for success message
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Reservasi Berhasil!',
                        text: 'Detail reservasi telah dikirim ke email Anda.',
                        confirmButtonColor: '#3B82F6'
                    });
                } else {
                    alert('Reservasi berhasil! Detail reservasi telah dikirim ke email Anda.');
                }
            });

            // Filter animation delay
            document.querySelectorAll('.fade-in').forEach((el, index) => {
                el.style.animationDelay = `${index * 0.2}s`;
            });
        });
    </script>

    <script>
        // Scroll to Top Button
        document.addEventListener("DOMContentLoaded", function() {
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
