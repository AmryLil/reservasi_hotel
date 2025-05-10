<?php

namespace Database\Seeders;

use App\Helpers\IdGenerator;
use App\Models\Room;
use App\Models\TipeRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = TipeRoom::all();

        foreach ($roomTypes as $type) {
            // Generate different number of rooms for each type
            $numRooms = match ($type->nama_tipe_222320) {
                'Standard Room'      => 3,
                'Deluxe Room'        => 2,
                'Executive Suite'    => 1,
                'Family Room'        => 2,
                'Presidential Suite' => 2,
                default              => 3,
            };

            for ($i = 1; $i <= $numRooms; $i++) {
                $roomNumber = match ($type->nama_tipe_222320) {
                    'Standard Room'      => 'ST-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                    'Deluxe Room'        => 'DX-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                    'Executive Suite'    => 'EX-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                    'Family Room'        => 'FM-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                    'Presidential Suite' => 'PS-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                    default              => 'RM-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                };

                Room::create([
                    'id_room_222320'    => IdGenerator::roomId(),
                    'nama_kamar_222320' => $roomNumber,
                    'gambar_222320'     => 'room_' . strtolower(str_replace(' ', '_', $type->nama_tipe_222320)) . '.jpg',
                    'status_222320'     => 'available',
                    'tipe_id_222320'    => $type->tipe_id_222320,
                ]);
            }
        }
    }
}
