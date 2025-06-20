@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Detail Kamar</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.rooms.edit', $room->id_room_222320) }}">
                    <button
                        class="bg-yellow-500 text-white hover:bg-yellow-600 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </button>
                </a>
                <a href="{{ route('admin.rooms.index') }}">
                    <button
                        class="bg-gray-500 text-white hover:bg-gray-600 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Kembali
                    </button>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-b-xl shadow-md p-6">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    <div class="rounded-lg overflow-hidden shadow-md">
                        @if ($room->gambar_222320)
                            <img src="{{ Storage::url($room->gambar_222320) }}" alt="{{ $room->nama_kamar_222320 }}"
                                class="w-full h-64 object-cover">
                        @else
                            <div class="bg-gray-200 w-full h-64 flex items-center justify-center">
                                <span class="text-gray-500">No Image Available</span>
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <div
                            class="inline-block px-3 py-1 mb-2 rounded-full 
                            @if ($room->status_222320 == 'available') bg-green-100 text-green-800 
                            @elseif($room->status_222320 == 'booked') bg-red-100 text-red-800 
                            @else bg-yellow-100 text-yellow-800 @endif">
                            <span class="font-semibold">{{ ucfirst($room->status_222320) }}</span>
                        </div>

                        <div class="mt-2">
                            <form action="{{ route('admin.rooms.changeStatus', $room->id_room_222320) }}" method="POST"
                                class="flex items-end space-x-2">
                                @csrf
                                <div class="flex-grow">
                                    <label for="status_222320" class="block text-sm font-medium text-gray-700 mb-1">Ubah
                                        Status</label>
                                    <select name="status_222320" id="status_222320"
                                        class="border-2 border-blue-200 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        <option value="available"
                                            {{ $room->status_222320 == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="booked" {{ $room->status_222320 == 'booked' ? 'selected' : '' }}>
                                            Booked</option>
                                        <option value="maintenance"
                                            {{ $room->status_222320 == 'maintenance' ? 'selected' : '' }}>Maintenance
                                        </option>
                                    </select>
                                </div>
                                <button type="submit"
                                    class="bg-blue-600 text-white hover:bg-blue-700 font-semibold px-3 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
                        <h2 class="text-xl font-bold text-blue-800 mb-4">Informasi Kamar</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                            <div>
                                <h3 class="text-gray-500 text-sm">Nama Kamar</h3>
                                <p class="font-semibold text-lg">{{ $room->nama_kamar_222320 }}</p>
                            </div>
                            <div>
                                <h3 class="text-gray-500 text-sm">Tipe Kamar</h3>
                                <p class="font-semibold text-lg">{{ $room->tipeRoom->nama_tipe_222320 }}</p>
                            </div>
                            <div>
                                <h3 class="text-gray-500 text-sm">Harga</h3>
                                <p class="font-semibold text-lg">Rp
                                    {{ number_format($room->tipeRoom->harga_222320, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <h3 class="text-gray-500 text-sm">Kapasitas</h3>
                                <p class="font-semibold text-lg">{{ $room->tipeRoom->kapasitas_222320 }} Orang</p>
                            </div>
                            <div>
                                <h3 class="text-gray-500 text-sm">Fasilitas</h3>
                                <p class="font-semibold">{{ $room->tipeRoom->fasilitas_222320 }}</p>
                            </div>
                        </div>
                    </div>

                    @if ($room->bookings && $room->bookings->count() > 0)
                        <div class="mt-6 bg-gray-50 rounded-lg p-6 shadow-sm">
                            <h2 class="text-xl font-bold text-blue-800 mb-4">Riwayat Booking</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th
                                                class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Booking ID
                                            </th>
                                            <th
                                                class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Tamu
                                            </th>
                                            <th
                                                class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Check In
                                            </th>
                                            <th
                                                class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Check Out
                                            </th>
                                            <th
                                                class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($room->bookings as $booking)
                                            <tr>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    #{{ $booking->booking_id_222320 }}
                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    {{ $booking->tamu->nama_tamu_222320 ?? 'N/A' }}
                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    {{ \Carbon\Carbon::parse($booking->check_in_222320)->format('d M Y') }}
                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    {{ \Carbon\Carbon::parse($booking->check_out_222320)->format('d M Y') }}
                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if ($booking->status_222320 == 'confirmed') bg-green-100 text-green-800 
                                                @elseif($booking->status_222320 == 'canceled') bg-red-100 text-red-800 
                                                @elseif($booking->status_222320 == 'checked_in') bg-blue-100 text-blue-800
                                                @elseif($booking->status_222320 == 'checked_out') bg-gray-100 text-gray-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                        {{ str_replace('_', ' ', ucfirst($booking->status_222320)) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    <div class="mt-6 flex justify-end space-x-2">
                        <form action="{{ route('admin.rooms.destroy', $room->id_room_222320) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this room?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white hover:bg-red-700 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus Kamar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
