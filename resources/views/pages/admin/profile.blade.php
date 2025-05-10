@extends('layouts.dashboard-layout')

@section('content')
    <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Banner Section with Gradient Blue -->
        <div class="h-64 relative bg-gradient-to-r from-blue-500 to-blue-600">
            <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E')"></div>
        </div>

        <!-- Profile Section -->
        <form id="profileForm" action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center relative px-6 lg:px-24 xl:px-32">
            <!-- Avatar Section -->
            <div class="absolute top-[-90px] text-center flex flex-col items-center">
                <label for="avatarInput" class="cursor-pointer relative">
                    <div class="h-40 w-40 rounded-full bg-white p-1 shadow-lg">
                        <div class="h-full w-full rounded-full bg-white p-1 border-2 border-blue-100 overflow-hidden">
                            <img id="avatarPreview" class="h-full w-full object-cover rounded-full transition duration-300"
                                src="{{ asset('images/banner.png') }}" 
                                alt="Profile Image">
                        </div>
                    </div>
                    <div class="absolute bottom-2 right-2 bg-blue-500 p-2 rounded-full shadow-md transition-all duration-300 transform hover:scale-110" id="iconedit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                </label>
                <input type="file" id="avatarInput" class="hidden" accept="image/*" name="profile_photo">
                <div class="mt-6 text-center">
                    <h2 class="text-3xl font-bold text-gray-800">Username</h2>
                    <p class="flex items-center justify-center text-blue-500 text-lg mt-1 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span id="addressDisplay">alamat</span>
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-3 mt-4 absolute top-[-30px] right-6 sm:right-12 lg:right-24">
                <button type="button" id="editBtn" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 flex items-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Update Profile
                </button>
            </div>

            <!-- Profile Form -->
            <div class="w-full px-6 py-4 mt-56 mb-12">
                @csrf
                @method('PUT')
                
                <div class="max-w-4xl mx-auto bg-blue-50 rounded-xl p-6 shadow-inner">
                    <h3 class="text-xl font-semibold text-blue-800 mb-4 border-b border-blue-200 pb-2">Personal Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
                        <div class="form-group">
                            <label class="block font-semibold text-gray-700 mb-1.5">Username</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <input type="text" name="name" id="username" class="w-full border border-blue-100 rounded-lg p-2.5 pl-10 bg-white disabled:bg-gray-50 disabled:text-gray-500 transition duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" value="Username" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="block font-semibold text-gray-700 mb-1.5">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                <input type="email" name="email" id="email" class="w-full border border-blue-100 rounded-lg p-2.5 pl-10 bg-white disabled:bg-gray-50 disabled:text-gray-500 transition duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="block font-semibold text-gray-700 mb-1.5">Alamat</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </span>
                                <input type="text" name="address" id="alamat" class="w-full border border-blue-100 rounded-lg p-2.5 pl-10 bg-white disabled:bg-gray-50 disabled:text-gray-500 transition duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="block font-semibold text-gray-700 mb-1.5">Phone</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </span>
                                <input type="text" name="phone" id="phone" class="w-full border border-blue-100 rounded-lg p-2.5 pl-10 bg-white disabled:bg-gray-50 disabled:text-gray-500 transition duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="block font-semibold text-gray-700 mb-1.5">Tanggal Lahir</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                <input type="date" name="birth_date" id="dob" class="w-full border border-blue-100 rounded-lg p-2.5 pl-10 bg-white disabled:bg-gray-50 disabled:text-gray-500 transition duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="block font-semibold text-gray-700 mb-1.5">Jenis Kelamin</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <select id="gender" name="gender" class="w-full border border-blue-100 rounded-lg p-2.5 pl-10 bg-white disabled:bg-gray-50 disabled:text-gray-500 transition duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 appearance-none" disabled>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center gap-4 mt-8">
                    <button type="submit" id="saveBtn" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 flex items-center shadow-md hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                    <button type="button" id="cancelBtn" class="px-6 py-2.5 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300 flex items-center shadow-md hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section("scripts")
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editBtn = document.getElementById('editBtn');
        const saveBtn = document.getElementById('saveBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const iconedit = document.getElementById('iconedit');
        const formInputs = document.querySelectorAll('#profileForm input, #profileForm select');
        const addressDisplay = document.getElementById('addressDisplay');
        const alamatInput = document.getElementById('alamat');
        
        // Initially hide the edit icon
        iconedit.classList.add('hidden');
        
        // Update the address display when the address input changes
        alamatInput.addEventListener('input', function() {
            addressDisplay.textContent = this.value || 'alamat';
        });
        
        editBtn.addEventListener('click', function() {
            // Enable all input fields
            formInputs.forEach(input => {
                input.removeAttribute('disabled');
                input.classList.add('border-blue-300');
            });
            
            // Show save and cancel buttons, hide edit button
            saveBtn.classList.remove('hidden');
            cancelBtn.classList.remove('hidden');
            this.classList.add('hidden');
            
            // Show avatar edit icon
            iconedit.classList.remove('hidden');
        });

        cancelBtn.addEventListener('click', function() {
            // Disable all input fields
            formInputs.forEach(input => {
                input.setAttribute('disabled', true);
                input.classList.remove('border-blue-300');
            });
            
            // Show edit button, hide save and cancel buttons
            editBtn.classList.remove('hidden');
            saveBtn.classList.add('hidden');
            this.classList.add('hidden');
            
            // Hide avatar edit icon
            iconedit.classList.add('hidden');
        });

        document.getElementById('avatarInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarPreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Hover effect for avatar
        const avatarPreview = document.getElementById('avatarPreview');
        const avatarLabel = document.querySelector('label[for="avatarInput"]');
        
        avatarLabel.addEventListener('mouseenter', function() {
            if (!editBtn.classList.contains('hidden')) return;
            iconedit.classList.remove('hidden');
        });
        
        avatarLabel.addEventListener('mouseleave', function() {
            if (!editBtn.classList.contains('hidden')) {
                iconedit.classList.add('hidden');
            }
        });
    });
</script>
@endsection