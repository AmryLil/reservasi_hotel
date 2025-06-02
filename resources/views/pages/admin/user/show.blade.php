@extends('layouts.dashboard-layout')

@section('content')
    <div class="rounded-xl w-full bg-white p-6 shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-blue-800">Detail User</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="font-semibold text-lg mb-2">Nama</h2>
                <p>{{ $user->nama_222320 }}</p>
            </div>
            <div>
                <h2 class="font-semibold text-lg mb-2">Email</h2>
                <p>{{ $user->email_222320 }}</p>
            </div>
            <div>
                <h2 class="font-semibold text-lg mb-2">Phone</h2>
                <p>{{ $user->phone_222320 }}</p>
            </div>
            <div>
                <h2 class="font-semibold text-lg mb-2">Alamat</h2>
                <p>{{ $user->alamat_222320 }}</p>
            </div>
            <div>
                <h2 class="font-semibold text-lg mb-2">Gender</h2>
                <p>{{ ucfirst($user->gender_222320) }}</p>
            </div>
            <div>
                <h2 class="font-semibold text-lg mb-2">Role</h2>
                <p>{{ ucfirst($user->role_222320) }}</p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.users.index') }}"
                class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition font-semibold">
                Kembali
            </a>
            <a href="{{ route('admin.users.edit', $user->email_222320) }}"
                class="ml-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                Edit
            </a>
        </div>
    </div>
@endsection
