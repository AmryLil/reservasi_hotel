@extends('layouts.app')

@section('title')
    {{ $room->nama_kamar_222320 }} - Detail Kamar
@endsection

@section('content')
    <section class="py-12 bg-blue-50">
        <div class="container mx-auto px-4">
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
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
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
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
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
                    <div class="lg:col-span-2 relative">
                        <img src="{{ asset('storage/' . $room->gambar_222320) }}" alt="{{ $room->nama_kamar_222320 }}"
                            class="w-full h-96 lg:h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded">
                                {{ $room->tipeRoom->nama_tipe_222320 }}
                            </span>
                        </div>
                    </div>

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

                <div class="p-6 border-t border-blue-100">
                    {{-- ... Kode deskripsi dan fasilitas Anda ... --}}
                </div>
            </div>


        </div>

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
                                <input type="date" name="tanggal_checkin_222320" id="checkin_date" min="{{ date('Y-m-d') }}"
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
                            <label for="voucher_code" class="block text-blue-700 font-medium mb-2">Kode Voucher
                                (Opsional)
                            </label>
                            <div class="flex">
                                <input type="text" name="kode_voucher" id="voucher_code"
                                    class="flex-grow p-3 border border-blue-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Masukkan kode voucher...">
                                <button type="button" id="apply-voucher-btn"
                                    class="bg-blue-600 text-white px-4 rounded-r-md hover:bg-blue-700">Terapkan</button>
                            </div>
                            <div id="voucher-status" class="text-sm mt-2"></div>
                        </div>

                        <div>
                            <label class="block text-blue-700 font-medium mb-2">Catatan Tambahan (Opsional)</label>
                            <textarea name="catatan_222320" rows="3"
                                class="w-full p-3 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Permintaan khusus atau catatan untuk reservasi Anda..."></textarea>
                        </div>

                        <div id="price-display" class="hidden">
                            <div class="p-4 rounded-md border bg-blue-50">
                                <div id="price-calculation" class="space-y-1 text-blue-700"></div>
                            </div>
                        </div>

                        <div class="flex space-x-3 justify-end pt-4 border-t">
                            <button type="button" id="close-modal"
                                class="px-6 py-2 border border-blue-500 text-blue-500 rounded-md hover:bg-blue-50 transition">Batal</button>
                            <button type="submit" id="submit-reservation"
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Konfirmasi
                                Reservasi</button>
                        </div>
                    </form>
                </div>
            </dialog>
        @endauth
    </section>
@endsection

