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
      <!-- Gallery Items - Fixed height untuk semua item -->
      <div class="overflow-hidden rounded-lg shadow">
        <div class="relative cursor-pointer h-64">
          <img class="w-full h-full object-cover" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="Hotel Lobby">
          <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
            <h3 class="font-medium">Lobi Hotel</h3>
          </div>
        </div>
      </div>

      <div class="overflow-hidden rounded-lg shadow">
        <div class="relative cursor-pointer h-64">
          <img class="w-full h-full object-cover" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="Luxury Suite">
          <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
            <h3 class="font-medium">Kamar Suite</h3>
          </div>
        </div>
      </div>
      
      <div class="overflow-hidden rounded-lg shadow">
        <div class="relative cursor-pointer h-64">
          <img class="w-full h-full object-cover" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="Outdoor Pool">
          <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
            <h3 class="font-medium">Kolam Renang</h3>
          </div>
        </div>
      </div>
      
      <div class="overflow-hidden rounded-lg shadow">
        <div class="relative cursor-pointer h-64">
          <img class="w-full h-full object-cover" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="Fine Dining">
          <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
            <h3 class="font-medium">Restoran</h3>
          </div>
        </div>
      </div>
      
      <div class="overflow-hidden rounded-lg shadow">
        <div class="relative cursor-pointer h-64">
          <img class="w-full h-full object-cover" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="Spa Treatment">
          <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
            <h3 class="font-medium">Spa & Relaksasi</h3>
          </div>
        </div>
      </div>
      
      <div class="overflow-hidden rounded-lg shadow">
        <div class="relative cursor-pointer h-64">
          <img class="w-full h-full object-cover" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg" alt="Beachfront View">
          <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
            <h3 class="font-medium">Pemandangan Pantai</h3>
          </div>
        </div>
      </div>
      
      <div class="overflow-hidden rounded-lg shadow">
        <div class="relative cursor-pointer h-64">
          <img class="w-full h-full object-cover" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="Gym Facility">
          <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
            <h3 class="font-medium">Fitness Center</h3>
          </div>
        </div>
      </div>
      
      <div class="overflow-hidden rounded-lg shadow">
        <div class="relative cursor-pointer h-64">
          <img class="w-full h-full object-cover" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg" alt="Conference Room">
          <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white">
            <h3 class="font-medium">Ruang Konferensi</h3>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Load More Button -->
    <div class="text-center mt-8">
      <button class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Lihat Lebih Banyak
      </button>
    </div>
  </div>
  
  <!-- Lightbox Modal -->
  <div id="gallery-modal" class="fixed inset-0 bg-black bg-opacity-80 z-50 hidden flex items-center justify-center p-4">
    <div class="relative max-w-2xl w-full">
      <button id="close-modal" class="absolute -top-10 right-0 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
      <div class="bg-white rounded overflow-hidden">
        <img id="modal-image" src="" alt="Gallery Image" class="w-full h-auto">
        <div class="p-3 bg-gray-100">
          <h3 id="modal-title" class="text-lg font-medium"></h3>
          <p id="modal-description" class="text-gray-600 text-sm"></p>
        </div>
      </div>
      
      <div class="flex justify-between mt-4">
        <button id="prev-image" class="p-2 bg-black bg-opacity-50 text-white rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button id="next-image" class="p-2 bg-black bg-opacity-50 text-white rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
    // Gallery image click handlers
    const galleryImages = document.querySelectorAll('.relative.cursor-pointer');
    const modal = document.getElementById('gallery-modal');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('modal-title');
    const modalDescription = document.getElementById('modal-description');
    const closeModal = document.getElementById('close-modal');
    const prevButton = document.getElementById('prev-image');
    const nextButton = document.getElementById('next-image');
    
    let currentImageIndex = 0;
    const imageSources = [
      {
        src: 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg',
        title: 'Lobi Hotel',
        description: 'Area penerima tamu yang nyaman'
      },
      {
        src: 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg',
        title: 'Kamar Suite',
        description: 'Kamar dengan fasilitas premium'
      },
      {
        src: 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg',
        title: 'Kolam Renang',
        description: 'Kolam renang outdoor'
      },
      {
        src: 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg',
        title: 'Restoran',
        description: 'Tempat makan dengan menu lezat'
      },
      {
        src: 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg',
        title: 'Spa & Relaksasi',
        description: 'Fasilitas spa untuk bersantai'
      },
      {
        src: 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg',
        title: 'Pemandangan Pantai',
        description: 'Akses ke pantai privat'
      },
      {
        src: 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg',
        title: 'Fitness Center',
        description: 'Ruang olahraga lengkap'
      },
      {
        src: 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg',
        title: 'Ruang Konferensi',
        description: 'Ruang pertemuan untuk bisnis'
      }
    ];
    
    galleryImages.forEach((image, index) => {
      image.addEventListener('click', () => {
        currentImageIndex = index;
        updateModalContent(currentImageIndex);
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      });
    });
    
    closeModal.addEventListener('click', () => {
      modal.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    });
    
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
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
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      } else if (e.key === 'ArrowLeft') {
        currentImageIndex = (currentImageIndex - 1 + imageSources.length) % imageSources.length;
        updateModalContent(currentImageIndex);
      } else if (e.key === 'ArrowRight') {
        currentImageIndex = (currentImageIndex + 1) % imageSources.length;
        updateModalContent(currentImageIndex);
      }
    });
  });
</script>
@endsection