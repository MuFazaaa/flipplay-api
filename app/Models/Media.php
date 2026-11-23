<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    public const TIPE = ['anime', 'drama', 'manga', 'novel'];

    protected $table = 'media';

    protected $fillable = [
        'judul', 'tipe', 'genre', 'tahun_rilis', 'rating', 'jumlah_bagian', 'kreator',
    ];

    protected function casts(): array
    {
        return ['tahun_rilis' => 'integer', 'rating' => 'float', 'jumlah_bagian' => 'integer'];
    }

    // Padanan getAksi() di Modul 3
    protected function aksi(): Attribute
    {
        return Attribute::get(fn () => in_array($this->tipe, ['anime', 'drama']) ? 'Menonton' : 'Membaca');
    }

    public function pengguna(): BelongsToMany
    {
        return $this->belongsToMany(Pengguna::class, 'koleksi', 'media_id', 'pengguna_id')
            ->withTimestamps();
    }
}
