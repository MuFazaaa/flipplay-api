<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $fillable = ['nama', 'email'];

    public function koleksi(): BelongsToMany
    {
        return $this->belongsToMany(Media::class, 'koleksi', 'pengguna_id', 'media_id')
            ->withTimestamps();
    }
}
