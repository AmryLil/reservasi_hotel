<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleryItems = [
            [
                'judul_222320'       => 'Lobby Hotel',
                'deskripsi_222320'   => 'Lobby mewah hotel kami dengan suasana yang nyaman.',
                'path_gambar_222320' => 'gallery/lobby.jpg'
            ],
            [
                'judul_222320'       => 'Kolam Renang',
                'deskripsi_222320'   => 'Kolam renang outdoor dengan pemandangan kota.',
                'path_gambar_222320' => 'gallery/pool.jpg'
            ],
            [
                'judul_222320'       => 'Restoran',
                'deskripsi_222320'   => 'Restoran hotel dengan masakan internasional.',
                'path_gambar_222320' => 'gallery/restaurant.jpg'
            ],
            [
                'judul_222320'       => 'Fitness Center',
                'deskripsi_222320'   => 'Pusat kebugaran lengkap untuk tamu hotel.',
                'path_gambar_222320' => 'gallery/gym.jpg'
            ],
            [
                'judul_222320'       => 'Spa',
                'deskripsi_222320'   => 'Spa mewah untuk relaksasi dan perawatan tubuh.',
                'path_gambar_222320' => 'gallery/spa.jpg'
            ],
            [
                'judul_222320'       => 'Ballroom',
                'deskripsi_222320'   => 'Ballroom luas untuk berbagai acara dan pertemuan.',
                'path_gambar_222320' => 'gallery/ballroom.jpg'
            ],
            [
                'judul_222320'       => 'Taman Hotel',
                'deskripsi_222320'   => 'Taman yang asri di area hotel.',
                'path_gambar_222320' => 'gallery/garden.jpg'
            ],
        ];

        foreach ($galleryItems as $item) {
            Gallery::create($item);
        }
    }
}
