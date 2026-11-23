<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PenggunaResource;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        return PenggunaResource::collection(Pengguna::withCount('koleksi')->get());
    }

    public function show(Pengguna $pengguna): PenggunaResource
    {
        return new PenggunaResource($pengguna->load('koleksi')->loadCount('koleksi'));
    }
}
