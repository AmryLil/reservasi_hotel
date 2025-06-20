@extends('layouts.dashboard-layout')

@section('content')
    <div class="rounded-xl w-full">
        <!-- Header -->
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Kelola Data Reservasi</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 mx-4" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="p-4 bg-white rounded-b-xl shadow-md">
            <!-- Filter and Search Form -->
            <form method="GET" action="{{ route('admin.reservasi.index') }}" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <input type="text" name="search" placeholder="Cari ID booking / nama..."
                        value="{{ request('search') }}"
                        class="border-2 border-blue-200 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <select name="status"
                        class="border-2 border-blue-200 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Status</option>
                        <option value="menunggu_konfirmasi"
                            {{ request('status') == 'menunggu_konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                        <option value="dikonfirmasi" {{ request('status') == 'dikonfirmasi' ? 'selected' : '' }}>
                            Dikonfirmasi</option>
                        <option value="checkin" {{ request('status') == 'checkin' ? 'selected' : '' }}>Check-in</option>
                        <option value="checkout" {{ request('status') == 'checkout' ? 'selected' : '' }}>Checkout</option>
                        <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan
                        </option>
                    </select>

                    <input type="date" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}"
                        class="border-2 border-blue-200 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <div class="flex gap-2">
                        <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}"
                            class="border-2 border-blue-200 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex-grow">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Filter</button>
                    </div>
                </div>
            </form>

            <!-- Reservations Table -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse rounded-xl overflow-hidden shadow-sm">
                    <thead class="bg-blue-600 text-white text-sm">
                        <tr>
                            <th class="py-3 px-4 text-left">ID Booking</th>
                            <th class="py-3 px-4 text-left">Tamu</th>
                            <th class="py-3 px-4 text-left">Kamar</th>
                            <th class="py-3 px-4 text-left">Check-in</th>
                            <th class="py-3 px-4 text-left">Check-out</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @forelse($bookings as $booking)
                            <tr class="odd:bg-white even:bg-blue-50 hover:bg-blue-100">
                                <td class="py-3 px-4 font-mono">{{ $booking->id_booking_222320 }}</td>
                                <td class="py-3 px-4">{{ $booking->user->nama_222320 ?? 'N/A' }}</td>
                                <td class="py-3 px-4">{{ $booking->room->nama_kamar_222320 }}</td>
                                <td class="py-3 px-4">
                                    {{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->format('d M Y') }}</td>
                                <td class="py-3 px-4">
                                    {{ \Carbon\Carbon::parse($booking->tanggal_checkout_222320)->format('d M Y') }}</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-xs rounded-full
                                    @if ($booking->status_222320 == 'dikonfirmasi') bg-green-100 text-green-800
                                    @elseif($booking->status_222320 == 'checkin') bg-blue-100 text-blue-800
                                    @elseif($booking->status_222320 == 'checkout') bg-gray-100 text-gray-800
                                    @elseif($booking->status_222320 == 'dibatalkan') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ Str::title(str_replace('_', ' ', $booking->status_222320)) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <a href="{{ route('admin.reservasi.show', $booking->id_booking_222320) }}"
                                        class="text-blue-600 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-6 px-4 text-center text-gray-500">Tidak ada data reservasi
                                    ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $bookings->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
