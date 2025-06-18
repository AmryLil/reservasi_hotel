<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Reservasi Hotel</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            margin: 20px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 12px;
        }

        .info {
            margin-bottom: 20px;
            font-size: 11px;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 3px 0;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #ddd;
            padding: 7px;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .status {
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .status-menunggu_konfirmasi {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-dikonfirmasi {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .status-checkin {
            background-color: #d4edda;
            color: #155724;
        }

        .status-checkout {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .status-dibatalkan {
            background-color: #f8d7da;
            color: #721c24;
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
            @switch($request->filter_type)
                @case('harian')
                    Periode Harian: {{ \Carbon\Carbon::parse($request->tanggal)->translatedFormat('d F Y') }}
                @break

                @case('mingguan')
                    Periode Mingguan: {{ \Carbon\Carbon::parse($request->minggu)->startOfWeek()->translatedFormat('d M') }} -
                    {{ \Carbon\Carbon::parse($request->minggu)->endOfWeek()->translatedFormat('d M Y') }}
                @break

                @case('bulanan')
                    @if ($request->filled('bulan') && $request->filled('tahun_bulan'))
                        Periode Bulanan:
                        {{ \Carbon\Carbon::createFromDate($request->tahun_bulan, (int) $request->bulan, 1)->translatedFormat('F') }}
                        {{ $request->tahun_bulan }}
                    @endif
                @break

                @case('tahunan')
                    Periode Tahunan: {{ $request->tahun }}
                @break

                @case('custom')
                    Periode: {{ \Carbon\Carbon::parse($request->tanggal_mulai)->translatedFormat('d F Y') }} -
                    {{ \Carbon\Carbon::parse($request->tanggal_akhir)->translatedFormat('d F Y') }}
                @break

                @default
                    Semua Data Reservasi
            @endswitch
        </p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td width="150"><strong>Tanggal Cetak</strong></td>
                <td>: {{ $tanggal_cetak }}</td>
                <td width="150"><strong>Total Reservasi</strong></td>
                <td>: {{ $total_reservasi }}</td>
            </tr>
            <tr>
                <td><strong>Total Pendapatan</strong></td>
                <td>: Rp {{ number_format($total_pendapatan, 0, ',', '.') }} <small>(tidak termasuk yang
                        dibatalkan)</small></td>
                <td><strong>Kamar Terlaris</strong></td>
                <td>: {{ $topBookedRoom->nama_kamar_222320 ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Tipe Kamar Terlaris</strong></td>
                <td>: {{ $topBookedTipeRoom->nama_tipe_222320 ?? 'N/A' }}</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    @if ($bookings->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th width="25">No</th>
                    <th>ID Booking</th>
                    <th>Nama Tamu</th>
                    <th>Nama Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Status</th>
                    <th class="text-right">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $index => $booking)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>#{{ substr($booking->id_booking_222320, -8) }}</td>
                        <td>{{ $booking->user->nama_222320 ?? 'N/A' }}</td>
                        <td>{{ $booking->room->nama_kamar_222320 ?? 'N/A' }}</td>
                        <td>{{ $booking->room->tipeRoom->nama_tipe_222320 ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_checkout_222320)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <span class="status status-{{ $booking->status_222320 }}">
                                {{ $booking->status_label }}
                            </span>
                        </td>
                        <td class="text-right">Rp {{ number_format($booking->total_harga_222320, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 50px; border: 1px dashed #ccc; margin-top: 20px;">
            <p>Tidak ada data reservasi untuk periode yang dipilih.</p>
        </div>
    @endif

    <div class="footer">
        <p>Laporan ini digenerate secara otomatis pada {{ $tanggal_cetak }}</p>
    </div>
</body>

</html>
