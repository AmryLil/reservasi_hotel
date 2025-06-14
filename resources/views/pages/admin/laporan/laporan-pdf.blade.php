<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Reservasi Hotel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .header h1 {
            color: #333;
            margin: 0;
        }

        .info {
            margin-bottom: 20px;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 5px 0;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .summary-card {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            width: 23%;
            border: 1px solid #dee2e6;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .status {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-completed {
            background-color: #cce7ff;
            color: #004085;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>LAPORAN RESERVASI HOTEL</h1>
        <p>
            @if ($tanggal_mulai && $tanggal_akhir)
                Periode: {{ \Carbon\Carbon::parse($tanggal_mulai)->format('d F Y') }} -
                {{ \Carbon\Carbon::parse($tanggal_akhir)->format('d F Y') }}
            @else
                Semua Data Reservasi
            @endif
        </p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td><strong>Tanggal Cetak:</strong></td>
                <td>{{ $tanggal_cetak }}</td>
                <td><strong>Total Reservasi:</strong></td>
                <td>{{ $total_reservasi }} reservasi</td>
            </tr>
            <tr>
                <td><strong>Total Pendapatan:</strong></td>
                <td>Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</td>
                <td><strong>Status Pending:</strong></td>
                <td>{{ $bookings->where('status_222320', 'pending')->count() }} reservasi</td>
            </tr>
        </table>
    </div>

    @if ($bookings->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Booking</th>
                    <th>Nama Tamu</th>
                    <th>Tipe Room</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>#{{ $booking->id_booking_222320 }}</td>
                        <td>{{ $booking->user->nama_222320 ?? 'N/A' }}</td>
                        <td>{{ $booking->room->tipeRoom->nama_tipe_222320 ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_checkout_222320)->format('d/m/Y') }}</td>
                        <td>
                            <span class="status status-{{ $booking->status_222320 }}">
                                {{ ucfirst($booking->status_222320) }}
                            </span>
                        </td>
                        <td>Rp {{ number_format($booking->total_harga_222320, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 50px;">
            <p>Tidak ada data reservasi untuk periode yang dipilih.</p>
        </div>
    @endif

    <div class="footer">
        <p>Laporan ini digenerate secara otomatis pada {{ $tanggal_cetak }}</p>
    </div>
</body>

</html>
