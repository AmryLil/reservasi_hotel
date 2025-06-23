<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservasi Hotel - @yield('title', 'Laravel')</title>


    <!-- CSS -->
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Custom Styles -->
    <style>
        .border_custom {
            border-radius: 600px 400px 600px 400px;
            -webkit-border-radius: 600px 400px 600px 400px;
            -moz-border-radius: 600px 400px 600px 180px;
        }
    </style>
</head>

<body id="body" class=" font-jost">
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="relative px-24 mt-14 min-h-screen">
        <div id="dark-body"
            class="transition-all duration-150 ease-in-out w-screen h-screen hidden start-0 bg-slate-50 opacity-45 z-40">
        </div>
        @if (session('show_new_user_voucher'))
            @php
                $voucherData = session('show_new_user_voucher');
            @endphp

            <div class="modal fade" id="newUserVoucherModal" tabindex="-1" aria-labelledby="newUserVoucherModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-center" style="border-radius: 1rem;">
                        <div class="modal-header border-0 pb-0">
                            {{-- Tombol close di pojok kanan atas --}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-4 pb-4 pt-0">
                            {{-- Anda bisa ganti dengan gambar/icon Anda sendiri --}}
                            <img src="https://img.icons8.com/bubbles/100/gift.png" alt="Gift Icon" />

                            <h4 class="modal-title fw-bold mt-3" id="newUserVoucherModalLabel">Selamat Datang!</h4>
                            <p class="text-muted mt-2">
                                Sebagai hadiah selamat datang, kami memberikan voucher diskon spesial sebesar
                                <strong>{{ $voucherData['diskon'] }}%</strong> untuk booking pertama Anda!
                            </p>

                            <div class="mt-4">
                                <p class="mb-2">Gunakan kode unik di bawah ini saat checkout:</p>
                                {{-- Bagian untuk menampilkan kode voucher --}}
                                <div class="alert alert-success fw-bold fs-4" style="border-style: dashed;">
                                    {{ $voucherData['kode'] }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center pt-0 pb-4">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Siap, Saya
                                Mengerti!</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="newUserVoucherModal" style="background-color: rgba(0, 0, 0, 0.5);"
                class="fixed inset-0 bg-black  flex items-center justify-center z-50">
                <!-- Modal Content -->
                <div class="bg-white rounded-2xl p-6 max-w-md w-full text-center relative shadow-lg">
                    <!-- Tombol Close -->
                    <button onclick="closeVoucherModal()"
                        class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-xl font-bold">&times;</button>

                    <!-- Gambar Hadiah -->
                    <img src="https://img.icons8.com/bubbles/100/gift.png" alt="Gift Icon" class="mx-auto mb-4" />

                    <h4 class="text-xl font-bold">Selamat Datang!</h4>
                    <p class="text-gray-600 mt-2">
                        Sebagai hadiah selamat datang, kami memberikan voucher diskon spesial sebesar
                        <strong>{{ $voucherData['diskon'] }}%</strong> untuk booking pertama Anda!
                    </p>

                    <div class="mt-4">
                        <p class="mb-2">Gunakan kode unik ini saat checkout:</p>
                        <div
                            class="border-dashed border-2 border-green-400 text-green-600 font-bold text-lg py-2 rounded">
                            {{ $voucherData['kode'] }}
                        </div>
                    </div>

                    <div class="mt-6">
                        <button onclick="closeVoucherModal()"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Siap, Saya Mengerti!
                        </button>
                    </div>
                </div>
            </div>


            <script>
                function closeVoucherModal() {
                    const modal = document.getElementById('newUserVoucherModal');
                    if (modal) {
                        modal.remove();

                        fetch("{{ route('remove.voucher.session') }}", {
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            }
                        });
                    }
                }

                // Tampilkan otomatis saat halaman siap
                document.addEventListener('DOMContentLoaded', () => {
                    document.getElementById('newUserVoucherModal').classList.remove('hidden');
                });
            </script>
        @endif
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')


    @yield('scripts')
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/handleModalProduct.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> --}}
</body>

</html>
