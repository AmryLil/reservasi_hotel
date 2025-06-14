@extends('layouts.dashboard-layout')

@section('content')
    <div class="rounded-xl w-full bg-white p-6 shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-blue-800">Tambah User Baru</h1>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama_222320" class="block font-semibold mb-1">Nama</label>
                    <input type="text" name="nama_222320" id="nama_222320" value="{{ old('nama_222320') }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="email_222320" class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email_222320" id="email_222320" value="{{ old('email_222320') }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="phone_222320" class="block font-semibold mb-1">Phone</label>
                    <input type="text" name="phone_222320" id="phone_222320" value="{{ old('phone_222320') }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="alamat_222320" class="block font-semibold mb-1">Alamat</label>
                    <input type="text" name="alamat_222320" id="alamat_222320" value="{{ old('alamat_222320') }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="gender_222320" class="block font-semibold mb-1">Gender</label>
                    <select name="gender_222320" id="gender_222320"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Gender</option>
                        <option value="male" {{ old('gender_222320') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender_222320') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div>
                    <label for="role_222320" class="block font-semibold mb-1">Role</label>
                    <select name="role_222320" id="role_222320"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Pilih Role</option>
                        <option value="admin" {{ old('role_222320') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role_222320') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <div>
                    <label for="password_222320" class="block font-semibold mb-1">Password</label>
                    <input type="password" name="password_222320" id="password_222320"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="password_222320_confirmation" class="block font-semibold mb-1">Confirm Password</label>
                    <input type="password" name="password_222320_confirmation" id="password_222320_confirmation"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                    Simpan
                </button>
                <a href="{{ route('admin.users.index') }}"
                    class="ml-4 text-gray-600 hover:text-gray-900 font-semibold">Batal</a>
            </div>
        </form>
    </div>
@endsection
