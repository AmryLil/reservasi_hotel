@extends('layouts.app')

@section('title')
    {{ $room->nama_kamar_222320 }} - Detail Kamar
@endsection

@section('content')
    <section class="py-12 bg-blue-50">
        <div class="container mx-auto px-4">
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
                        <img src="{{ asset('storage/' . $room->gambar_222320 ?: 'images/room.jpg') }}"
                            alt="{{ $room->nama_kamar_222320 }}" class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded">
                                {{ $room->tipeRoom->nama_kamar_222320 }}
                            </span>
                        </div>
                        @if ($room->diskon_222320 > 0)
                            <div class="absolute top-4 right-4">
                                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded">
                                    DISKON {{ $room->diskon_222320 }}%
                                </span>
                            </div>
                        @endif
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
                            <span class="ml-2 text-blue-700">Maksimal {{ $room->kapasitas_222320 }} Orang</span>
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between text-xl font-semibold">
                                <span>Harga per malam</span>
                                <div class="text-blue-700">
                                    @if ($room->diskon_222320 > 0)
                                        <span class="line-through text-gray-500 text-base mr-2">Rp
                                            {{ number_format($room->tipeRoom->harga_222320, 0, ',', '.') }}</span>
                                        Rp
                                        {{ number_format(($room->tipeRoom->harga_222320 * (100 - $room->diskon_222320)) / 100, 0, ',', '.') }}
                                    @else
                                        Rp {{ number_format($room->tipeRoom->harga_222320, 0, ',', '.') }}
                                    @endif
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
                            <button id="reservasi-btn" data-room-id="{{ $room->id_room_222320 }}"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-md font-medium transition duration-300 ease-in-out">
                                Reservasi Sekarang
                            </button>
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
                        {{ $room->tipeRoom->deskripsi_222320 }}
                    </p>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-blue-700 mb-3">Fasilitas Kamar</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <!-- Dummy facilities - in a real application, these would come from a relation -->
                            @php
                                $facilities = [
                                    'Free Wi-Fi',
                                    'AC',
                                    'TV LED 42"',
                                    'Kamar Mandi Dalam',
                                    'Pembuat Kopi',
                                    'Brankas',
                                    'Kulkas Mini',
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
            <div class="mt-12">
                <h2 class="text-2xl font-semibold text-blue-800 mb-6">Kamar Lainnya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach (\App\Models\Room::where('id_room_222320', '!=', $room->id_room_222320)->where('status_222320', 'available')->take(3)->get() as $relatedRoom)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-blue-200">
                            <div class="relative">
                                <span
                                    class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded">
                                    {{ $relatedRoom->tipeRoom->nama_tipe_222320 }}
                                </span>
                                <img src="{{ asset('storage/' . $relatedRoom->gambar_222320 ?: 'images/room.jpg') }}"
                                    alt="{{ $relatedRoom->nama_kamar_222320 }}" class="w-full h-48 object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="text-blue-800 font-semibold text-lg">{{ $relatedRoom->nama_kamar_222320 }}</h3>

                                <div class="flex justify-between items-center mt-4">
                                    <p class="text-blue-700 font-bold">Rp
                                        {{ number_format($relatedRoom->tipeRoom->harga_222320, 0, ',', '.') }}</p>
                                    <a href="{{ route('user.rooms.show', $relatedRoom->id_room_222320) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded transition duration-200">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Reservation Modal -->
        <dialog id="reservation-modal"
            class="modal p-0 rounded-lg shadow-xl w-full max-w-md mx-auto opacity-0 transform scale-95 transition-all duration-300">
            <div class="bg-blue-700 py-3 px-4">
                <h3 class="text-lg font-bold text-white">Reservasi Kamar - {{ $room->nama_kamar_222320 }}</h3>
            </div>
            <div class="p-6 bg-white">
                <form id="reservation-form" action="#" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id_room_222320 }}">

                    <div>
                        <label class="block text-blue-700 font-medium mb-1">Nama Lengkap</label>
                        <input type="text" name="nama"
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">Email</label>
                        <input type="email" name="email"
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">No. Telepon</label>
                        <input type="tel" name="telepon"
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-blue-700 font-medium mb-1">Check-in</label>
                            <input type="date" name="check_in" min="{{ date('Y-m-d') }}"
                                class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label class="block text-blue-700 font-medium mb-1">Check-out</label>
                            <input type="date" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">Jumlah Tamu</label>
                        <input type="number" name="jumlah_tamu" min="1" max="{{ $room->kapasitas_222320 }}"
                            class="w-full p-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-blue-700 font-medium mb-1">Catatan Tambahan</label>
                        <textarea name="catatan"
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

        document.addEventListener('DOMContentLoaded', function() {
            // Setup reservasi button
            document.querySelector('#reservasi-btn')?.addEventListener('click', function() {
                if (!isUserLoggedIn()) {
                    window.location.href = "{{ route('login') }}";
                    return;
                }

                const roomId = this.dataset.roomId;
                toggleReservationModal(true);
            });

            // Setup modal close button
            document.getElementById('close-modal')?.addEventListener('click', function() {
                toggleReservationModal(false);
            });

            // Close modal when clicking outside
            const modal = document.getElementById('reservation-modal');
            modal?.addEventListener('click', function(event) {
                if (event.target === modal) {
                    toggleReservationModal(false);
                }
            });

            // Handle form submission
            document.getElementById('reservation-form')?.addEventListener('submit', function(event) {
                // Form will submit normally to the specified action
            });
        });
    </script>
@endsection
