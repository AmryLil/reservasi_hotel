<!DOCTYPE html>
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
            margin-bottom: 20px;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
        }

        .header-container h1 {
            margin: 0;
            font-size: 22px;
            text-transform: uppercase;
        }

        .header-container p {
            margin: 3px 0 0 0;
            font-size: 12px;
        }

        .summary-container {
            margin-bottom: 20px;
            border: 1px solid #e3e3e3;
            background-color: #fcfcfc;
            padding: 10px;
        }

        .summary-container h2 {
            margin: 0 0 10px 0;
            font-size: 14px;
            border-bottom: 1px solid #e3e3e3;
            padding-bottom: 5px;
        }

        .summary-table {
            width: 100%;
        }

        .summary-table td {
            width: 33.33%;
            vertical-align: top;
            padding: 5px;
            font-size: 11px;
        }

        .summary-label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 2px;
        }

        .summary-value {
            font-size: 13px;
            font-weight: bold;
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
        }

        .main-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 11px;
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
            padding: 3px 8px;
            border-radius: 9999px;
            font-size: 9px;
            font-weight: bold;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .status-dikonfirmasi {
            background-color: #e0f2fe;
            color: #0c4a6e;
        }

        .status-checkin {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-checkout {
            background-color: #f3f4f6;
            color: #374151;
        }

        .status-dibatalkan {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: 40px;
            text-align: center;
            font-size: 9px;
            color: #888;
            border-top: 1px solid #e3e3e3;
            line-height: 40px;
        }

        .no-data {
            text-align: center;
            padding: 50px;
            border: 1px dashed #ccc;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <h1>Laporan Reservasi</h1>
        <p>{{ $periode_laporan }}</p>
    </div>

    {{-- [PERUBAHAN UTAMA] Kotak Ringkasan Statistik --}}
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
                    <span class="summary-value" style="color: #0c4a6e;">{{ $total_reservasi_sukses }}</span>
                </td>
                <td>
                    <span class="summary-label">Reservasi Dibatalkan</span>
                    <span class="summary-value" style="color: #991b1b;">{{ $total_reservasi_batal }}</span>
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
                    <th width="25">No</th>
                    <th>ID Booking</th>
                    <th>Nama Tamu</th>
                    <th>Kamar</th>
                    <th>Tgl. Check-in</th>
                    <th>Tgl. Check-out</th>
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
                        <td>
                            <strong>{{ $booking->room->nama_kamar_222320 ?? 'N/A' }}</strong><br>
                            <small>{{ $booking->room->tipeRoom->nama_tipe_222320 ?? 'N/A' }}</small>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_checkin_222320)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_checkout_222320)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            {{-- Asumsi Anda memiliki accessor 'status_label' di model Booking --}}
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
        Laporan ini digenerate secara otomatis oleh sistem.
    </div>
</body>

</html>
