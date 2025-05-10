@extends('layouts.app')

@section('title', 'RESERVASI KAMAR')

@section('content')
    <section class="py-10 bg-blue-50">
        <div class="container mx-auto px-4">
            <h1 class="font-semibold text-3xl text-center text-blue-800">RESERVASI KAMAR</h1>



            <!-- Room List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                @forelse($rooms as $room)
                    <!-- Room Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden fade-in border border-blue-200">
                        <div class="relative">
                            <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded">
                                {{ $room->tipeRoom->nama_tipe_222320 }}
                            </span>
                            @if ($room->diskon_222320 > 0)
                                <span
                                    class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                                    DISKON {{ $room->diskon_222320 }}%
                                </span>
                            @endif
                            <img src="{{ asset('storage/' . $room->gambar_222320 ?: 'images/room.jpg') }}"
                                alt="{{ $room->nama_kamar_222320 }}" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-4">
                            <h2 class="text-blue-800 font-semibold text-xl">{{ $room->nama_kamar_222320 }}</h2>
                            <div class="flex items-center mt-1 text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="ml-1 text-sm">Max: {{ $room->kapasitas_222320 }} Orang</span>
                            </div>
                            <p class="text-sm text-gray-600 mt-2">{{ $room->deskripsi_222320 }}</p>

                            <div class="flex justify-between items-center mt-4">
                                <p class="text-blue-700 font-bold">
                                    @if ($room->diskon_222320 > 0)
                                        <span class="line-through text-gray-500 text-sm">Rp
                                            {{ number_format($room->tipeRoom->harga_222320, 0, ',', '.') }}</span>
                                        Rp
                                        {{ number_format(($room->tipeRoom->harga_222320 * (100 - $room->diskon_222320)) / 100, 0, ',', '.') }}
                                    @else
                                        Rp {{ number_format($room->tipeRoom->harga_222320, 0, ',', '.') }}
                                    @endif
                                    <span class="text-sm font-normal text-gray-500">/malam</span>
                                </p>
                                <a href="{{ route('user.rooms.show', $room->id_room_222320) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded transition duration-300 ease-in-out">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-lg text-gray-600">Tidak ada kamar yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                <nav class="inline-flex rounded-md shadow">
                    <a href="#"
                        class="py-2 px-4 bg-blue-50 text-blue-600 font-medium border border-blue-200 rounded-l-md hover:bg-blue-100">
                        &laquo; Prev
                    </a>
                    <a href="#" class="py-2 px-4 bg-blue-600 text-white font-medium border border-blue-600">1</a>
                    <a href="#"
                        class="py-2 px-4 bg-blue-50 text-blue-600 font-medium border border-blue-200 hover:bg-blue-100">2</a>
                    <a href="#"
                        class="py-2 px-4 bg-blue-50 text-blue-600 font-medium border border-blue-200 hover:bg-blue-100">3</a>
                    <a href="#"
                        class="py-2 px-4 bg-blue-50 text-blue-600 font-medium border border-blue-200 rounded-r-md hover:bg-blue-100">
                        Next &raquo;
                    </a>
                </nav>
            </div>
        </div>

        <!-- Scroll to Top Button -->
        <button id="scrollToTopButton"
            class="fixed bottom-4 right-4 p-3 bg-blue-600 text-white rounded-full shadow-lg z-50 transition-opacity duration-300 hover:bg-blue-700 hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
            </svg>
        </button>
    </section>
@endsection

@section('scripts')
    <style>
        /* Animasi Fade-in untuk Kartu Kamar */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Filter animation delay
            document.querySelectorAll('.fade-in').forEach((el, index) => {
                el.style.animationDelay = `${index * 0.2}s`;
            });

            const scrollToTopButton = document.getElementById("scrollToTopButton");

            window.addEventListener("scroll", () => {
                if (window.scrollY > 300) {
                    scrollToTopButton.classList.remove("hidden");
                } else {
                    scrollToTopButton.classList.add("hidden");
                }
            });

            scrollToTopButton.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth",
                });
            });
        });
    </script>
@endsection
