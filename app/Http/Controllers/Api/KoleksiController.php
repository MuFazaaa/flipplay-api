<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TambahKoleksiRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Models\Pengguna;
use Illuminate\Http\JsonResponse;

class KoleksiController extends Controller
{
    // GET /api/pengguna/{pengguna}/koleksi
    public function index(Pengguna $pengguna)
    {
        return MediaResource::collection($pengguna->koleksi()->orderBy('judul')->get());
    }

    // POST /api/pengguna/{pengguna}/koleksi   body: {"media_id": 1}
    public function store(TambahKoleksiRequest $request, Pengguna $pengguna): JsonResponse
    {
        $mediaId = $request->validated('media_id');

        if ($pengguna->koleksi()->wherePivot('media_id', $mediaId)->exists()) {
            return response()->json(['message' => 'Media sudah ada di koleksi pengguna ini.'], 409);
        }

        $pengguna->koleksi()->attach($mediaId);

        return response()->json([
            'message' => 'Media berhasil ditambahkan ke koleksi.',
            'data'    => (new MediaResource(Media::find($mediaId)))->resolve(),
        ], 201);
    }

    // DELETE /api/pengguna/{pengguna}/koleksi/{media}
    public function destroy(Pengguna $pengguna, Media $media): JsonResponse
    {
        if (! $pengguna->koleksi()->wherePivot('media_id', $media->id)->exists()) {
            return response()->json(['message' => 'Media tidak ada di koleksi pengguna ini.'], 404);
        }

        $pengguna->koleksi()->detach($media->id);

        return response()->json(['message' => 'Media berhasil dihapus dari koleksi.']);
    }
}
