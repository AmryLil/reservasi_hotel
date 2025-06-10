@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Daftar Reservasi & Pembayaran</h1>
                <p class="text-gray-600">Kelola reservasi dan pembayaran Anda dengan mudah</p>
            </div>

            <!-- Alert Messages -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6 shadow-md">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if (session('info'))
                <div class="bg-blue-500 text-white p-4 rounded-lg mb-6 shadow-md">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('info') }}
                    </div>
                </div>
            @endif

            <!-- Empty State -->
            @if ($bookings->isEmpty())
                <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                    <div class="w-24 h-24 mx-auto mb-6 bg-yellow-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Reservasi</h3>
                    <p class="text-gray-500 mb-6">Anda belum memiliki reservasi apapun saat ini</p>
                    <a href="{{ route('rooms.index') }}"
                        class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Buat Reservasi Baru
                    </a>
                </div>
            @else
                <!-- Booking Cards -->
                <div class="space-y-8">
                    @foreach ($bookings as $booking)
                        <div
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <!-- Header Card -->
                            <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6 text-white">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-xl font-bold mb-2">Booking #{{ $booking->id_booking_222320 }}</h3>
                                        <p class="opacity-90">{{ $booking->tanggal_booking_222320->format('d F Y, H:i') }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold">
                                            Rp{{ number_format($booking->total_harga_222320, 0, ',', '.') }}
                                        </div>
                                        {{-- <span
                                            class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-white bg-opacity-20 backdrop-blur-sm mt-2
                                            @if ($booking->status_222320 === 'menunggu_konfirmasi') text-yellow-200
                                            @elseif($booking->status_222320 === 'dikonfirmasi') text-blue-200
                                            @elseif($booking->status_222320 === 'checkin') text-green-200
                                            @elseif($booking->status_222320 === 'checkout') text-gray-200
                                            @else text-red-200 @endif">
                                            {{ ucfirst(str_replace('_', ' ', $booking->status_222320)) }}
                                        </span> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                                    <!-- Room Image & Details -->
                                    <div class="xl:col-span-1">
                                        @if ($booking->room)
                                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                                <!-- Room Image -->
                                                <div class="mb-4">
                                                    @if ($booking->room->foto_kamar_222320)
                                                        <img src="{{ asset('storage/' . $booking->room->foto_kamar_222320) }}"
                                                            alt="{{ $booking->room->nama_kamar_222320 }}"
                                                            class="w-full h-48 object-cover rounded-lg shadow-md">
                                                    @else
                                                        <div
                                                            class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                                            <svg class="w-16 h-16 text-gray-400" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>

                                                <h4 class="text-lg font-bold text-gray-800 mb-2">
                                                    {{ $booking->room->nama_kamar_222320 }}</h4>

                                                @if ($booking->room->tipeRoom)
                                                    <div class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-gray-600">Tipe Kamar:</span>
                                                            <span
                                                                class="font-medium">{{ $booking->room->tipeRoom->nama_tipe_222320 }}</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-gray-600">Harga/Malam:</span>
                                                            <span
                                                                class="font-medium text-green-600">Rp{{ number_format($booking->room->tipeRoom->harga_222320, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-gray-600">Kapasitas:</span>
                                                            <span
                                                                class="font-medium">{{ $booking->room->tipeRoom->kapasitas_222320 }}
                                                                orang</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Booking Details -->
                                    <div class="xl:col-span-1">
                                        <div class="bg-blue-50 rounded-lg p-4">
                                            <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h.01M16 11h.01M8 11h.01M8 15h.01M16 15h.01M8 19h.01M16 19h.01M12 19h.01M12 15h.01M12 11h.01">
                                                    </path>
                                                </svg>
                                                Detail Reservasi
                                            </h4>
                                            <div class="space-y-3">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-green-500 mr-3" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-4 8v2m-2-2h4m-4 0a2 2 0 01-2-2V9a2 2 0 012-2h4a2 2 0 012 2v6a2 2 0 01-2 2">
                                                        </path>
                                                    </svg>
                                                    <div>
                                                        <p class="text-sm text-gray-600">Check-in</p>
                                                        <p class="font-semibold">
                                                            {{ $booking->tanggal_checkin_222320->format('d F Y') }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-red-500 mr-3" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-4 8v2m-2-2h4m-4 0a2 2 0 01-2-2V9a2 2 0 012-2h4a2 2 0 012 2v6a2 2 0 01-2 2">
                                                        </path>
                                                    </svg>
                                                    <div>
                                                        <p class="text-sm text-gray-600">Check-out</p>
                                                        <p class="font-semibold">
                                                            {{ $booking->tanggal_checkout_222320->format('d F Y') }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-blue-500 mr-3" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0">
                                                        </path>
                                                    </svg>
                                                    <div>
                                                        <p class="text-sm text-gray-600">Jumlah Tamu</p>
                                                        <p class="font-semibold">{{ $booking->jumlah_tamu_222320 }} orang
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($booking->catatan_222320)
                                                <div class="mt-4 pt-4 border-t border-blue-200">
                                                    <p class="text-sm text-gray-600 mb-1">Catatan:</p>
                                                    <p class="text-sm bg-white p-2 rounded border">
                                                        {{ $booking->catatan_222320 }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Payment Status -->
                                    <div class="xl:col-span-1">
                                        @if ($booking->pembayaran)
                                            <div class="bg-green-50 rounded-lg p-4 h-full">
                                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Status Pembayaran
                                                </h4>
                                                <div class="space-y-3">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-sm text-gray-600">Status:</span>
                                                        <span
                                                            class="px-3 py-1 rounded-full text-sm font-medium
                                                            @if ($booking->pembayaran->status_pembayaran_222320 === 'pending') bg-yellow-100 text-yellow-800
                                                            @elseif($booking->pembayaran->status_pembayaran_222320 === 'berhasil') bg-green-100 text-green-800
                                                            @else bg-red-100 text-red-800 @endif">
                                                            {{ ucfirst($booking->pembayaran->status_pembayaran_222320) }}
                                                        </span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <span class="text-sm text-gray-600">Metode:</span>
                                                        <span
                                                            class="font-medium">{{ strtoupper($booking->pembayaran->metode_pembayaran_222320) }}</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <span class="text-sm text-gray-600">Tanggal Bayar:</span>
                                                        <span
                                                            class="font-medium">{{ \Carbon\Carbon::parse($booking->pembayaran->tanggal_pembayaran_222320)->format('d/m/Y H:i') }}</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <span class="text-sm text-gray-600">Jumlah:</span>
                                                        <span
                                                            class="font-bold text-green-600">Rp{{ number_format($booking->pembayaran->jumlah_bayar_222320, 0, ',', '.') }}</span>
                                                    </div>

                                                    @if ($booking->pembayaran->keterangan_222320)
                                                        <div class="pt-2 border-t border-green-200">
                                                            <p class="text-sm text-gray-600 mb-1">Keterangan:</p>
                                                            <p class="text-sm bg-white p-2 rounded border">
                                                                {{ $booking->pembayaran->keterangan_222320 }}</p>
                                                        </div>
                                                    @endif

                                                    @if ($booking->pembayaran->bukti_pembayaran_222320)
                                                        <div class="pt-2 border-t border-green-200">
                                                            <p class="text-sm text-gray-600 mb-2">Bukti Pembayaran:</p>
                                                            <img src="{{ asset('storage/' . $booking->pembayaran->bukti_pembayaran_222320) }}"
                                                                alt="Bukti Pembayaran"
                                                                class="w-full h-32 object-cover rounded-lg border cursor-pointer hover:opacity-80"
                                                                onclick="showImageModal('{{ asset('storage/' . $booking->pembayaran->bukti_pembayaran_222320) }}')">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            <!-- Payment Required -->
                                            <div x-data="{ openModal: false }" class="bg-red-50 rounded-lg p-4 h-full">
                                                <div class="text-center">
                                                    <div
                                                        class="w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center">
                                                        <svg class="w-8 h-8 text-red-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.664-.833-2.464 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <h4 class="text-lg font-bold text-red-800 mb-2">Pembayaran Diperlukan
                                                    </h4>
                                                    <p class="text-red-600 text-sm mb-6">Silakan lakukan pembayaran untuk
                                                        mengkonfirmasi reservasi Anda</p>

                                                    <button @click="openModal = true"
                                                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 font-medium flex items-center justify-center">
                                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                                            </path>
                                                        </svg>
                                                        Bayar Sekarang
                                                    </button>
                                                </div>

                                                <!-- Payment Modal -->
                                                <div x-show="openModal"
                                                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                                                    x-cloak>
                                                    <div @click.outside="openModal = false"
                                                        class="bg-white rounded-xl shadow-2xl w-full max-w-md mx-4 overflow-hidden">
                                                        <!-- Modal Header -->
                                                        <div
                                                            class="bg-gradient-to-r from-blue-600 to-purple-600 p-6 text-white">
                                                            <h2 class="text-xl font-bold">Upload Bukti Pembayaran QRIS</h2>
                                                        </div>

                                                        <div class="p-6">
                                                            <!-- Booking Summary -->
                                                            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                                                <div class="flex justify-between items-center mb-2">
                                                                    <span class="text-sm text-gray-600">ID Booking:</span>
                                                                    <span
                                                                        class="font-semibold">{{ $booking->id_booking_222320 }}</span>
                                                                </div>
                                                                <div class="flex justify-between items-center">
                                                                    <span class="text-sm text-gray-600">Total Bayar:</span>
                                                                    <span class="text-xl font-bold text-green-600">
                                                                        Rp{{ number_format($booking->total_harga_222320, 0, ',', '.') }}
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <!-- QRIS Code -->
                                                            <div class="text-center mb-6">
                                                                <p class="text-sm text-gray-600 mb-4">Scan QR Code untuk
                                                                    pembayaran:</p>
                                                                <div
                                                                    class="bg-white p-4 rounded-lg border-2 border-dashed border-gray-300 inline-block">
                                                                    <img src="{{ asset('images/qris.png') }}"
                                                                        alt="QRIS" class="w-32 h-32 mx-auto">
                                                                </div>
                                                            </div>

                                                            <!-- Upload Form -->
                                                            <form action="{{ route('pembayaran.store') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id_booking_222320"
                                                                    value="{{ $booking->id_booking_222320 }}">

                                                                <div class="mb-4">
                                                                    <label class="block mb-2 font-medium text-gray-700">
                                                                        Bukti Pembayaran <span
                                                                            class="text-red-500">*</span>
                                                                    </label>
                                                                    <input type="file" name="bukti_pembayaran_222320"
                                                                        class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                        accept="image/*" required>
                                                                    <p class="text-xs text-gray-500 mt-1">Format: JPG,
                                                                        JPEG, PNG. Maksimal 2MB</p>
                                                                </div>

                                                                <div class="mb-6">
                                                                    <label
                                                                        class="block mb-2 font-medium text-gray-700">Keterangan
                                                                        (opsional)
                                                                    </label>
                                                                    <textarea name="keterangan_222320" rows="3"
                                                                        class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                        placeholder="Catatan tambahan..."></textarea>
                                                                </div>

                                                                <div class="flex space-x-3">
                                                                    <button type="button" @click="openModal = false"
                                                                        class="flex-1 px-4 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 font-medium">
                                                                        Batal
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="flex-1 px-4 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 font-medium flex items-center justify-center">
                                                                        <svg class="w-4 h-4 mr-2" fill="none"
                                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M5 13l4 4L19 7"></path>
                                                                        </svg>
                                                                        Kirim Pembayaran
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden items-center justify-center">
        <div class="max-w-4xl max-h-screen p-4">
            <div class="relative">
                <img id="modalImage" src="" alt="Bukti Pembayaran"
                    class="max-w-full max-h-screen rounded-lg shadow-2xl">
                <button onclick="hideImageModal()"
                    class="absolute top-4 right-4 bg-white text-black rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-100 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        function showImageModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function hideImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('imageModal').classList.remove('flex');
        }

        // Close modal with ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideImageModal();
            }
        });

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideImageModal();
            }
        });
    </script>
@endsection
