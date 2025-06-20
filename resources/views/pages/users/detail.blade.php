@extends('layouts.app')

@section('title')
    {{ $room->nama_kamar_222320 }} - Detail Kamar
@endsection

@section('content')
    <section class="py-12 bg-blue-50">
        <div class="container mx-auto px-4">
            <!-- Alert Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-blue-200">
                <!-- Breadcrumb -->
                <div class="px-6 py-3 bg-gray-50 border-b border-blue-100">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{ url('/') }}" class="text-blue-700 hover:text-blue-900">
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{ route('user.rooms.index') }}"
                                        class="ml-1 text-blue-700 hover:text-blue-900 md:ml-2">Kamar</a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-1 text-gray-500 md:ml-2">{{ $room->nama_kamar_222320 }}</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-0">
                    <!-- Room Image -->
                    <div class="lg:col-span-2 relative">
                        <img src="{{ asset('storage/' . $room->gambar_222320) }}" alt="{{ $room->nama_kamar_222320 }}"
                            class="w-full h-96 lg:h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded">
                                {{ $room->tipeRoom->nama_tipe_222320 }}
                            </span>
                        </div>
                    </div>

                    <!-- Room Details -->
                    <div class="p-6 border-l border-blue-100">
                        <h1 class="text-2xl font-bold text-blue-800">{{ $room->nama_kamar_222320 }}</h1>

                        <div class="mt-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>

                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between text-xl font-semibold">
                                <span>Harga per malam</span>
                                <div class="text-blue-700">
                                    Rp {{ number_format($room->tipeRoom->harga_222320, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>

                        <div class="my-6 border-t border-b border-blue-100 py-4">
                            <h2 class="font-semibold text-blue-700 mb-2">Status:</h2>
                            <span
                                class="inline-block px-3 py-1 rounded-full {{ $room->status_222320 == 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $room->status_222320 == 'available' ? 'Tersedia' : 'Tidak Tersedia' }}
                            </span>
                        </div>

                        @if ($room->status_222320 == 'available')
                            @auth
                                <button id="reservasi-btn" data-room-id="{{ $room->id_room_222320 }}"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-md font-medium transition duration-300 ease-in-out">
                                    Reservasi Sekarang
                                </button>
                            @else
                                <a href="{{ route('login') }}"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-md font-medium transition duration-300 ease-in-out block text-center">
                                    Login untuk Reservasi
                                </a>
                            @endauth
                        @else
                            <button disabled
                                class="w-full bg-gray-400 text-white py-3 rounded-md font-medium cursor-not-allowed">
                                Tidak Tersedia
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Room Description -->
                <div class="p-6 border-t border-blue-100">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Deskripsi Kamar</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $room->tipeRoom->deskripsi_222320 ?? 'Kamar nyaman dengan fasilitas lengkap untuk kenyamanan Anda.' }}
                    </p>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-blue-700 mb-3">Fasilitas Kamar</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @php
                                $facilities = [
                                    'Free Wi-Fi',
                                    'AC',
                                    'TV LED 42"',
                                    'Kamar Mandi Dalam',
                                    'Pembuat Kopi/Teh',
                                    'Brankas',
                                    'Kulkas Mini',
                                    'Handuk & Amenities',
                                    'Meja Kerja',
                                ];
                            @endphp

                            @foreach ($facilities as $facility)
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">{{ $facility }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Rooms -->
            @php
                $relatedRooms = \App\Models\Room::with('tipeRoom')
                    ->where('id_room_222320', '!=', $room->id_room_222320)
                    ->where('status_222320', 'tersedia')
                    ->take(3)
                    ->get();
            @endphp

            @if ($relatedRooms->count() > 0)
                <div class="mt-12">
                    <h2 class="text-2xl font-semibold text-blue-800 mb-6">Kamar Lainnya</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($relatedRooms as $relatedRoom)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-blue-200">
                                <div class="relative">
                                    <span
                                        class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded z-10">
                                        {{ $relatedRoom->tipeRoom->nama_tipe_222320 }}
                                    </span>
                                    <img src="{{ $relatedRoom->gambar_222320 ? asset('storage/' . $relatedRoom->gambar_222320) : asset('images/default-room.jpg') }}"
                                        alt="{{ $relatedRoom->nama_kamar_222320 }}" class="w-full h-48 object-cover"
                                        onerror="this.src='{{ asset('images/default-room.jpg') }}'">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-blue-800 font-semibold text-lg mb-2">
                                        {{ $relatedRoom->nama_kamar_222320 }}</h3>
                                    <p class="text-gray-600 text-sm mb-3">
                                        {{ Str::limit($relatedRoom->tipeRoom->deskripsi_222320, 80) }}</p>

                                    <div class="flex justify-between items-center">
                                        <p class="text-blue-700 font-bold">Rp
                                            {{ number_format($relatedRoom->tipeRoom->harga_222320, 0, ',', '.') }}</p>
                                        <a href="{{ route('reservasi.create', $relatedRoom->id_room_222320) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-200">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Reservation Modal -->
        @auth
            <dialog id="reservation-modal"
                class="modal p-0 rounded-lg shadow-xl w-full max-w-2xl mx-auto opacity-0 transform scale-95 transition-all duration-300 backdrop:bg-black backdrop:bg-opacity-50">
                <div class="bg-blue-700 py-4 px-6 flex justify-between items-center">
                    <h3 class="text-xl font-bold text-white">Reservasi Kamar - {{ $room->nama_kamar_222320 }}</h3>
                    <button type="button" id="close-modal-header" class="text-white hover:text-gray-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 bg-white max-h-96 overflow-y-auto">
                    <form id="reservation-form" action="{{ route('reservasi.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="id_room_222320" value="{{ $room->id_room_222320 }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-blue-700 font-medium mb-2">Tanggal Check-in</label>
                                <input type="date" name="tanggal_checkin_222320" id="checkin_date"
                                    min="{{ date('Y-m-d') }}"
                                    class="w-full p-3 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-blue-700 font-medium mb-2">Tanggal Check-out</label>
                                <input type="date" name="tanggal_checkout_222320" id="checkout_date"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    class="w-full p-3 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                            </div>
                        </div>



                        <div>
                            <label class="block text-blue-700 font-medium mb-2">Catatan Tambahan (Opsional)</label>
                            <textarea name="catatan_222320" rows="3"
                                class="w-full p-3 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Permintaan khusus atau catatan untuk reservasi Anda..."></textarea>
                        </div>

                        <!-- Price Display -->
                        <div id="price-display" class="hidden">
                            <div class="p-4 rounded-md border bg-blue-50">
                                <div id="price-calculation" class="font-semibold text-blue-700"></div>
                            </div>
                        </div>

                        <div class="flex space-x-3 justify-end pt-4 border-t">
                            <button type="button" id="close-modal"
                                class="px-6 py-2 border border-blue-500 text-blue-500 rounded-md hover:bg-blue-50 transition">
                                Batal
                            </button>
                            <button type="submit" id="submit-reservation"
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                Konfirmasi Reservasi
                            </button>
                        </div>
                    </form>
                </div>
            </dialog>
        @endauth
    </section>
@endsection

@section('scripts')
    <style>
        /* Modal animations */
        .modal[open] {
            opacity: 1 !important;
            transform: scale(1) !important;
        }

        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>

    <script>
        // Modal management
        function toggleReservationModal(show = true) {
            const modal = document.getElementById('reservation-modal');
            if (show) {
                modal.showModal();
                document.body.style.overflow = 'hidden';
                setTimeout(() => {
                    modal.classList.add('opacity-100', 'scale-100');
                    modal.classList.remove('opacity-0', 'scale-95');
                }, 10);
            } else {
                modal.classList.remove('opacity-100', 'scale-100');
                modal.classList.add('opacity-0', 'scale-95');
                document.body.style.overflow = 'auto';
                setTimeout(() => modal.close(), 300);
            }
        }

        // Price calculation
        function calculatePrice() {
            const checkinDate = document.getElementById('checkin_date').value;
            const checkoutDate = document.getElementById('checkout_date').value;
            const basePrice = {{ $room->tipeRoom->harga_222320 }};

            if (checkinDate && checkoutDate) {
                const checkin = new Date(checkinDate);
                const checkout = new Date(checkoutDate);
                const timeDiff = checkout.getTime() - checkin.getTime();
                const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                if (dayDiff > 0) {
                    const totalPrice = dayDiff * basePrice;
                    document.getElementById('price-calculation').innerHTML =
                        `<strong>Durasi:</strong> ${dayDiff} malam<br>
                         <strong>Total Harga:</strong> Rp ${totalPrice.toLocaleString('id-ID')}`;
                    document.getElementById('price-display').classList.remove('hidden');
                    return true;
                } else {
                    document.getElementById('price-display').classList.add('hidden');
                }
            } else {
                document.getElementById('price-display').classList.add('hidden');
            }
            return false;
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Reservation button
            document.getElementById('reservasi-btn')?.addEventListener('click', function() {
                toggleReservationModal(true);
            });

            // Close modal buttons
            document.getElementById('close-modal')?.addEventListener('click', () => toggleReservationModal(false));
            document.getElementById('close-modal-header')?.addEventListener('click', () => toggleReservationModal(
                false));

            // Close modal when clicking backdrop
            document.getElementById('reservation-modal')?.addEventListener('click', function(event) {
                if (event.target === this) {
                    toggleReservationModal(false);
                }
            });

            // Date change handlers
            document.getElementById('checkin_date')?.addEventListener('change', function() {
                const checkoutInput = document.getElementById('checkout_date');
                const checkinDate = new Date(this.value);
                const nextDay = new Date(checkinDate);
                nextDay.setDate(nextDay.getDate() + 1);

                checkoutInput.min = nextDay.toISOString().split('T')[0];
                if (checkoutInput.value && new Date(checkoutInput.value) <= checkinDate) {
                    checkoutInput.value = '';
                }

                calculatePrice();
            });

            document.getElementById('checkout_date')?.addEventListener('change', function() {
                calculatePrice();
            });

            // Form submission with loading state
            document.getElementById('reservation-form')?.addEventListener('submit', function() {
                const submitBtn = document.getElementById('submit-reservation');
                submitBtn.disabled = true;
                submitBtn.textContent = 'Memproses...';
            });
        });
    </script>
@endsection