@section('scripts')
    <style>
        .modal[open] {
            opacity: 1 !important;
            transform: scale(1) !important;
        }

        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // === State Variables ===
            const basePrice = {{ $room->tipeRoom->harga_222320 }};
            let voucherDiscount = 0; // Diskon dalam persen

            // === DOM Elements ===
            const modal = document.getElementById('reservation-modal');
            const reservasiBtn = document.getElementById('reservasi-btn');
            const closeModalBtn = document.getElementById('close-modal');
            const closeModalHeaderBtn = document.getElementById('close-modal-header');
            const checkinInput = document.getElementById('checkin_date');
            const checkoutInput = document.getElementById('checkout_date');
            const applyVoucherBtn = document.getElementById('apply-voucher-btn');
            const voucherCodeInput = document.getElementById('voucher_code');
            const voucherStatusEl = document.getElementById('voucher-status');
            const priceDisplayEl = document.getElementById('price-display');
            const priceCalculationEl = document.getElementById('price-calculation');
            const reservationForm = document.getElementById('reservation-form');
            const submitBtn = document.getElementById('submit-reservation');

            // === Functions ===
            const toggleReservationModal = (show = true) => {
                if (!modal) return;
                if (show) {
                    modal.showModal();
                    document.body.style.overflow = 'hidden';
                } else {
                    modal.close();
                    document.body.style.overflow = 'auto';
                }
            };

            const calculateAndDisplayPrice = () => {
                if (!checkinInput.value || !checkoutInput.value) {
                    priceDisplayEl.classList.add('hidden');
                    return;
                }

                const checkin = new Date(checkinInput.value);
                const checkout = new Date(checkoutInput.value);
                const timeDiff = checkout.getTime() - checkin.getTime();
                const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                if (dayDiff > 0) {
                    const originalPrice = dayDiff * basePrice;
                    const discountAmount = Math.round((originalPrice * voucherDiscount) / 100);
                    const finalPrice = originalPrice - discountAmount;

                    let priceHtml = `
                        <div class="flex justify-between text-sm">
                            <span>Harga Asli (${dayDiff} malam)</span> 
                            <span>Rp ${originalPrice.toLocaleString('id-ID')}</span>
                        </div>`;

                    if (voucherDiscount > 0) {
                        priceHtml += `
                            <div class="flex justify-between text-sm text-green-600 font-medium">
                                <span>Diskon (${voucherDiscount}%)</span> 
                                <span>- Rp ${discountAmount.toLocaleString('id-ID')}</span>
                            </div>`;
                    }

                    priceHtml += `
                        <hr class="my-1 border-blue-200">
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total Harga</span> 
                            <span>Rp ${finalPrice.toLocaleString('id-ID')}</span>
                        </div>`;

                    priceCalculationEl.innerHTML = priceHtml;
                    priceDisplayEl.classList.remove('hidden');
                } else {
                    priceDisplayEl.classList.add('hidden');
                }
            };

            const applyVoucher = async () => {
                const voucherCode = voucherCodeInput.value.trim();
                if (!voucherCode) {
                    voucherDiscount = 0;
                    voucherStatusEl.innerHTML = '';
                    calculateAndDisplayPrice();
                    return;
                }

                voucherStatusEl.innerHTML = '<span class="text-gray-500">Mengecek...</span>';

                try {
                    const response = await fetch('{{ route('vouchers.validate') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            kode_voucher: voucherCode
                        })
                    });
                    const data = await response.json();

                    if (response.ok && data.valid) {
                        voucherDiscount = parseFloat(data.persentase_diskon);
                        voucherStatusEl.innerHTML =
                            `<span class="text-green-600 font-semibold">${data.message}</span>`;
                    } else {
                        voucherDiscount = 0;
                        voucherStatusEl.innerHTML =
                            `<span class="text-red-600 font-semibold">${data.message}</span>`;
                    }
                } catch (error) {
                    voucherDiscount = 0;
                    voucherStatusEl.innerHTML =
                        `<span class="text-red-600 font-semibold">Terjadi kesalahan. Coba lagi.</span>`;
                }
                calculateAndDisplayPrice();
            };

            // === Event Listeners ===
            reservasiBtn?.addEventListener('click', () => toggleReservationModal(true));
            closeModalBtn?.addEventListener('click', () => toggleReservationModal(false));
            closeModalHeaderBtn?.addEventListener('click', () => toggleReservationModal(false));
            modal?.addEventListener('click', e => {
                if (e.target === modal) toggleReservationModal(false);
            });

            checkinInput?.addEventListener('change', function() {
                const nextDay = new Date(this.value);
                nextDay.setDate(nextDay.getDate() + 1);
                const nextDayString = nextDay.toISOString().split('T')[0];
                checkoutInput.min = nextDayString;
                if (checkoutInput.value && new Date(checkoutInput.value) <= new Date(this.value)) {
                    checkoutInput.value = '';
                }
                calculateAndDisplayPrice();
            });
            checkoutInput?.addEventListener('change', calculateAndDisplayPrice);

            applyVoucherBtn?.addEventListener('click', applyVoucher);

            reservationForm?.addEventListener('submit', function() {
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<span class="animate-spin h-5 w-5 border-t-2 border-r-2 border-white rounded-full"></span> Memproses...';
            });
        });
    </script>
@endsection
