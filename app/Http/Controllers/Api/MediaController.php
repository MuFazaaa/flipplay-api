<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    // GET /api/media?judul=...&tipe=...
    public function index(Request $request)
    {
        $media = Media::query()
            ->when($request->query('judul'), fn ($q, $judul) => $q->where('judul', 'like', "%{$judul}%"))
            ->when($request->query('tipe'), fn ($q, $tipe) => $q->where('tipe', $tipe))
            ->when($request->query('dengan') === 'pengguna', fn ($q) => $q->with('pengguna'))
            ->withCount('pengguna')
            ->orderBy('judul')
            ->paginate(10)
            ->withQueryString();

        return MediaResource::collection($media);
    }

    // POST /api/media
    public function store(StoreMediaRequest $request): JsonResponse
    {
        $media = Media::create($request->validated());

        return (new MediaResource($media))->response()->setStatusCode(201);
    }

    // GET /api/media/{media}
    public function show(Media $media): MediaResource
    {
        return new MediaResource($media->load('pengguna'));
    }

    // PUT|PATCH /api/media/{media}
    public function update(UpdateMediaRequest $request, Media $media): MediaResource
    {
        $media->update($request->validated());

        return new MediaResource($media);
    }

    // DELETE /api/media/{media}
    public function destroy(Media $media): JsonResponse
    {
        $media->delete();

        return response()->json(['message' => 'Media berhasil dihapus.']);
    }
}
