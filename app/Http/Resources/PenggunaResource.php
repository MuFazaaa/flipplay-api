<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PenggunaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'nama'             => $this->nama,
            'email'            => $this->email,
            'jumlah_koleksi'   => $this->whenCounted('koleksi'),
            'koleksi'          => MediaResource::collection($this->whenLoaded('koleksi')),
            'ditambahkan_pada' => $this->whenPivotLoaded('koleksi', fn () => $this->pivot->created_at),
        ];
    }
}
