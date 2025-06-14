@extends('layouts.dashboard-layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                        <h1 class="text-3xl font-bold text-white flex items-center gap-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Laporan Reservasi
                        </h1>
                        <p class="text-blue-100 mt-2">Generate dan kelola laporan reservasi hotel</p>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-200 mb-8">
                <div class="p-8">
                    <h2 class="text-xl font-semibold text-slate-800 mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter Laporan
                    </h2>

                    <form action="{{ route('admin.reservasi.laporan') }}" method="GET" id="filterForm">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Tanggal Mulai -->
                            <div class="space-y-2">
                                <label for="tanggal_mulai" class="block text-sm font-medium text-slate-700">
                                    Tanggal Mulai
                                </label>
                                <div class="relative">
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                        value="{{ request('tanggal_mulai') }}"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                </div>
                            </div>

                            <!-- Tanggal Akhir -->
                            <div class="space-y-2">
                                <label for="tanggal_akhir" class="block text-sm font-medium text-slate-700">
                                    Tanggal Akhir
                                </label>
                                <div class="relative">
                                    <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                        value="{{ request('tanggal_akhir') }}"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700">
                                    Aksi
                                </label>
                                <div class="flex gap-3">
                                    <button type="submit"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                        </svg>
                                        Filter
                                    </button>
                                    <button type="button" onclick="resetForm()"
                                        class="px-4 py-3 bg-slate-500 hover:bg-slate-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Results Section - Always Visible -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-200">
                <div class="p-6 border-b border-slate-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-semibold text-slate-800">Data Reservasi</h3>
                            <p class="text-slate-600 mt-1">
                                @if (request('tanggal_mulai') && request('tanggal_akhir'))
                                    Periode: {{ request('tanggal_mulai') }} s/d {{ request('tanggal_akhir') }}
                                    • Total: <span class="font-semibold">{{ $bookings->count() }}</span> reservasi
                                @else
                                    Menampilkan semua data reservasi
                                    • Total: <span class="font-semibold">{{ $bookings->count() }}</span> reservasi
                                @endif
                            </p>
                        </div>

                        @if ($bookings->count() > 0)
                            <div class="flex gap-3">
                                <!-- Download PDF Button -->
                                <form action="{{ route('admin.reservasi.laporan') }}" method="GET" class="inline">
                                    @if (request('tanggal_mulai'))
                                        <input type="hidden" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
                                    @endif
                                    @if (request('tanggal_akhir'))
                                        <input type="hidden" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                                    @endif
                                    <input type="hidden" name="format" value="pdf">
                                    <input type="hidden" name="download" value="1">
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Export PDF
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="p-6">
                    @if ($bookings->count() > 0)
                        <!-- Summary Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-blue-600 rounded-lg">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-blue-600 text-sm font-medium">Total Reservasi</p>
                                        <p class="text-2xl font-bold text-blue-800">{{ $bookings->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-green-600 rounded-lg">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-green-600 text-sm font-medium">Total Pendapatan</p>
                                        <p class="text-xl font-bold text-green-800">Rp
                                            {{ number_format($bookings->sum('total_harga_222320'), 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-4 rounded-xl border border-yellow-200">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-yellow-600 rounded-lg">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-yellow-600 text-sm font-medium">Pending</p>
                                        <p class="text-2xl font-bold text-yellow-800">
                                            {{ $bookings->where('status_222320', 'pending')->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-purple-600 rounded-lg">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-purple-600 text-sm font-medium">Confirmed</p>
                                        <p class="text-2xl font-bold text-purple-800">
                                            {{ $bookings->where('status_222320', 'confirmed')->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Table -->
                        <div class="overflow-hidden rounded-xl border border-slate-200">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-slate-200">
                                    <thead class="bg-slate-50">
                                        <tr>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                ID Booking
                                            </th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                User
                                            </th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                Room Type
                                            </th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                Check-in
                                            </th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                Check-out
                                            </th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                Total Harga
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-200">
                                        @foreach ($bookings as $booking)
                                            <tr class="hover:bg-slate-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                                    #{{ $booking->id_booking_222320 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                                    {{ $booking->user->nama_222320 ?? 'N/A' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                                    {{ $booking->room->tipeRoom->nama_tipe_222320 ?? 'N/A' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                                    {{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                                    {{ \Carbon\Carbon::parse($booking->tanggal_checkout_222320)->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @php
                                                        $statusColors = [
                                                            'pending' =>
                                                                'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                            'confirmed' =>
                                                                'bg-green-100 text-green-800 border-green-200',
                                                            'cancelled' => 'bg-red-100 text-red-800 border-red-200',
                                                            'completed' => 'bg-blue-100 text-blue-800 border-blue-200',
                                                        ];
                                                    @endphp
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border {{ $statusColors[$booking->status_222320] ?? 'bg-gray-100 text-gray-800 border-gray-200' }}">
                                                        {{ ucfirst($booking->status_222320) }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-slate-900">
                                                    Rp {{ number_format($booking->total_harga_222320, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-slate-900">Tidak ada data</h3>
                            <p class="mt-1 text-sm text-slate-500">Tidak ada reservasi ditemukan untuk rentang tanggal yang
                                dipilih.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function resetForm() {
            document.getElementById('filterForm').reset();
            window.location.href = "{{ route('admin.reservasi.laporan') }}";
        }

        // Set minimum date for tanggal_akhir
        document.getElementById('tanggal_mulai').addEventListener('change', function() {
            const tanggalAkhir = document.getElementById('tanggal_akhir');
            if (tanggalAkhir) {
                tanggalAkhir.min = this.value;
            }
        });
    </script>
@endsection
