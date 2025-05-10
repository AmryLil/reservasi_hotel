@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl pt-20 w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Edit Kamar</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.rooms.show', $room->id_room_222320) }}">
                    <button
                        class="bg-blue-500 text-white hover:bg-blue-600 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Lihat Detail
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
            <form action="{{ route('admin.rooms.update', $room->id_room_222320) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Kamar -->
                    <div>
                        <label for="nama_kamar_222320" class="block text-sm font-medium text-gray-700 mb-1">Nama
                            Kamar</label>
                        <input type="text" name="nama_kamar_222320" id="nama_kamar_222320"
                            value="{{ old('nama_kamar_222320', $room->nama_kamar_222320) }}"
                            class="border-2 border-blue-200 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            required>
                    </div>

                    <!-- Tipe Kamar -->
                    <div>
                        <label for="tipe_id_222320" class="block text-sm font-medium text-gray-700 mb-1">Tipe Kamar</label>
                        <select name="tipe_id_222320" id="tipe_id_222320"
                            class="border-2 border-blue-200 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            required>
                            <option value="">Pilih Tipe Kamar</option>
                            @foreach ($tipeRooms as $tipe)
                                <option value="{{ $tipe->tipe_id_222320 }}"
                                    {{ old('tipe_id_222320', $room->tipe_id_222320) == $tipe->tipe_id_222320 ? 'selected' : '' }}>
                                    {{ $tipe->nama_tipe_222320 }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status Kamar -->
                    <div>
                        <label for="status_222320" class="block text-sm font-medium text-gray-700 mb-1">Status Kamar</label>
                        <select name="status_222320" id="status_222320"
                            class="border-2 border-blue-200 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            required>
                            <option value="available"
                                {{ old('status_222320', $room->status_222320) == 'available' ? 'selected' : '' }}>Available
                            </option>
                            <option value="booked"
                                {{ old('status_222320', $room->status_222320) == 'booked' ? 'selected' : '' }}>Booked
                            </option>
                            <option value="maintenance"
                                {{ old('status_222320', $room->status_222320) == 'maintenance' ? 'selected' : '' }}>
                                Maintenance</option>
                        </select>
                    </div>

                    <!-- Gambar Kamar -->
                    <div>
                        <label for="gambar_222320" class="block text-sm font-medium text-gray-700 mb-1">Gambar Kamar</label>
                        <input type="file" name="gambar_222320" id="gambar_222320"
                            class="border-2 border-blue-200 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            accept="image/jpeg,image/png,image/jpg,image/gif">
                        <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF (Maks. 2MB)</p>
                        <p class="text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah gambar</p>
                    </div>
                </div>

                <!-- Current Image & Preview -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</label>
                        <div class="h-48 w-64 border rounded-lg overflow-hidden">
                            @if ($room->gambar_222320)
                                <img src="{{ Storage::url($room->gambar_222320) }}" alt="{{ $room->nama_kamar_222320 }}"
                                    class="h-full w-full object-cover">
                            @else
                                <div class="h-full w-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Preview Gambar Baru</label>
                        <div id="imagePreview"
                            class="h-48 w-64 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center">
                            <span id="previewText" class="text-gray-400">Pratinjau gambar</span>
                            <img id="preview" src="#" alt="Preview"
                                class="hidden h-full w-full object-cover rounded-lg">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="bg-blue-600 text-white hover:bg-blue-700 font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300 ease-in-out">
                        Update Kamar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image preview
        document.getElementById('gambar_222320').addEventListener('change', function(e) {
            const previewImg = document.getElementById('preview');
            const previewText = document.getElementById('previewText');

            if (e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('hidden');
                    previewText.classList.add('hidden');
                }

                reader.readAsDataURL(e.target.files[0]);
            } else {
                previewImg.classList.add('hidden');
                previewText.classList.remove('hidden');
            }
        });
    </script>
@endsection
