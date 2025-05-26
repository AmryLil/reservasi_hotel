@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl pt-20 w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Tambah Tipe Kamar</h1>
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
            <form action="{{ route('admin.tiperoom.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Tipe -->
                    <div>
                        <label for="tipe_id_222320" class="block text-sm font-medium text-gray-700 mb-1">Kode Tipe
                            Kamar</label>
                        <input type="text" name="tipe_id_222320" id="tipe_id_222320" required
                            class="w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('tipe_id_222320') border-red-500 @enderror"
                            value="{{ old('tipe_id_222320') }}" placeholder="Masukkan kode tipe kamar">
                        @error('tipe_id_222320')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nama_tipe_222320" class="block text-sm font-medium text-gray-700 mb-1">Nama Tipe
                            Kamar</label>
                        <input type="text" name="nama_tipe_222320" id="nama_tipe_222320" required
                            class="w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('nama_tipe_222320') border-red-500 @enderror"
                            value="{{ old('nama_tipe_222320') }}" placeholder="Masukkan nama tipe kamar">
                        @error('nama_tipe_222320')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div>
                        <label for="harga_222320" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                        <div class="relative">
                            <span class="absolute p-2 inset-y-0 left-0 flex items-center pl-3 text-gray-500">Rp</span>
                            <input type="number" name="harga_222320" id="harga_222320" required min="0"
                                step="10000"
                                class="w-full pl-10 p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('harga_222320') border-red-500 @enderror"
                                value="{{ old('harga_222320') }}" placeholder="Masukkan harga">
                        </div>
                        @error('harga_222320')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi_222320" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi_222320" id="deskripsi_222320" rows="4" required
                        class="w-full rounded-md p-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 @error('deskripsi_222320') border-red-500 @enderror"
                        placeholder="Masukkan deskripsi tipe kamar">{{ old('deskripsi_222320') }}</textarea>
                    @error('deskripsi_222320')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fasilitas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fasilitas</label>
                    <div id="fasilitas-container" class="space-y-3">
                        <div class="flex items-center space-x-2">
                            <input type="text" name="fasilitas_222320[]" required
                                class="flex-1 rounded-md p-2 border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                placeholder="Masukkan fasilitas">
                            <button type="button" onclick="tambahFasilitas()"
                                class="bg-green-500 text-white p-2 rounded-lg hover:bg-green-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @error('fasilitas_222320')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white hover:bg-blue-700 font-semibold px-6 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function tambahFasilitas() {
            const container = document.getElementById('fasilitas-container');
            const newInput = document.createElement('div');
            newInput.className = 'flex items-center space-x-2';
            newInput.innerHTML = `
                <input type="text" name="fasilitas_222320[]" required
                    class="flex-1 p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
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
            container.appendChild(newInput);
        }

        function hapusFasilitas(button) {
            button.parentElement.remove();
        }
    </script>
@endsection
