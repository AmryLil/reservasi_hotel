<?php

namespace App\Http\Controllers;

use App\Helpers\IdGenerator;
use App\Models\Booking;
use App\Models\Room;
use App\Models\TipeRoom;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    /**
     * Display a listing of available rooms for reservation
     */
    public function index(Request $request)
    {
        $query = Room::with('tipeRoom')
            ->where('status_222320', 'tersedia');

        // Filter by room type if specified
        if ($request->has('tipe_room') && $request->tipe_room != '') {
            $query->where('tipe_id_222320', $request->tipe_room);
        }

        // Filter by date availability
        if ($request->has('tanggal_checkin') && $request->has('tanggal_checkout')) {
            $checkin  = $request->tanggal_checkin;
            $checkout = $request->tanggal_checkout;

            // Exclude rooms that are already booked in the requested date range
            $query->whereDoesntHave('bookings', function ($q) use ($checkin, $checkout) {
                $q
                    ->where('status_222320', '!=', 'dibatalkan')
                    ->where(function ($dateQuery) use ($checkin, $checkout) {
                        $dateQuery
                            ->whereBetween('tanggal_checkin_222320', [$checkin, $checkout])
                            ->orWhereBetween('tanggal_checkout_222320', [$checkin, $checkout])
                            ->orWhere(function ($overlapQuery) use ($checkin, $checkout) {
                                $overlapQuery
                                    ->where('tanggal_checkin_222320', '<=', $checkin)
                                    ->where('tanggal_checkout_222320', '>=', $checkout);
                            });
                    });
            });
        }

        $rooms     = $query->paginate(10);
        $tipeRooms = TipeRoom::all();

        return view('pages.admin.reservasi.index', compact('rooms', 'tipeRooms'));
    }

    /**
     * Show the form for creating a new reservation
     */
    public function create($roomId)
    {
        $room = Room::with('tipeRoom')->findOrFail($roomId);

        if ($room->status_222320 !== 'tersedia') {
            return redirect()->back()->with('error', 'Kamar tidak tersedia untuk reservasi');
        }

        return view('reservasi.create', compact('room'));
    }

    /**
     * Store a newly created reservation
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_room_222320'          => 'required|exists:room_222320,id_room_222320',
            'tanggal_checkin_222320'  => 'required|date|after_or_equal:today',
            'tanggal_checkout_222320' => 'required|date|after:tanggal_checkin_222320',
            'catatan_222320'          => 'nullable|string|max:500'
        ]);

        DB::beginTransaction();

        try {
            // Check room availability again
            $room = Room::with('tipeRoom')->findOrFail($request->id_room_222320);

            if ($room->status_222320 !== 'available') {
                throw new \Exception('Kamar tidak tersedia');
            }

            // Check for conflicting bookings
            $conflictingBooking = Booking::where('id_room_222320', $request->id_room_222320)
                ->where('status_222320', '!=', 'dibatalkan')
                ->where(function ($q) use ($request) {
                    $q
                        ->whereBetween('tanggal_checkin_222320', [$request->tanggal_checkin_222320, $request->tanggal_checkout_222320])
                        ->orWhereBetween('tanggal_checkout_222320', [$request->tanggal_checkin_222320, $request->tanggal_checkout_222320])
                        ->orWhere(function ($overlapQuery) use ($request) {
                            $overlapQuery
                                ->where('tanggal_checkin_222320', '<=', $request->tanggal_checkin_222320)
                                ->where('tanggal_checkout_222320', '>=', $request->tanggal_checkout_222320);
                        });
                })
                ->exists();

            if ($conflictingBooking) {
                throw new \Exception('Tanggal yang dipilih sudah dipesan');
            }

            // Calculate total days and price
            $checkin    = Carbon::parse($request->tanggal_checkin_222320);
            $checkout   = Carbon::parse($request->tanggal_checkout_222320);
            $totalHari  = $checkin->diffInDays($checkout);
            $totalHarga = $totalHari * $room->tipeRoom->harga_222320;

            // Create booking
            $booking = Booking::create([
                'email_222320'            => Auth::user()->email_222320,
                'id_room_222320'          => $request->id_room_222320,
                'tanggal_checkin_222320'  => $request->tanggal_checkin_222320,
                'tanggal_checkout_222320' => $request->tanggal_checkout_222320,
                'jumlah_tamu_222320'      => 3,
                'total_harga_222320'      => $totalHarga,
                'status_222320'           => 'menunggu_konfirmasi',
                'catatan_222320'          => $request->catatan_222320,
                'tanggal_booking_222320'  => now()
            ]);

            // Update room status to reserved temporarily
            $room->update(['status_222320' => 'booked']);

            DB::commit();

            return redirect()
                ->route('reservasi.user', $booking->id_booking_222320)
                ->with('success', 'Reservasi berhasil dibuat. Menunggu konfirmasi admin.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified reservation
     */
    public function show($id)
    {
        $booking = Booking::with(['room.tipeRoom', 'user'])
            ->where('id_booking_222320', $id)
            ->firstOrFail();

        // Check if user owns this booking or is admin
        if (!Auth::user()->role_222320 == 'admin' && $booking->email_222320 !== Auth::user()->email_222320) {
            abort(403);
        }

        return view('pages.admin.reservasi.show', compact('booking'));
    }

    /**
     * Update reservation status (Admin only)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status'        => 'required|in:menunggu_konfirmasi,dikonfirmasi,checkin,checkout,dibatalkan',
            'catatan_admin' => 'nullable|string|max:500'
        ]);

        DB::beginTransaction();

        try {
            $booking   = Booking::with('room')->findOrFail($id);
            $oldStatus = $booking->status_222320;
            $newStatus = $request->status;

            // Jangan proses jika status tidak berubah
            if ($oldStatus === $newStatus) {
                return redirect()->back()->with('info', 'Status tidak berubah.');
            }

            // === LOGIKA VALIDASI ALUR STATUS ===
            if ($newStatus === 'checkin') {
                if ($oldStatus !== 'dikonfirmasi') {
                    throw new \Exception("Gagal. Status harus 'Dikonfirmasi' sebelum bisa diubah ke 'Check-in'.");
                }
                $today       = Carbon::today();
                $checkinDate = Carbon::parse($booking->tanggal_checkin_222320);
                if ($today->lt($checkinDate)) {
                    throw new \Exception('Gagal. Belum waktunya untuk check-in.');
                }
                $booking->waktu_checkin_222320 = now();
            }

            if ($newStatus === 'checkout') {
                if ($oldStatus !== 'checkin') {
                    throw new \Exception("Gagal. Status harus 'Check-in' sebelum bisa diubah ke 'Checkout'.");
                }
                $booking->waktu_checkout_222320 = now();
            }

            if ($newStatus === 'dibatalkan') {
                if (in_array($oldStatus, ['checkin', 'checkout'])) {
                    throw new \Exception('Reservasi yang sudah check-in atau checkout tidak dapat dibatalkan.');
                }
                $booking->tanggal_pembatalan_222320 = now();
            }

            // Update status utama
            $booking->status_222320        = $newStatus;
            $booking->catatan_admin_222320 = $request->catatan_admin;

            $booking->save();

            // Update status kamar berdasarkan status booking baru
            $this->updateRoomStatus($booking, $oldStatus, $newStatus);

            DB::commit();

            return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Cancel reservation (User can cancel their own booking)
     */
    public function cancel($id)
    {
        DB::beginTransaction();

        try {
            $booking = Booking::with('room')->findOrFail($id);

            // Check if user owns this booking
            if ($booking->email_222320 !== Auth::user()->email_222320) {
                abort(403);
            }

            // Check if booking can be cancelled
            if (in_array($booking->status_222320, ['checkin', 'checkout', 'dibatalkan'])) {
                throw new \Exception('Reservasi tidak dapat dibatalkan');
            }

            // Check cancellation deadline (e.g., 24 hours before checkin)
            $checkinDate = Carbon::parse($booking->tanggal_checkin_222320);
            if ($checkinDate->diffInHours(now()) < 24) {
                throw new \Exception('Pembatalan harus dilakukan minimal 24 jam sebelum check-in');
            }

            $booking->update([
                'status_222320'             => 'dibatalkan',
                'tanggal_pembatalan_222320' => now()
            ]);

            // Update room status back to available
            $booking->room->update(['status_222320' => 'tersedia']);

            DB::commit();

            return redirect()
                ->route('reservasi.riwayat')
                ->with('success', 'Reservasi berhasil dibatalkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show user's reservation history
     */
    public function riwayat()
    {
        $bookings = Booking::with(['room.tipeRoom'])
            ->where('email_222320', Auth::user()->email_222320)
            ->orderBy('tanggal_booking_222320', 'desc')
            ->paginate(10);

        return view('reservasi.riwayat', compact('bookings'));
    }

    /**
     * Show all reservations (Admin only)
     */
    public function adminIndex(Request $request)
    {
        $query = Booking::with(['room.tipeRoom', 'user']);

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status_222320', $request->status);
        }

        // Filter by date range
        if ($request->has('tanggal_mulai') && $request->tanggal_mulai != '') {
            $query->whereDate('tanggal_booking_222320', '>=', $request->tanggal_mulai);
        }

        if ($request->has('tanggal_akhir') && $request->tanggal_akhir != '') {
            $query->whereDate('tanggal_booking_222320', '<=', $request->tanggal_akhir);
        }

        // Search by user name or booking ID
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q
                    ->where('id_booking_222320', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $bookings = $query->orderBy('tanggal_booking_222320', 'desc')->paginate(15);

        return view('pages.admin.reservasi.index', compact('bookings'));
    }

    /**
     * Get reservation statistics (Admin only)
     */
    public function statistik()
    {
        $today     = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();
        $thisYear  = Carbon::now()->startOfYear();

        $stats = [
            'total_reservasi'      => Booking::count(),
            'reservasi_hari_ini'   => Booking::whereDate('tanggal_booking_222320', $today)->count(),
            'reservasi_bulan_ini'  => Booking::whereDate('tanggal_booking_222320', '>=', $thisMonth)->count(),
            'reservasi_tahun_ini'  => Booking::whereDate('tanggal_booking_222320', '>=', $thisYear)->count(),
            'menunggu_konfirmasi'  => Booking::where('status_222320', 'menunggu_konfirmasi')->count(),
            'dikonfirmasi'         => Booking::where('status_222320', 'dikonfirmasi')->count(),
            'checkin_hari_ini'     => Booking::whereDate('tanggal_checkin_222320', $today)
                ->where('status_222320', 'dikonfirmasi')
                ->count(),
            'checkout_hari_ini'    => Booking::whereDate('tanggal_checkout_222320', $today)
                ->where('status_222320', 'checkin')
                ->count(),
            'total_pendapatan'     => Booking::whereIn('status_222320', ['checkin', 'checkout'])
                ->sum('total_harga_222320'),
            'pendapatan_bulan_ini' => Booking::whereIn('status_222320', ['checkin', 'checkout'])
                ->whereDate('tanggal_booking_222320', '>=', $thisMonth)
                ->sum('total_harga_222320')
        ];

        // Monthly booking chart data
        $monthlyBookings = Booking::selectRaw('MONTH(tanggal_booking_222320) as month, COUNT(*) as total')
            ->whereYear('tanggal_booking_222320', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('pages.admin.reservasi.statistik', compact('stats', 'monthlyBookings'));
    }

    /**
     * Check room availability for AJAX requests
     */
    public function checkAvailability(Request $request)
    {
        $request->validate([
            'room_id'          => 'required|exists:room_222320,id_room_222320',
            'tanggal_checkin'  => 'required|date',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin'
        ]);

        $isAvailable = !Booking::where('id_room_222320', $request->room_id)
            ->where('status_222320', '!=', 'dibatalkan')
            ->where(function ($q) use ($request) {
                $q
                    ->whereBetween('tanggal_checkin_222320', [$request->tanggal_checkin, $request->tanggal_checkout])
                    ->orWhereBetween('tanggal_checkout_222320', [$request->tanggal_checkin, $request->tanggal_checkout])
                    ->orWhere(function ($overlapQuery) use ($request) {
                        $overlapQuery
                            ->where('tanggal_checkin_222320', '<=', $request->tanggal_checkin)
                            ->where('tanggal_checkout_222320', '>=', $request->tanggal_checkout);
                    });
            })
            ->exists();

        return response()->json([
            'available' => $isAvailable,
            'message'   => $isAvailable ? 'Kamar tersedia' : 'Kamar tidak tersedia untuk tanggal tersebut'
        ]);
    }

    /**
     * Process check-in
     */
    public function checkin($id)
    {
        DB::beginTransaction();

        try {
            $booking = Booking::with('room')->findOrFail($id);

            if ($booking->status_222320 !== 'dikonfirmasi') {
                throw new \Exception('Reservasi belum dikonfirmasi');
            }

            $today       = Carbon::today();
            $checkinDate = Carbon::parse($booking->tanggal_checkin_222320);

            if ($today->lt($checkinDate)) {
                throw new \Exception('Belum waktunya check-in');
            }

            $booking->update([
                'status_222320'        => 'checkin',
                'waktu_checkin_222320' => now()
            ]);

            $booking->room->update(['status_222320' => 'ditempati']);

            DB::commit();

            return redirect()->back()->with('success', 'Check-in berhasil');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Process check-out
     */
    public function checkout($id)
    {
        DB::beginTransaction();

        try {
            $booking = Booking::with('room')->findOrFail($id);

            if ($booking->status_222320 !== 'checkin') {
                throw new \Exception('Tamu belum check-in');
            }

            $booking->update([
                'status_222320'         => 'checkout',
                'waktu_checkout_222320' => now()
            ]);

            $booking->room->update(['status_222320' => 'tersedia']);

            DB::commit();

            return redirect()->back()->with('success', 'Check-out berhasil');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update room status based on booking status changes
     */
    private function updateRoomStatus($booking, $oldStatus, $newStatus)
    {
        $room = $booking->room;

        if (!$room)
            return;

        switch ($newStatus) {
            case 'dikonfirmasi':
                $room->update(['status_222320' => 'booked']);
                break;

            case 'checkin':
                $room->update(['status_222320' => 'booked']);  // Menggunakan 'ditempati' agar konsisten
                break;

            case 'checkout':
            case 'dibatalkan':
                // Hanya ubah ke 'tersedia' jika tidak ada booking lain yang aktif untuk kamar ini
                $isStillBooked = Booking::where('id_room_222320', $room->id_room_222320)
                    ->where('status_222320', 'in', ['dikonfirmasi', 'checkin'])
                    ->exists();
                if (!$isStillBooked) {
                    $room->update(['status_222320' => 'available']);
                }
                break;
        }
    }

    /**
     * Generate reservation report
     */
    public function laporan(Request $request)
    {
        // Validasi hanya dijalankan jika ada input filter
        if ($request->has('filter_type')) {
            $request->validate([
                'filter_type'   => 'in:harian,mingguan,bulanan,tahunan,custom',
                'tanggal'       => 'nullable|required_if:filter_type,harian|date',
                'minggu'        => 'nullable|required_if:filter_type,mingguan|date',
                'bulan'         => 'nullable|required_if:filter_type,bulanan|integer|between:1,12',
                'tahun_bulan'   => 'nullable|required_if:filter_type,bulanan|integer',
                'tahun'         => 'nullable|required_if:filter_type,tahunan|integer',
                'tanggal_mulai' => 'nullable|required_if:filter_type,custom|date',
                'tanggal_akhir' => 'nullable|required_if:filter_type,custom|date|after_or_equal:tanggal_mulai',
                'format'        => 'nullable|in:pdf,excel'
            ]);
        }

        // Query dasar untuk booking
        $bookingQuery = Booking::query();

        // Terapkan filter HANYA JIKA ada request filter_type
        if ($request->has('filter_type') && !empty($request->filter_type)) {
            $filterType = $request->input('filter_type');
            switch ($filterType) {
                case 'harian':
                    $bookingQuery->whereDate('tanggal_booking_222320', $request->tanggal);
                    break;
                case 'mingguan':
                    $startOfWeek = Carbon::parse($request->minggu)->startOfWeek();
                    $endOfWeek   = Carbon::parse($request->minggu)->endOfWeek();
                    $bookingQuery->whereBetween('tanggal_booking_222320', [$startOfWeek, $endOfWeek]);
                    break;
                case 'bulanan':
                    $bookingQuery
                        ->whereMonth('tanggal_booking_222320', $request->bulan)
                        ->whereYear('tanggal_booking_222320', $request->tahun_bulan);
                    break;
                case 'tahunan':
                    $bookingQuery->whereYear('tanggal_booking_222320', $request->tahun);
                    break;
                case 'custom':
                    if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
                        $bookingQuery->whereBetween('tanggal_booking_222320', [$request->tanggal_mulai, $request->tanggal_akhir]);
                    }
                    break;
            }
        }

        // --- Kalkulasi statistik SELALU dijalankan berdasarkan query (yang mungkin sudah difilter atau belum) ---
        $topRoomData   = (clone $bookingQuery)
            ->select('id_room_222320', DB::raw('COUNT(*) as total_bookings'))
            ->whereNotNull('id_room_222320')
            ->groupBy('id_room_222320')
            ->orderByDesc('total_bookings')
            ->first();
        $topBookedRoom = $topRoomData ? Room::find($topRoomData->id_room_222320) : null;

        $topTipeRoomData   = (clone $bookingQuery)
            ->join('room_222320', 'booking_222320.id_room_222320', '=', 'room_222320.id_room_222320')
            ->select('room_222320.tipe_id_222320', DB::raw('COUNT(*) as total_bookings'))
            ->whereNotNull('room_222320.tipe_id_222320')
            ->groupBy('room_222320.tipe_id_222320')
            ->orderByDesc('total_bookings')
            ->first();
        $topBookedTipeRoom = $topTipeRoomData ? TipeRoom::find($topTipeRoomData->tipe_id_222320) : null;

        // Ambil data booking utama dengan relasi
        $bookings = $bookingQuery
            ->with(['room.tipeRoom', 'user'])
            ->orderBy('tanggal_booking_222320', 'desc')
            ->get();

        // Setel variabel `$showResults` menjadi true jika ada filter atau jika tidak ada filter sama sekali
        // Ini memastikan tabel hasil selalu ditampilkan, kecuali saat filter dipilih tapi tidak menghasilkan apa-apa.
        $showResults = true;

        // Handle export PDF atau Excel
        if ($request->has('format')) {
            if ($request->format === 'pdf') {
                return $this->generatePDF($bookings, $request, $topBookedRoom, $topBookedTipeRoom);
            }
            // ... (handle excel jika ada)
        }

        // Tampilkan view laporan utama
        return view('pages.admin.laporan.laporan', compact(
            'bookings', 'showResults', 'topBookedRoom', 'topBookedTipeRoom', 'request'
        ));
    }

    public function generatePDF($bookings, $request, $topBookedRoom, $topBookedTipeRoom)
    {
        $data = [
            'bookings'          => $bookings,
            'request'           => $request,
            'topBookedRoom'     => $topBookedRoom,
            'topBookedTipeRoom' => $topBookedTipeRoom,
            'tanggal_cetak'     => Carbon::now()->translatedFormat('d F Y, H:i'),
            'total_reservasi'   => $bookings->count(),
            'total_pendapatan'  => $bookings->whereNotIn('status_222320', ['dibatalkan'])->sum('total_harga_222320'),
        ];

        // Menggunakan library barryvdh/laravel-dompdf
        $pdf = PDF::loadView('pages.admin.laporan.laporan-pdf', $data);

        // Nama file dinamis berdasarkan filter
        $fileName = 'laporan-reservasi-' . now()->timestamp . '.pdf';

        return $pdf->stream($fileName);
    }
}
