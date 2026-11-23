<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'judul'            => $this->judul,
            'tipe'             => $this->tipe,
            'aksi'             => $this->aksi,
            'genre'            => $this->genre,
            'tahun_rilis'      => $this->tahun_rilis,
            'rating'           => $this->rating,
            'jumlah_bagian'    => $this->jumlah_bagian,
            'kreator'          => $this->kreator,
            'jumlah_pengguna'  => $this->whenCounted('pengguna'),
            'pengguna'         => PenggunaResource::collection($this->whenLoaded('pengguna')),
            'ditambahkan_pada' => $this->whenPivotLoaded('koleksi', fn () => $this->pivot->created_at),
        ];
    }
}
