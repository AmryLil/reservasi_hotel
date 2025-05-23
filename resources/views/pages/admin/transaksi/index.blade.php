@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl pt-20 w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Kelola Data Booking</h1>
            <a href="/admin/booking/create">
                <button
                    class="bg-blue-600 text-white hover:bg-blue-700 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Tambah Booking
                </button>
            </a>
        </div>
        <div class="overflow-x-auto px-4 bg-white rounded-b-xl shadow-md pb-6">
            <!-- Input Pencarian -->
            <div class="mb-4 flex gap-2 pt-4">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" id="search" placeholder="Cari booking..."
                        class="border-2 border-blue-200 p-2 pl-10 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        onkeyup="searchBookings()">
                </div>
                <button
                    class="flex items-center justify-center bg-blue-100 text-blue-800 p-2 rounded-lg hover:bg-blue-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16" height="24" width="24">
                        <path d="m4.50625 2.1125 10.181249999999999 -0.00625" fill="none" stroke="#1e40af"
                            stroke-miterlimit="10" stroke-width="1"></path>
                        <path d="m0.3125 2.1125 2.39375 0" fill="none" stroke="#1e40af" stroke-miterlimit="10"
                            stroke-width="1"></path>
                        <path d="m12.293750000000001 7.5 2.39375 0" fill="none" stroke="#1e40af" stroke-miterlimit="10"
                            stroke-width="1"></path>
                        <path d="m0.3125 7.5 10.181249999999999 0" fill="none" stroke="#1e40af" stroke-miterlimit="10"
                            stroke-width="1"></path>
                        <path d="m8.7 12.893749999999999 5.9875 -0.00625" fill="none" stroke="#1e40af"
                            stroke-miterlimit="10" stroke-width="1"></path>
                        <path d="m0.3125 12.893749999999999 6.5874999999999995 0" fill="none" stroke="#1e40af"
                            stroke-miterlimit="10" stroke-width="1"></path>
                        <path d="m2.70625 0.3125 0 3.59375" fill="none" stroke="#1e40af" stroke-miterlimit="10"
                            stroke-width="1"></path>
                        <path d="m10.493749999999999 5.699999999999999 0 3.59375" fill="none" stroke="#1e40af"
                            stroke-miterlimit="10" stroke-width="1"></path>
                        <path d="m6.8999999999999995 11.09375 0 3.59375" fill="none" stroke="#1e40af"
                            stroke-miterlimit="10" stroke-width="1"></path>
                    </svg>
                </button>
            </div>

            <table class="table-auto w-full border-collapse rounded-xl overflow-hidden shadow-sm">
                <thead class="bg-blue-600 text-white text-lg">
                    <tr>
                        <th class="py-4 px-4 text-left">ID</th>
                        <th class="py-4 px-4 text-left">User</th>
                        <th class="py-4 px-4 text-left">Kamar</th>
                        <th class="py-4 px-4 text-left">Check-in</th>
                        <th class="py-4 px-4 text-left">Check-out</th>
                        <th class="py-4 px-4 text-left">Jumlah Orang</th>
                        <th class="py-4 px-4 text-left">Total Harga</th>
                        <th class="py-4 px-4 text-left">Status</th>
                        <th class="py-4 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="booking-table" class="text-gray-700">
                    <tr class="odd:bg-white even:bg-blue-50 hover:bg-blue-100 transition duration-200">
                        <td class="py-4 px-4">1</td>
                        <td class="py-4 px-4">Ahmad Fadillah</td>
                        <td class="py-4 px-4 font-semibold">Deluxe Room 101</td>
                        <td class="py-4 px-4">2025-05-10</td>
                        <td class="py-4 px-4">2025-05-12</td>
                        <td class="py-4 px-4">2</td>
                        <td class="py-4 px-4">Rp 2.500.000</td>
                        <td class="py-4 px-4">
                            <select onchange="updateStatus(this, 1)"
                                class="text-sm rounded-full px-2 py-1 border border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="pending" selected>pending</option>
                                <option value="confirmed">confirmed</option>
                                <option value="checked_in">checked_in</option>
                                <option value="completed">completed</option>
                            </select>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="#"
                                    class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(1)"
                                    class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-blue-50 hover:bg-blue-100 transition duration-200">
                        <td class="py-4 px-4">2</td>
                        <td class="py-4 px-4">Siti Nurhaliza</td>
                        <td class="py-4 px-4 font-semibold">Suite Room 202</td>
                        <td class="py-4 px-4">2025-05-15</td>
                        <td class="py-4 px-4">2025-05-18</td>
                        <td class="py-4 px-4">4</td>
                        <td class="py-4 px-4">Rp 4.800.000</td>
                        <td class="py-4 px-4">
                            <select onchange="updateStatus(this, 2)"
                                class="text-sm rounded-full px-2 py-1 border border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="pending">pending</option>
                                <option value="confirmed" selected>confirmed</option>
                                <option value="checked_in">checked_in</option>
                                <option value="completed">completed</option>
                            </select>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="#"
                                    class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(2)"
                                    class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-blue-50 hover:bg-blue-100 transition duration-200">
                        <td class="py-4 px-4">3</td>
                        <td class="py-4 px-4">Budi Santoso</td>
                        <td class="py-4 px-4 font-semibold">Standard Room 305</td>
                        <td class="py-4 px-4">2025-05-12</td>
                        <td class="py-4 px-4">2025-05-14</td>
                        <td class="py-4 px-4">2</td>
                        <td class="py-4 px-4">Rp 1.600.000</td>
                        <td class="py-4 px-4">
                            <select onchange="updateStatus(this, 3)"
                                class="text-sm rounded-full px-2 py-1 border border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="pending">pending</option>
                                <option value="confirmed">confirmed</option>
                                <option value="checked_in">checked_in</option>
                                <option value="completed" selected>completed</option>
                            </select>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="#"
                                    class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(3)"
                                    class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-blue-50 hover:bg-blue-100 transition duration-200">
                        <td class="py-4 px-4">4</td>
                        <td class="py-4 px-4">Dewi Lestari</td>
                        <td class="py-4 px-4 font-semibold">Deluxe Room 102</td>
                        <td class="py-4 px-4">2025-05-20</td>
                        <td class="py-4 px-4">2025-05-23</td>
                        <td class="py-4 px-4">3</td>
                        <td class="py-4 px-4">Rp 3.750.000</td>
                        <td class="py-4 px-4">
                            <select onchange="updateStatus(this, 4)"
                                class="text-sm rounded-full px-2 py-1 border border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="pending">pending</option>
                                <option value="confirmed">confirmed</option>
                                <option value="checked_in" selected>checked_in</option>
                                <option value="completed">completed</option>
                            </select>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="#"
                                    class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(4)"
                                    class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination (Example) -->
            <div class="flex items-center justify-between border-t border-blue-100 bg-white px-4 py-3 sm:px-6 mt-4">
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">4</span> dari
                            <span class="font-medium">4</span> booking
                        </p>
                    </div>
                    <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            <a href="#"
                                class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-blue-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" aria-current="page"
                                class="relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">1</a>
                            <a href="#"
                                class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-blue-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Dialog for Delete -->
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus booking ini?')) {
                // Di sini akan ada kode untuk mengirim request DELETE ke server
                console.log('Menghapus booking dengan ID: ' + id);
            }
        }

        // Fungsi untuk update status booking
        function updateStatus(selectElement, id) {
            const newStatus = selectElement.value;
            console.log('Update status booking ID: ' + id + ' menjadi: ' + newStatus);
            // Di sini akan ada kode untuk mengirim request update ke server
            // Contoh: notifikasi sukses
            alert('Status booking berhasil diubah menjadi: ' + newStatus);
        }

        // Fungsi untuk mencari booking
        function searchBookings() {
            const input = document.getElementById('search');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('booking-table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let match = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        const cellValue = cells[j].textContent || cells[j].innerText;
                        if (cellValue.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }
                }

                rows[i].style.display = match ? '' : 'none';
            }
        }
    </script>
@endsection
