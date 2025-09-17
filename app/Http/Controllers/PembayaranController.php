<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pembayaran;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    // Menampilkan daftar booking user dengan detail kamar
    public function index()
    {
        $userId = Auth::user()->email_222320;

        // Mengambil booking dengan relasi pembayaran dan room beserta tipeRoom
        $bookings = Booking::where('email_222320', $userId)
            ->with(['pembayaran', 'room.tipeRoom'])
            ->orderBy('tanggal_booking_222320', 'desc')
            ->get();

        $vouchers = Voucher::where('id_user_222320', $userId)
            ->where('status_222320', 'tersedia')
            ->where('tanggal_kadaluarsa_222320', '>=', now())  // Cek yang belum kadaluarsa
            ->get();

        return view('pages.users.reservasi', compact('bookings', 'vouchers'));
    }

    public function validateAjax(Request $request)
    {
        $request->validate(['kode_voucher' => 'required|string']);

        $kodeVoucher = $request->input('kode_voucher');
        $user        = Auth::user();

        $voucher = Voucher::where('kode_voucher_222320', $kodeVoucher)->first();

        if (!$voucher) {
            return response()->json(['valid' => false, 'message' => 'Kode voucher tidak ditemukan.'], 404);
        }
        if ($voucher->id_user_222320 !== $user->email_222320) {
            return response()->json(['valid' => false, 'message' => 'Voucher ini bukan milik Anda.'], 403);
        }
        if ($voucher->status_222320 === 'terpakai') {
            return response()->json(['valid' => false, 'message' => 'Voucher sudah pernah digunakan.'], 422);
        }
        if (Carbon::now()->isAfter($voucher->tanggal_kadaluarsa_222320)) {
            return response()->json(['valid' => false, 'message' => 'Voucher sudah kadaluarsa.'], 422);
        }

        // Jika semua validasi lolos
        return response()->json([
            'valid'             => true,
            'message'           => 'Voucher berhasil diterapkan!',
            'persentase_diskon' => $voucher->persentase_diskon_222320
        ]);
    }

    // Menampilkan form pembayaran (khusus QRIS)
    public function showForm($id)
    {
        $booking = Booking::where('id_booking_222320', $id)
            ->with(['room.tipeRoom'])
            ->firstOrFail();

        // Pastikan booking milik user yang sedang login
        if ($booking->email_222320 !== Auth::user()->email_222320) {
            return redirect()
                ->route('pembayaran.index')
                ->with('error', 'Anda tidak memiliki akses ke booking ini.');
        }

        // Pastikan booking belum dibayar
        if ($booking->pembayaran) {
            return redirect()
                ->route('pembayaran.index')
                ->with('info', 'Booking ini sudah memiliki pembayaran.');
        }

        return view('pembayaran.form', compact('booking'));
    }

    // Menyimpan pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'id_booking_222320'       => 'required|exists:booking_222320,id_booking_222320',
            'bukti_pembayaran_222320' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan_222320'       => 'nullable|string|max:500'
        ]);

        // Ambil data booking untuk validasi dan mendapatkan total harga
        $booking = Booking::where('id_booking_222320', $request->id_booking_222320)
            ->firstOrFail();

        // Pastikan booking milik user yang sedang login
        if ($booking->email_222320 !== Auth::user()->email_222320) {
            return redirect()
                ->route('pembayaran.index')
                ->with('error', 'Anda tidak memiliki akses ke booking ini.');
        }

        // Pastikan booking belum memiliki pembayaran
        if ($booking->pembayaran) {
            return redirect()
                ->route('pembayaran.index')
                ->with('error', 'Booking ini sudah memiliki pembayaran.');
        }

        // Upload file bukti pembayaran
        $path = $request
            ->file('bukti_pembayaran_222320')
            ->store('bukti_pembayaran', 'public');

        // Buat record pembayaran baru
        Pembayaran::create([
            'id_booking_222320'         => $request->id_booking_222320,
            'jumlah_bayar_222320'       => $booking->total_harga_222320,
            'metode_pembayaran_222320'  => 'qris',
            'status_pembayaran_222320'  => 'pending',
            'tanggal_pembayaran_222320' => now(),
            'bukti_pembayaran_222320'   => $path,
            'keterangan_222320'         => $request->keterangan_222320,
        ]);

        return redirect()
            ->route('reservasi.user')
            ->with('success', 'Pembayaran berhasil dikirim dan sedang diverifikasi.');
    }

    // Method untuk admin - menampilkan semua pembayaran
    public function adminIndex()
    {
        $pembayarans = Pembayaran::with(['booking.room.tipeRoom', 'booking.user'])
            ->orderBy('tanggal_pembayaran_222320', 'desc')
            ->get();

        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    // Method untuk admin - update status pembayaran
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran_222320' => 'required|in:pending,berhasil,gagal'
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'status_pembayaran_222320' => $request->status_pembayaran_222320
        ]);

        // Jika pembayaran berhasil, update status booking
        if ($request->status_pembayaran_222320 === 'berhasil') {
            $pembayaran->booking->update([
                'status_222320' => 'dikonfirmasi'
            ]);
        }

        if ($request->status_pembayaran_222320 === 'berhasil') {
            $pembayaran->booking->update([
                'status_booking_222320' => 'dikonfirmasi'
            ]);
            $user = $pembayaran->booking->user;

            $jumlahBookingBerhasil = Booking::where('email_222320', $user->email_222320)
                ->whereHas('pembayaran', function ($query) {
                    $query->where('status_pembayaran_222320', 'berhasil');  // Sesuaikan dengan status Anda
                })
                ->count();

            if ($jumlahBookingBerhasil > 0 && $jumlahBookingBerhasil % 3 == 0) {
                Voucher::create([
                    'id_user_222320'            => $user->email_222320,
                    'tipe_222320'               => 'loyalitas',
                    'persentase_diskon_222320'  => 10,  // Anda bisa atur diskonnya
                    'tanggal_kadaluarsa_222320' => Carbon::now()->addMonth(),  // Berlaku 1 bulan
                ]);
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Status pembayaran berhasil diupdate.');
    }
}
