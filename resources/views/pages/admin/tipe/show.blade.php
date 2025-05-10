@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl pt-20 w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Detail Tipe Kamar</h1>
            <a href="{{ route('admin.tiperoom.index') }}">
                <button
                    class="bg-gray-500 text-white hover:bg-gray-600 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Kembali
                </button>
            </a>
        </div>

        <div class="bg-white rounded-b-xl shadow-md p-6">
            <!-- Info Card -->
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Kolom Kiri - Informasi Dasar -->
                <div class="w-full md:w-2/3 space-y-6">
                    <div class="border rounded-lg p-4 bg-blue-50">
                        <h2 class="text-xl font-bold text-blue-800 mb-4 border-b pb-2">Informasi Tipe Kamar</h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-600 text-sm">ID Tipe</p>
                                <p class="font-semibold">{{ $tipeRoom->tipe_id_222320 }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">Nama Tipe</p>
                                <p class="font-semibold">{{ $tipeRoom->nama_tipe_222320 }}</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-600 text-sm">Harga</p>
                            <p class="font-semibold text-lg text-blue-700">Rp
                                {{ number_format($tipeRoom->harga_222320, 0, ',', '.') }}</p>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-600 text-sm">Deskripsi</p>
                            <p class="mt-1">{{ $tipeRoom->deskripsi_222320 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan - Fasilitas & Aksi -->
                <div class="w-full md:w-1/3 space-y-6">
                    <!-- Fasilitas Card -->
                    <div class="border rounded-lg p-4 bg-green-50">
                        <h2 class="text-xl font-bold text-green-800 mb-4 border-b border-green-100 pb-2">Fasilitas</h2>
                        <ul class="list-disc list-inside space-y-2">
                            @foreach ($fasilitas as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="border rounded-lg p-4 bg-gray-50">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 border-b border-gray-100 pb-2">Aksi</h2>
                        <div class="flex flex-col space-y-2">
                            <a href="{{ route('admin.tiperoom.edit', $tipeRoom->tipe_id_222320) }}"
                                class="bg-yellow-500 text-white hover:bg-yellow-600 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit Tipe Kamar
                            </a>
                            <form action="{{ route('admin.tiperoom.destroy', $tipeRoom->tipe_id_222320) }}" method="POST"
                                onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full bg-red-500 text-white hover:bg-red-600 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Hapus Tipe Kamar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Rooms -->
            <div class="mt-8 border rounded-lg p-4">
                <h2 class="text-xl font-bold text-blue-800 mb-4 border-b pb-2">Kamar dengan Tipe Ini</h2>

                @if ($tipeRoom->rooms->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($tipeRoom->rooms as $room)
                            <div class="border rounded-lg p-4 hover:bg-blue-50 transition">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold">{{ $room->nama_kamar_222320 }}</h3>
                                        <p class="text-sm text-gray-600">
                                            @if ($room->status_222320 == 'available')
                                                <span class="text-green-600">● Tersedia</span>
                                            @elseif($room->status_222320 == 'booked')
                                                <span class="text-red-600">● Terpesan</span>
                                            @else
                                                <span class="text-yellow-600">● Maintenance</span>
                                            @endif
                                        </p>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <p>Belum ada kamar yang menggunakan tipe ini</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm(
                'Apakah Anda yakin ingin menghapus tipe kamar ini? Ini akan mempengaruhi semua kamar yang memiliki tipe ini.'
            );
        }
    </script>
@endsection
