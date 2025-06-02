@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Edit Tipe Kamar</h1>
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
            <form action="{{ route('admin.tiperoom.update', $tipeRoom->tipe_id_222320) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- ID Tipe -->
                    <div>
                        <label for="tipe_id_222320" class="block text-sm font-medium text-gray-700 mb-1">ID Tipe
                            Kamar</label>
                        <input type="text" id="tipe_id_222320"
                            class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm"
                            value="{{ $tipeRoom->tipe_id_222320 }}" readonly disabled>
                    </div>

                    <!-- Nama Tipe -->
                    <div>
                        <label for="nama_tipe_222320" class="block text-sm font-medium text-gray-700 mb-1">Nama Tipe
                            Kamar</label>
                        <input type="text" name="nama_tipe_222320" id="nama_tipe_222320" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('nama_tipe_222320') border-red-500 @enderror"
                            value="{{ old('nama_tipe_222320', $tipeRoom->nama_tipe_222320) }}"
                            placeholder="Masukkan nama tipe kamar">
                        @error('nama_tipe_222320')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Harga -->
                <div>
                    <label for="harga_222320" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">Rp</span>
                        <input type="number" name="harga_222320" id="harga_222320" required min="0" step="10000"
                            class="w-full pl-10 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('harga_222320') border-red-500 @enderror"
                            value="{{ old('harga_222320', $tipeRoom->harga_222320) }}" placeholder="Masukkan harga">
                    </div>
                    @error('harga_222320')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi_222320" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi_222320" id="deskripsi_222320" rows="4" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('deskripsi_222320') border-red-500 @enderror"
                        placeholder="Masukkan deskripsi tipe kamar">{{ old('deskripsi_222320', $tipeRoom->deskripsi_222320) }}</textarea>
                    @error('deskripsi_222320')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fasilitas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fasilitas</label>
                    <div id="fasilitas-container" class="space-y-3">
                        @php
                            $fasilitasArray = explode(',', $tipeRoom->fasilitas_222320);
                        @endphp

                        @foreach ($fasilitasArray as $index => $fasilitas)
                            <div class="flex items-center space-x-2">
                                <input type="text" name="fasilitas_222320[]" required
                                    class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                    value="{{ $fasilitas }}" placeholder="Masukkan fasilitas">
                                @if ($index === 0)
                                    <button type="button" onclick="tambahFasilitas()"
                                        class="bg-green-500 text-white p-2 rounded-lg hover:bg-green-600 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @else
                                    <button type="button" onclick="hapusFasilitas(this)"
                                        class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Kapasitas -->
                <div>
                    <label for="kapasitas_222320" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas</label>
                    <input type="number" name="kapasitas_222320" id="kapasitas_222320" required min="1"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('kapasitas_222320') border-red-500 @enderror"
                        value="{{ old('kapasitas_222320', $tipeRoom->kapasitas_222320) }}"
                        placeholder="Masukkan kapasitas kamar">
                    @error('kapasitas_222320')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status_222320" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status_222320" id="status_222320" required
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('status_222320') border-red-500 @enderror">
                        <option value="tersedia"
                            {{ old('status_222320', $tipeRoom->status_222320) == 'tersedia' ? 'selected' : '' }}>Tersedia
                        </option>
                        <option value="tidak tersedia"
                            {{ old('status_222320', $tipeRoom->status_222320) == 'tidak tersedia' ? 'selected' : '' }}>
                            Tidak Tersedia</option>
                    </select>
                    @error('status_222320')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full md:w-auto bg-blue-600 text-white hover:bg-blue-700 font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function tambahFasilitas() {
            const container = document.getElementById('fasilitas-container');
            const inputGroup = document.createElement('div');
            inputGroup.className = 'flex items-center space-x-2';

            inputGroup.innerHTML = `
            <input type="text" name="fasilitas_222320[]" required
                class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                placeholder="Masukkan fasilitas">
            <button type="button" onclick="hapusFasilitas(this)"
                class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        `;

            container.appendChild(inputGroup);
        }

        function hapusFasilitas(button) {
            const inputGroup = button.parentElement;
            inputGroup.remove();
        }
    </script>
@endsection
