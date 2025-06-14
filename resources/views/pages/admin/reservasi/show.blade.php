@extends('layouts.dashboard-layout')

@section('content')
    <div class="rounded-xl w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Detail Reservasi #{{ $booking->id_booking_222320 }}</h1>
            <a href="{{ route('admin.reservasi.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Daftar</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-4">
            <!-- Main Details -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md space-y-6">
                <!-- Booking Info -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-3">Informasi Booking</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <p><strong class="text-gray-600">Tgl Booking:</strong>
                            {{ \Carbon\Carbon::parse($booking->tanggal_booking_222320)->format('d M Y, H:i') }}</p>
                        <p><strong class="text-gray-600">Tgl Check-in:</strong>
                            {{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->format('d M Y') }}</p>
                        <p><strong class="text-gray-600">Tgl Check-out:</strong>
                            {{ \Carbon\Carbon::parse($booking->tanggal_checkout_222320)->format('d M Y') }}</p>
                        <p><strong class="text-gray-600">Jumlah Malam:</strong>
                            {{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->diffInDays($booking->tanggal_checkout_222320) }}
                        </p>
                        <p><strong class="text-gray-600">Total Harga:</strong> Rp
                            {{ number_format($booking->total_harga_222320, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Guest & Room Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-3">Informasi Tamu</h3>
                        <div class="space-y-2 text-sm">
                            <p><strong class="text-gray-600">Nama:</strong> {{ $booking->user->nama_222320 ?? 'N/A' }}</p>
                            <p><strong class="text-gray-600">Email:</strong> {{ $booking->user->email_222320 ?? 'N/A' }}</p>
                            <p><strong class="text-gray-600">Jumlah Tamu:</strong> {{ $booking->jumlah_tamu_222320 }} orang
                            </p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-3">Informasi Kamar</h3>
                        <div class="space-y-2 text-sm">
                            <p><strong class="text-gray-600">Nama Kamar:</strong> {{ $booking->room->nama_kamar_222320 }}
                            </p>
                            <p><strong class="text-gray-600">Tipe Kamar:</strong>
                                {{ $booking->room->tipeRoom->nama_tipe_222320 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-3">Catatan</h3>
                    <p class="text-sm text-gray-700 bg-gray-50 p-3 rounded-md"><strong>Tamu:</strong>
                        {{ $booking->catatan_222320 ?: '-' }}</p>
                    <p class="text-sm text-gray-700 bg-gray-50 p-3 rounded-md mt-2"><strong>Admin:</strong>
                        {{ $booking->catatan_admin_222320 ?: '-' }}</p>
                </div>
            </div>

            <!-- Action Panel -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Update Status</h3>
                <div class="mb-4">
                    <p class="text-sm font-bold">Status Saat Ini:</p>
                    <span
                        class="px-3 py-1 font-semibold leading-tight text-base rounded-full
                    @if ($booking->status_222320 == 'dikonfirmasi') bg-green-100 text-green-800
                    @elseif($booking->status_222320 == 'checkin') bg-blue-100 text-blue-800
                    @elseif($booking->status_222320 == 'checkout') bg-gray-100 text-gray-800
                    @elseif($booking->status_222320 == 'dibatalkan') bg-red-100 text-red-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                        {{ Str::title(str_replace('_', ' ', $booking->status_222320)) }}
                    </span>
                </div>

                <form action="{{ route('admin.reservasi.updateStatus', $booking->id_booking_222320) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        @if (session('error'))
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 mx-4" role="alert">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Ubah Status
                                Menjadi</label>
                            <select id="status" name="status"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option value="menunggu_konfirmasi"
                                    {{ $booking->status_222320 == 'menunggu_konfirmasi' ? 'selected' : '' }}>Menunggu
                                    Konfirmasi</option>
                                <option value="dikonfirmasi"
                                    {{ $booking->status_222320 == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                                <option value="checkin" {{ $booking->status_222320 == 'checkin' ? 'selected' : '' }}>
                                    Check-in</option>
                                <option value="checkout" {{ $booking->status_222320 == 'checkout' ? 'selected' : '' }}>
                                    Checkout</option>
                                <option value="dibatalkan" {{ $booking->status_222320 == 'dibatalkan' ? 'selected' : '' }}>
                                    Dibatalkan</option>
                            </select>
                        </div>
                        <div>
                            <label for="catatan_admin" class="block text-sm font-medium text-gray-700">Catatan Admin
                                (Opsional)</label>
                            <textarea id="catatan_admin" name="catatan_admin" rows="3"
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">{{ $booking->catatan_admin_222320 }}</textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
