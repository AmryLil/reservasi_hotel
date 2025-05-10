<?php

namespace Database\Seeders;

use App\Helpers\IdGenerator;
use App\Models\TipeRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            [
                'nama_tipe_222320' => 'Standard Room',
                'deskripsi_222320' => 'Kamar standar dengan fasilitas dasar untuk kenyamanan Anda.',
                'harga_222320'     => 500000.0,
                'fasilitas_222320' => '1 Double Bed, AC, TV 32 inch, Kamar Mandi dalam, WiFi, Air Mineral'
            ],
            [
                'nama_tipe_222320' => 'Deluxe Room',
                'deskripsi_222320' => 'Kamar mewah dengan ruang lebih luas dan pemandangan terbaik.',
                'harga_222320'     => 850000.0,
                'fasilitas_222320' => '1 Queen Bed, AC, TV 42 inch, Kamar Mandi dalam dengan Bathtub, WiFi, Mini Bar, Breakfast'
            ],
            [
                'nama_tipe_222320' => 'Executive Suite',
                'deskripsi_222320' => 'Suite eksekutif dengan ruang tamu terpisah dan fasilitas premium.',
                'harga_222320'     => 1250000.0,
                'fasilitas_222320' => '1 King Bed, AC, TV 55 inch, Ruang Tamu, Kamar Mandi Mewah dengan Jacuzzi, WiFi, Mini Bar, Breakfast, Evening Cocktail'
            ],
            [
                'nama_tipe_222320' => 'Family Room',
                'deskripsi_222320' => 'Kamar luas untuk keluarga dengan tempat tidur tambahan.',
                'harga_222320'     => 1000000.0,
                'fasilitas_222320' => '1 Queen Bed + 2 Single Bed, AC, TV 42 inch, Kamar Mandi dalam, WiFi, Mini Bar, Breakfast untuk 4 orang'
            ],
            [
                'nama_tipe_222320' => 'Presidential Suite',
                'deskripsi_222320' => 'Suite terbaik dengan kemewahan maksimal dan layanan personal.',
                'harga_222320'     => 2500000.0,
                'fasilitas_222320' => '1 Super King Bed, AC, TV 65 inch, Ruang Tamu Luas, Ruang Makan, Dapur Mini, Kamar Mandi Mewah dengan Jacuzzi, WiFi, Mini Bar, Breakfast, Butler Service'
            ],
        ];

        // Generate a batch of 5 unique IDs at once
        $ids = IdGenerator::batchRoomTypeIds(count($roomTypes));

        // Assign each ID to a room type and create them
        foreach ($roomTypes as $index => $type) {
            $type['tipe_id_222320'] = $ids[$index];
            TipeRoom::create($type);
        }
    }
}
