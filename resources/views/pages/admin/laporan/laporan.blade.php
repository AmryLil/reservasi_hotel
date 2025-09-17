@extends('layouts.dashboard-layout')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
        <div class="max-w-7xl mx-auto">
            {{-- Bagian Header Halaman --}}
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

            {{-- Bagian Form Filter --}}
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
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 items-end">
                            <div class="space-y-2 md:col-span-1">
                                <label for="filter_type" class="block text-sm font-medium text-slate-700">Jenis
                                    Filter</label>
                                <select name="filter_type" id="filter_type" onchange="toggleFilterInputs()"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="harian" @if (request('filter_type') == 'harian') selected @endif>Harian</option>
                                    <option value="mingguan" @if (request('filter_type') == 'mingguan') selected @endif>Mingguan
                                    </option>
                                    <option value="bulanan" @if (request('filter_type') == 'bulanan') selected @endif>Bulanan
                                    </option>
                                    <option value="tahunan" @if (request('filter_type') == 'tahunan') selected @endif>Tahunan
                                    </option>
                                    <option value="custom" @if (request('filter_type') == 'custom') selected @endif>Rentang Tanggal
                                    </option>
                                </select>
                            </div>

                            <div id="dynamic-inputs"
                                class="grid grid-cols-1 md:grid-cols-2 gap-6 md:col-span-2 lg:col-span-3 items-end w-full">
                                <div id="harian-input" class="filter-input space-y-2" style="display:none;">
                                    <label for="tanggal" class="block text-sm font-medium text-slate-700">Tanggal</label>
                                    <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                </div>
                                <div id="mingguan-input" class="filter-input space-y-2" style="display:none;">
                                    <label for="minggu" class="block text-sm font-medium text-slate-700">Pilih Tanggal di
                                        Minggu</label>
                                    <input type="date" name="minggu" value="{{ request('minggu') }}"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                </div>
                                <div id="bulanan-input" class="filter-input grid grid-cols-2 gap-6 w-full md:col-span-2"
                                    style="display:none;">
                                    <div class="space-y-2">
                                        <label for="bulan" class="block text-sm font-medium text-slate-700">Bulan</label>
                                        <select name="bulan"
                                            class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}"
                                                    @if (request('bulan') == $i) selected @endif>
                                                    {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label for="tahun_bulan"
                                            class="block text-sm font-medium text-slate-700">Tahun</label>
                                        <input type="number" name="tahun_bulan"
                                            value="{{ request('tahun_bulan', date('Y')) }}" placeholder="e.g. 2024"
                                            class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                    </div>
                                </div>
                                <div id="tahunan-input" class="filter-input space-y-2" style="display:none;">
                                    <label for="tahun" class="block text-sm font-medium text-slate-700">Tahun</label>
                                    <input type="number" name="tahun" value="{{ request('tahun', date('Y')) }}"
                                        placeholder="e.g. 2024"
                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                </div>
                                <div id="custom-input" class="filter-input grid grid-cols-2 gap-6 w-full md:col-span-2"
                                    style="display:none;">
                                    <div class="space-y-2">
                                        <label for="tanggal_mulai" class="block text-sm font-medium text-slate-700">Tanggal
                                            Mulai</label>
                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                            value="{{ request('tanggal_mulai') }}"
                                            class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                    </div>
                                    <div class="space-y-2">
                                        <label for="tanggal_akhir"
                                            class="block text-sm font-medium text-slate-700">Tanggal Akhir</label>
                                        <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                            value="{{ request('tanggal_akhir') }}"
                                            class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-blue-400 transition-colors">
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-end space-y-2">
                                <div class="flex gap-3 w-full">
                                    <button type="submit"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                        </svg>
                                        Filter
                                    </button>
                                    <button type="button" onclick="resetForm()"
                                        class="p-3 bg-slate-500 hover:bg-slate-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200"
                                        title="Reset Filter">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Bagian Hasil Laporan --}}
            @if ($showResults)
                <div class="bg-white rounded-2xl shadow-lg border border-slate-200">
                    <div class="p-6 border-b border-slate-200">
                        <div class="flex flex-wrap justify-between items-center gap-4">
                            <div>
                                <h3 class="text-xl font-semibold text-slate-800">Data Reservasi</h3>
                                <p class="text-slate-600 mt-1">
                                    @switch(request('filter_type'))
                                        @case('harian')
                                            Laporan Harian untuk: <span
                                                class="font-semibold">{{ \Carbon\Carbon::parse(request('tanggal'))->translatedFormat('d F Y') }}</span>
                                        @break

                                        @case('mingguan')
                                            Laporan Mingguan untuk: <span
                                                class="font-semibold">{{ \Carbon\Carbon::parse(request('minggu'))->startOfWeek()->translatedFormat('d M Y') }}
                                                -
                                                {{ \Carbon\Carbon::parse(request('minggu'))->endOfWeek()->translatedFormat('d M Y') }}</span>
                                        @break

                                        @case('bulanan')
                                            Laporan Bulanan untuk: <span
                                                class="font-semibold">{{ \Carbon\Carbon::create()->month((int) request('bulan'))->translatedFormat('F') }}
                                                {{ request('tahun_bulan') }}</span>
                                        @break

                                        @case('tahunan')
                                            Laporan Tahunan untuk: <span class="font-semibold">{{ request('tahun') }}</span>
                                        @break

                                        @case('custom')
                                            Periode: <span
                                                class="font-semibold">{{ \Carbon\Carbon::parse(request('tanggal_mulai'))->translatedFormat('d M Y') }}
                                                s/d
                                                {{ \Carbon\Carbon::parse(request('tanggal_akhir'))->translatedFormat('d M Y') }}</span>
                                        @break

                                        @default
                                            Menampilkan semua data reservasi
                                    @endswitch
                                    • Total: <span class="font-semibold">{{ $bookings->count() }}</span> reservasi
                                </p>
                            </div>

                            {{-- [PERUBAHAN] Tombol Ekspor yang Lebih Baik --}}
                            <div class="flex items-center gap-3">
                                @if ($bookings->isNotEmpty())
                                    <a href="{{ route('admin.reservasi.laporan', array_merge(request()->query(), ['format' => 'pdf'])) }}"
                                        target="_blank"
                                        class="bg-red-100 hover:bg-red-200 text-red-700 font-semibold px-4 py-2 rounded-lg shadow-sm border border-red-200 hover:shadow-md transition-all duration-200 flex items-center gap-2 text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Export Hasil Filter (PDF)
                                    </a>
                                @endif
                                <a href="{{ route('admin.reservasi.laporan', ['format' => 'pdf']) }}" target="_blank"
                                    class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-4 py-2 rounded-lg shadow-sm border border-gray-800 hover:shadow-md transition-all duration-200 flex items-center gap-2 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Export Semua Data (PDF)
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        @if ($bookings->isNotEmpty())
                            {{-- [PERUBAHAN] Grid Statistik yang Diperkaya --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5 mb-6">
                                <div
                                    class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-green-600 rounded-lg"><svg class="w-5 h-5 text-white"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                            </svg></div>
                                        <div>
                                            <p class="text-green-600 text-sm font-medium">Total Pendapatan</p>
                                            <p class="text-xl font-bold text-green-800">Rp
                                                {{ number_format($bookings->where('status_222320', '!=', 'dibatalkan')->sum('total_harga_222320'), 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-4 rounded-xl border border-cyan-200">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-cyan-600 rounded-lg"><svg class="w-5 h-5 text-white"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg></div>
                                        <div>
                                            <p class="text-cyan-600 text-sm font-medium">Reservasi Sukses</p>
                                            <p class="text-xl font-bold text-cyan-800">{{ $successfulBookingsCount ?? 0 }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl border border-orange-200">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-orange-600 rounded-lg"><svg class="w-5 h-5 text-white"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg></div>
                                        <div>
                                            <p class="text-orange-600 text-sm font-medium">Reservasi Dibatalkan</p>
                                            <p class="text-xl font-bold text-orange-800">
                                                {{ $cancelledBookingsCount ?? 0 }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-4 rounded-xl border border-indigo-200">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-indigo-600 rounded-lg"><svg class="w-5 h-5 text-white"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v1h2a1 1 0 011 1v3a1 1 0 01-1 1h-2v1a2 2 0 01-2 2H7a2 2 0 01-2-2v-1H3a1 1 0 01-1-1V7a1 1 0 011-1h2V5z">
                                                </path>
                                            </svg></div>
                                        <div>
                                            <p class="text-indigo-600 text-sm font-medium">Kamar Terlaris</p>
                                            <p class="text-xl font-bold text-indigo-800">
                                                {{ $topBookedRoom->nama_kamar_222320 ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gradient-to-br from-rose-50 to-rose-100 p-4 rounded-xl border border-rose-200">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-rose-600 rounded-lg"><svg class="w-5 h-5 text-white"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg></div>
                                        <div>
                                            <p class="text-rose-600 text-sm font-medium">Tipe Kamar Terlaris</p>
                                            <p class="text-xl font-bold text-rose-800">
                                                {{ $topBookedTipeRoom->nama_tipe_222320 ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gradient-to-br from-teal-50 to-teal-100 p-4 rounded-xl border border-teal-200">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-teal-600 rounded-lg"><svg class="w-5 h-5 text-white"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg></div>
                                        <div>
                                            <p class="text-teal-600 text-sm font-medium">Pelanggan Teratas</p>
                                            <p class="text-xl font-bold text-teal-800">
                                                {{ $topCustomer->nama_222320 ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden rounded-xl border border-slate-200">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-slate-200">
                                        <thead class="bg-slate-100">
                                            <tr>
                                                <th
                                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                    ID Booking</th>
                                                <th
                                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                    User</th>
                                                <th
                                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                    Kamar & Tipe</th>
                                                <th
                                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                    Check-in</th>
                                                <th
                                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                    Check-out</th>
                                                <th
                                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                    Status</th>
                                                <th
                                                    class="px-6 py-4 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                                                    Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-slate-200">
                                            @foreach ($bookings as $booking)
                                                <tr class="hover:bg-slate-50 transition-colors">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                                        #{{ substr($booking->id_booking_222320, -8) }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                                        {{ $booking->user->nama_222320 ?? 'N/A' }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                                        <div class="font-medium">
                                                            {{ $booking->room->nama_kamar_222320 ?? 'N/A' }}</div>
                                                        <div class="text-slate-500">
                                                            {{ $booking->room->tipeRoom->nama_tipe_222320 ?? 'N/A' }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                                        {{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->format('d M Y') }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                                        {{ \Carbon\Carbon::parse($booking->tanggal_checkout_222320)->format('d M Y') }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span
                                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border bg-{{ $booking->status_badge ?? 'gray' }}-100 text-{{ $booking->status_badge ?? 'gray' }}-800 border-{{ $booking->status_badge ?? 'gray' }}-200">
                                                            {{ $booking->status_label ?? $booking->status_222320 }}
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
                                <h3 class="mt-2 text-sm font-medium text-slate-900">Tidak Ada Data Ditemukan</h3>
                                <p class="mt-1 text-sm text-slate-500">Tidak ada reservasi yang cocok dengan filter yang
                                    dipilih.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="bg-white rounded-2xl shadow-lg border border-slate-200 text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                        </path>
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-slate-900">Silakan Pilih Filter</h3>
                    <p class="mt-1 text-sm text-slate-500">Pilih jenis filter di atas untuk menampilkan laporan reservasi.
                    </p>
                </div>
            @endif
        </div>
    </div>

    <script>
        function resetForm() {
            window.location.href = "{{ route('admin.reservasi.laporan') }}";
        }

        function toggleFilterInputs() {
            document.querySelectorAll('.filter-input').forEach(div => {
                div.style.display = 'none';
            });

            const selectedFilter = document.getElementById('filter_type').value;
            if (selectedFilter) {
                const selectedDiv = document.getElementById(selectedFilter + '-input');
                if (selectedDiv) {
                    selectedDiv.style.display = (selectedFilter === 'bulanan' || selectedFilter === 'custom') ? 'grid' :
                        'block';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleFilterInputs();

            const startDateInput = document.getElementById('tanggal_mulai');
            const endDateInput = document.getElementById('tanggal_akhir');

            if (startDateInput && endDateInput) {
                startDateInput.addEventListener('change', function() {
                    endDateInput.min = this.value;
                });
            }
        });
    </script>
@endsection
