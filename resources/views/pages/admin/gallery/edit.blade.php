@extends('layouts.dashboard-layout')

@section('content')
    <div class="rounded-xl w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Edit Item Galeri</h1>
        </div>

        <div class="p-4 bg-white rounded-b-xl shadow-md">
            <form action="{{ route('admin.gallery.update', $gallery->id_gallery_222320) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div>
                    <label for="judul_222320" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="judul_222320" id="judul_222320"
                        value="{{ old('judul_222320', $gallery->judul_222320) }}"
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
                        required>{{ old('deskripsi_222320', $gallery->deskripsi_222320) }}</textarea>
                    @error('deskripsi_222320')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label for="path_gambar_222320" class="block text-sm font-medium text-gray-700">Ganti Gambar
                        (Opsional)</label>
                    <div class="mt-2 flex items-center space-x-4">
                        <div class="w-32 h-20 rounded-md overflow-hidden bg-gray-100">
                            <img src="{{ Storage::url($gallery->path_gambar_222320) }}" alt="Current Image"
                                class="w-full h-full object-cover">
                        </div>
                        <input id="path_gambar_222320" name="path_gambar_222320" type="file"
                            class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100">
                    </div>
                    @error('path_gambar_222320')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.gallery.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Batal@extends('layouts.dashboard-layout')

                    @section('content')
                        <div class="rounded-xl w-full">
                            <div
                                class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
                                <h1 class="text-2xl font-bold">Edit Item Galeri</h1>
                            </div>

                            <div class="p-4 bg-white rounded-b-xl shadow-md">
                                <form action="{{ route('admin.gallery.update', $gallery->id_gallery_222320) }}"
                                    method="POST" enctype="multipart/form-data" class="space-y-6">
                                    @csrf
                                    @method('PUT')

                                    <!-- Judul -->
                                    <div>
                                        <label for="judul_222320"
                                            class="block text-sm font-medium text-gray-700">Judul</label>
                                        <input type="text" name="judul_222320" id="judul_222320"
                                            value="{{ old('judul_222320', $gallery->judul_222320) }}"
                                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            required>
                                        @error('judul_222320')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Deskripsi -->
                                    <div>
                                        <label for="deskripsi_222320"
                                            class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                        <textarea name="deskripsi_222320" id="deskripsi_222320" rows="4"
                                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            required>{{ old('deskripsi_222320', $gallery->deskripsi_222320) }}</textarea>
                                        @error('deskripsi_222320')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Upload Gambar -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Gambar</label>
                                        <div class="mt-2 flex items-center space-x-4">
                                            <div class="w-32 h-20 rounded-md overflow-hidden bg-gray-100">
                                                <!-- Image preview -->
                                                <img id="image-preview"
                                                    src="{{ Storage::url($gallery->path_gambar_222320) }}"
                                                    alt="Current Image" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <label for="path_gambar_222320"
                                                    class="cursor-pointer text-sm font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-full border border-blue-200">
                                                    Ganti Gambar (Opsional)
                                                    <input id="path_gambar_222320" name="path_gambar_222320" type="file"
                                                        class="hidden" accept="image/*">
                                                </label>
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
                                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
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
                                    const previewImage = document.getElementById('image-preview');

                                    reader.onload = function(e) {
                                        previewImage.src = e.target.result;
                                    }

                                    reader.readAsDataURL(file);
                                }
                            });
                        </script>
                    @endpush
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
