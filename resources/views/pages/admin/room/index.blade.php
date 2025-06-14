@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl  w-full">
        <div
            class="flex justify-between items-center mb-4 p-4 text-blue-800 rounded-t-xl bg-white shadow-md border-l-4 border-blue-600">
            <h1 class="text-2xl font-bold">Kelola Data Kamar</h1>
            <a href="{{ route('admin.rooms.create') }}">
                <button
                    class="bg-blue-600 text-white hover:bg-blue-700 font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Tambah Kamar
                </button>
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 mx-4" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

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
                    <input type="text" id="search" placeholder="Cari kamar..."
                        class="border-2 border-blue-200 p-2 pl-10 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        onkeyup="searchRooms()">
                </div>
                <div class="flex items-center">
                    <a href="{{ route('admin.rooms.available') }}"
                        class="bg-green-100 text-green-800 p-2 rounded-lg hover:bg-green-200 transition ml-2">
                        <span class="px-2">Tersedia</span>
                    </a>
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
                        <th class="py-4 px-6 text-left">No</th>
                        <th class="py-4 px-6 text-left">Kode Kamar</th>
                        <th class="py-4 px-6 text-left">Nama Kamar</th>
                        <th class="py-4 px-6 text-left">Gambar</th>
                        <th class="py-4 px-6 text-left">Status</th>
                        <th class="py-4 px-6 text-left">Tipe Kamar</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="room-table" class="text-gray-700">
                    @forelse($rooms as $index => $room)
                        <tr class="odd:bg-white even:bg-blue-50 hover:bg-blue-100 transition duration-200">
                            <td class="py-4 px-6">{{ $index + 1 }}</td>
                            <td class="py-4 px-6 font-semibold">{{ $room->id_room_222320 }}</td>
                            <td class="py-4 px-6 font-semibold">{{ $room->nama_kamar_222320 }}</td>
                            <td class="py-4 px-6">
                                <div class="h-16 w-24 rounded overflow-hidden">
                                    @if ($room->gambar_222320)
                                        <img src="{{ asset('storage/' . $room->gambar_222320) }}"
                                            alt="{{ $room->nama_kamar_222320 }}" class="h-full w-full object-cover">
                                    @else
                                        <div class="h-full w-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-500 text-xs">No Image</span>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td class="py-4 px-6">
                                <select onchange="updateStatus('{{ $room->id_room_222320 }}', this.value)"
                                    class="bg-white border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    id="status-{{ $room->id_room_222320 }}">
                                    <option value="available" {{ $room->status_222320 == 'available' ? 'selected' : '' }}>
                                        Available</option>
                                    <option value="booked" {{ $room->status_222320 == 'booked' ? 'selected' : '' }}>
                                        Booked</option>

                                </select>

                            </td>
                            <td class="py-4 px-6">{{ $room->tipeRoom->nama_tipe_222320 ?? 'N/A' }}</td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.rooms.show', $room->id_room_222320) }}"
                                        class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition"
                                        title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.rooms.edit', $room->id_room_222320) }}"
                                        class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.rooms.destroy', $room->id_room_222320) }}"
                                        method="POST" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-6 px-6 text-center text-gray-500">Tidak ada data kamar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="flex items-center justify-between border-t border-blue-100 bg-white px-4 py-3 sm:px-6 mt-4">
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan kamar
                        </p>
                    </div>
                    <div>
                        {{-- {{ $rooms->links() ?? '' }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Notification Toast -->
    <div id="toast" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            <span id="toastMessage"></span>
        </div>
    </div>

    <!-- Confirmation Dialog for Delete -->
    <script>
        let currentRoomId = null;

        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus kamar ini?');
        }

        // Fungsi untuk mencari kamar
        function searchRooms() {
            const input = document.getElementById('search');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('room-table');
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


        function updateStatus(roomId, newStatus) {
            const selectElement = document.getElementById(`status-${roomId}`);
            // Store the original value from a data attribute, or find the initially selected option
            let originalStatus = selectElement.dataset.originalStatus;

            if (!originalStatus) {
                for (let i = 0; i < selectElement.options.length; i++) {
                    if (selectElement.options[i].defaultSelected) {
                        originalStatus = selectElement.options[i].value;
                        selectElement.dataset.originalStatus = originalStatus; // Store it for future changes
                        break;
                    }
                }
            }

            fetch(`/admin/rooms/${roomId}/change-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        status_222320: newStatus
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        // If response is not ok, read the error message and throw an error
                        return response.json().then(err => {
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // On success, update the 'defaultSelected' and 'originalStatus' to the new value
                        for (let i = 0; i < selectElement.options.length; i++) {
                            selectElement.options[i].defaultSelected = (selectElement.options[i].value === newStatus);
                        }
                        selectElement.dataset.originalStatus = newStatus;
                        showToast('Status updated successfully', 'success');
                    } else {
                        // Revert select to the original value if the server returns success: false
                        selectElement.value = originalStatus;
                        showToast(data.message || 'Failed to update status', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Revert select to the original value on any fetch error
                    selectElement.value = originalStatus;
                    showToast(error.message || 'An error occurred while updating status', 'error');
                });
        }
        // Toast Notification Function
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');

            toastMessage.textContent = message;

            // Update toast color based on type
            const toastContainer = toast.querySelector('div');
            if (type === 'error') {
                toastContainer.className = 'bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg';
            } else {
                toastContainer.className = 'bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg';
            }

            toast.classList.remove('hidden');

            // Auto hide after 3 seconds
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('stockModal');
            if (event.target === modal) {
                closeStockModal();
            }
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeStockModal();
            }
        });
    </script>
@endsection
