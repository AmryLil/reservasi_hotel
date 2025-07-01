<!DOCTYPE html>
<!-- File: resources/views/pages/admin/laporan/laporan-pdf.blade.php -->
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Reservasi</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 10px;
            color: #333;
        }

        @page {
            margin: 25px 35px;
        }

        .header-container {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
            position: relative;
        }

        .header-container .logo {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 18px;
            font-weight: bold;
            color: #555;
        }

        .header-container h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #222;
        }

        .header-container p {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #666;
        }

        .summary-container {
            margin-bottom: 25px;
            border: 1px solid #ddd;
            background-color: #fdfdfd;
            padding: 15px;
            border-radius: 5px;
        }

        .summary-container h2 {
            margin: 0 0 15px 0;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
            color: #333;
        }

        .summary-table {
            width: 100%;
        }

        .summary-table td {
            width: 33.33%;
            vertical-align: top;
            padding: 8px 5px;
            font-size: 11px;
        }

        .summary-label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 4px;
            font-size: 10px;
            text-transform: uppercase;
        }

        .summary-value {
            font-size: 14px;
            font-weight: bold;
            color: #000;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
        }

        .main-table th,
        .main-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            vertical-align: middle;
        }

        .main-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
        }

        .main-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .status {
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 9px;
            font-weight: bold;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .status-dikonfirmasi {
            background-color: #e0f2fe;
            color: #0c4a6e;
            border: 1px solid #bae6fd;
        }

        .status-checkin {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-checkout {
            background-color: #f3f4f6;
            color: #374151;
            border: 1px solid #e5e7eb;
        }

        .status-dibatalkan {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .footer {
            position: fixed;
            bottom: -25px;
            /* Adjust to be inside margin */
            left: 0px;
            right: 0px;
            height: 40px;
            text-align: center;
            font-size: 9px;
            color: #888;
        }

        .page-number:before {
            content: "Halaman " counter(page);
        }

        .no-data {
            text-align: center;
            padding: 60px 20px;
            border: 1px dashed #ccc;
            margin-top: 20px;
            background-color: #fafafa;
        }

        .no-data p {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <div class="logo">Nama Hotel</div>
        <h1>Laporan Reservasi</h1>
        <p>{{ $periode_laporan }}</p>
    </div>

    <div class="summary-container">
        <h2>Ringkasan Laporan</h2>
        <table class="summary-table">
            <tr>
                <td>
                    <span class="summary-label">Total Pendapatan</span>
                    <span class="summary-value" style="color: #166534;">Rp
                        {{ number_format($total_pendapatan, 0, ',', '.') }}</span>
                </td>
                <td>
                    <span class="summary-label">Total Reservasi</span>
                    <span class="summary-value">{{ $total_reservasi }}</span>
                </td>
                <td>
                    <span class="summary-label">Kamar Terlaris</span>
                    <span class="summary-value">{{ $topBookedRoom->nama_kamar_222320 ?? 'N/A' }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="summary-label">Reservasi Sukses</span>
                    <span class="summary-value" style="color: #0c4a6e;">{{ $successfulBookingsCount }}</span>
                </td>
                <td>
                    <span class="summary-label">Reservasi Dibatalkan</span>
                    <span class="summary-value" style="color: #991b1b;">{{ $cancelledBookingsCount }}</span>
                </td>
                <td>
                    <span class="summary-label">Tipe Kamar Terlaris</span>
                    <span class="summary-value">{{ $topBookedTipeRoom->nama_tipe_222320 ?? 'N/A' }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="summary-label">Pelanggan Teratas</span>
                    <span class="summary-value">{{ $topCustomer->nama_222320 ?? 'N/A' }}</span>
                </td>
                <td>
                    <span class="summary-label">Tanggal Cetak</span>
                    <span class="summary-value">{{ $tanggal_cetak }}</span>
                </td>
                <td>
                    {{-- Kosong untuk keseimbangan layout --}}
                </td>
            </tr>
        </table>
    </div>

    @if ($bookings->count() > 0)
        <table class="main-table">
            <thead>
                <tr>
                    <th width="25" class="text-center">No</th>
                    <th>ID Booking</th>
                    <th>Nama Tamu</th>
                    <th>Kamar</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th class="text-center">Status</th>
                    <th class="text-right">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $index => $booking)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>#{{ substr($booking->id_booking_222320, -8) }}</td>
                        <td>{{ $booking->user->nama_222320 ?? 'N/A' }}</td>
                        <td>
                            <strong>{{ $booking->room->nama_kamar_222320 ?? 'N/A' }}</strong><br>
                            <small
                                style="color: #555;">{{ $booking->room->tipeRoom->nama_tipe_222320 ?? 'N/A' }}</small>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_checkout_222320)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <span class="status status-{{ $booking->status_222320 }}">
                                {{ str_replace('_', ' ', $booking->status_222320) }}
                            </span>
                        </td>
                        <td class="text-right">Rp {{ number_format($booking->total_harga_222320, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            <p>Tidak ada data reservasi untuk periode yang dipilih.</p>
        </div>
    @endif

    <div class="footer">
        Laporan ini dibuat oleh sistem pada {{ $tanggal_cetak }}
        <span class="page-number"></span>
    </div>
</body>

</html>
