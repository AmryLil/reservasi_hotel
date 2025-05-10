@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto pt-16 px-4 md:px-8 lg:px-12">
        <div class="w-full mx-auto">
            <form class="bg-white p-8 rounded-xl shadow-lg border-t-4 border-blue-600" action="#" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-3xl font-bold text-blue-800 mb-6">Tambah Kamar Baru</h1>

                @if ($errors->any())
                    <div class="bg-red-50 text-red-700 p-4 rounded-lg mb-6">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-6">
                    <label for="nama_kamar_222320" class="block text-lg font-medium text-gray-700 mb-2">
                        Nama Kamar <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_kamar_222320" id="nama_kamar_222320"
                        value="{{ old('nama_kamar_222320') }}"
                        class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div class="mb-6">
                    <label for="tipe_id_222320" class="block text-lg font-medium text-gray-700 mb-2">
                        Tipe Kamar <span class="text-red-500">*</span>
                    </label>
                    <select name="tipe_id_222320" id="tipe_id_222320"
                        class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Pilih Tipe Kamar</option>

                    </select>
                </div>

                <div class="mb-6">
                    <label for="status_222320" class="block text-lg font-medium text-gray-700 mb-2">
                        Status Kamar
                    </label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="status_222320" value="available"
                                class="text-blue-600 focus:ring-blue-500 h-5 w-5"
                                {{ old('status_222320', 'available') == 'available' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Available</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="status_222320" value="booked"
                                class="text-blue-600 focus:ring-blue-500 h-5 w-5"
                                {{ old('status_222320') == 'booked' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Booked</span>
                        </label>
                    </div>
                </div>

                <div class="mb-8">
                    <label for="gambar_222320" class="block text-lg font-medium text-gray-700 mb-2">
                        Gambar Kamar
                    </label>
                    <div class="mt-1 flex items-center">
                        <span
                            class="inline-block bg-blue-50 border border-dashed border-blue-300 rounded-lg px-4 py-5 w-full">
                            <input type="file" name="gambar_222320" id="gambar_222320"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                   file:rounded-md file:border-0 file:text-sm file:font-semibold
                                   file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-2 text-xs text-gray-500">
                                PNG, JPG, atau JPEG (maks. 2MB)
                            </p>
                        </span>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="#"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                        Simpan Kamar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
