@extends('layouts.app')

@section('title', 'Galeri Hotel')

@section('content')
    <section class="bg-gray-50">
        <div class="container mx-auto py-10 px-4">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">GALERI HOTEL</h1>
                <div class="w-16 h-1 bg-blue-500 mx-auto"></div>
                <p class="mt-3 text-gray-600">Lihat fasilitas dan suasana hotel kami</p>
            </div>

            <!-- Main Gallery -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                {{-- Loop through galleries from the controller --}}
                @forelse ($galleries as $gallery)
                    <div class="gallery-item overflow-hidden rounded-lg shadow"
                        data-src="{{ Storage::url($gallery->path_gambar_222320) }}" data-title="{{ $gallery->judul_222320 }}"
                        data-description="{{ $gallery->deskripsi_222320 }}">
                        <div class="relative cursor-pointer h-64">
                            {{-- Make sure storage is linked by running `php artisan storage:link` --}}
                            <img class="w-full h-full object-cover" src="{{ Storage::url($gallery->path_gambar_222320) }}"
                                alt="{{ $gallery->judul_222320 }}">
                            <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
                                <h3 class="font-medium">{{ $gallery->judul_222320 }}</h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-gray-500">Belum ada foto di galeri.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Lightbox Modal -->
        <div id="gallery-modal"
            class="fixed inset-0 bg-black bg-opacity-80 z-50 hidden flex items-center justify-center p-4">
            <div class="relative max-w-2xl w-full">
                <button id="close-modal" class="absolute -top-10 right-0 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="bg-white rounded overflow-hidden">
                    <img id="modal-image" src="" alt="Gallery Image" class="w-full h-auto max-h-[80vh]">
                    <div class="p-4 bg-gray-100">
                        <h3 id="modal-title" class="text-lg font-medium"></h3>
                        <p id="modal-description" class="text-gray-600 text-sm mt-1"></p>
                    </div>
                </div>

                <div class="flex justify-between mt-4 w-full absolute top-1/2 -translate-y-1/2">
                    <button id="prev-image" class="p-2 bg-black bg-opacity-50 text-white rounded-full hover:bg-opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="next-image" class="p-2 bg-black bg-opacity-50 text-white rounded-full hover:bg-opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            const modal = document.getElementById('gallery-modal');
            const modalImage = document.getElementById('modal-image');
            const modalTitle = document.getElementById('modal-title');
            const modalDescription = document.getElementById('modal-description');
            const closeModal = document.getElementById('close-modal');
            const prevButton = document.getElementById('prev-image');
            const nextButton = document.getElementById('next-image');

            // Create an array of gallery data from the DOM
            const imageSources = Array.from(galleryItems).map(item => ({
                src: item.dataset.src,
                title: item.dataset.title,
                description: item.dataset.description
            }));

            let currentImageIndex = 0;

            if (imageSources.length === 0) return;

            function openModal(index) {
                currentImageIndex = index;
                updateModalContent(currentImageIndex);
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function hideModal() {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            galleryItems.forEach((item, index) => {
                item.addEventListener('click', () => {
                    openModal(index);
                });
            });

            closeModal.addEventListener('click', hideModal);

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    hideModal();
                }
            });

            prevButton.addEventListener('click', () => {
                currentImageIndex = (currentImageIndex - 1 + imageSources.length) % imageSources.length;
                updateModalContent(currentImageIndex);
            });

            nextButton.addEventListener('click', () => {
                currentImageIndex = (currentImageIndex + 1) % imageSources.length;
                updateModalContent(currentImageIndex);
            });

            function updateModalContent(index) {
                const imageData = imageSources[index];
                modalImage.src = imageData.src;
                modalTitle.textContent = imageData.title;
                modalDescription.textContent = imageData.description;
            }

            // Handle keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (modal.classList.contains('hidden')) return;

                if (e.key === 'Escape') {
                    hideModal();
                } else if (e.key === 'ArrowLeft') {
                    prevButton.click();
                } else if (e.key === 'ArrowRight') {
                    nextButton.click();
                }
            });
        });
    </script>
@endsection
