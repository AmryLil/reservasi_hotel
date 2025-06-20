@extends('layouts.dashboard-layout')

@section('content')
    <div class="rounded-xl w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Tambah Item Galeri Baru</h1>
        </div>

        <div class="p-4 bg-white rounded-b-xl shadow-md">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Judul -->
                <div>
                    <label for="judul_222320" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="judul_222320" id="judul_222320" value="{{ old('judul_222320') }}"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                    @error('judul_222320')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi_222320" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi_222320" id="deskripsi_222320" rows="4"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>{{ old('deskripsi_222320') }}</textarea>
                    @error('deskripsi_222320')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label for="path_gambar_222320" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                    <!-- Image Preview Container -->
                    <div id="image-preview-container" class="mt-2 hidden">
                        <img id="image-preview" src="#" alt="Image Preview" class="max-h-48 rounded-md shadow-md" />
                    </div>
                    <!-- Upload Box -->
                    <div id="upload-box"
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="path_gambar_222320"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Pilih file untuk diupload</span>
                                    <input id="path_gambar_222320" name="path_gambar_222320" type="file" class="sr-only"
                                        required accept="image/*">
                                </label>
                                <p class="pl-1">atau seret dan lepas</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                        </div>
                    </div>
                    @error('path_gambar_222320')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.gallery.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('path_gambar_222320').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                const previewContainer = document.getElementById('image-preview-container');
                const previewImage = document.getElementById('image-preview');
                const uploadBox = document.getElementById('upload-box');

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    uploadBox.classList.add('hidden'); // Sembunyikan kotak upload setelah ada preview
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
