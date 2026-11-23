<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Pengguna;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $daftar = [
            ['judul' => "Frieren: Beyond Journey's End", 'tipe' => 'anime', 'genre' => 'Fantasy',    'tahun_rilis' => 2023, 'rating' => 9.3, 'jumlah_bagian' => 28,   'kreator' => 'Madhouse'],
            ['judul' => 'Demon Slayer',                  'tipe' => 'anime', 'genre' => 'Action',     'tahun_rilis' => 2019, 'rating' => 8.7, 'jumlah_bagian' => 26,   'kreator' => 'Ufotable'],
            ['judul' => 'Crash Landing on You',          'tipe' => 'drama', 'genre' => 'Romance',    'tahun_rilis' => 2019, 'rating' => 8.7, 'jumlah_bagian' => 16,   'kreator' => 'Korea Selatan'],
            ['judul' => 'Alice in Borderland',           'tipe' => 'drama', 'genre' => 'Thriller',   'tahun_rilis' => 2020, 'rating' => 7.8, 'jumlah_bagian' => 8,    'kreator' => 'Jepang'],
            ['judul' => 'One Piece',                     'tipe' => 'manga', 'genre' => 'Adventure',  'tahun_rilis' => 1997, 'rating' => 9.2, 'jumlah_bagian' => 1100, 'kreator' => 'Eiichiro Oda'],
            ['judul' => 'Vagabond',                      'tipe' => 'manga', 'genre' => 'Historical', 'tahun_rilis' => 1998, 'rating' => 9.2, 'jumlah_bagian' => 327,  'kreator' => 'Takehiko Inoue'],
            ['judul' => 'Laskar Pelangi',                'tipe' => 'novel', 'genre' => 'Drama',      'tahun_rilis' => 2005, 'rating' => 8.0, 'jumlah_bagian' => 529,  'kreator' => 'Andrea Hirata'],
            ['judul' => 'Re:Zero Light Novel',           'tipe' => 'novel', 'genre' => 'Isekai',     'tahun_rilis' => 2012, 'rating' => 8.5, 'jumlah_bagian' => 320,  'kreator' => 'Tappei Nagatsuki'],
        ];

        foreach ($daftar as $item) {
            Media::create($item);
        }

        Pengguna::create(['nama' => 'Budi Santoso', 'email' => 'budi@example.com']);
        Pengguna::create(['nama' => 'Sari Wulandari', 'email' => 'sari@example.com']);
    }
}
