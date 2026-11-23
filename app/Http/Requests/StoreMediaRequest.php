<?php

namespace App\Http\Requests;

use App\Models\Media;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul'         => ['required', 'string', 'max:255', 'unique:media,judul'],
            'tipe'          => ['required', Rule::in(Media::TIPE)],
            'genre'         => ['required', 'string', 'max:100'],
            'tahun_rilis'   => ['required', 'integer', 'between:1900,' . date('Y')],
            'rating'        => ['nullable', 'numeric', 'between:0,10'],
            'jumlah_bagian' => ['nullable', 'integer', 'min:1'],
            'kreator'       => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul media wajib diisi.',
            'judul.unique'   => 'Judul media sudah terdaftar.',
            'tipe.in'        => 'Tipe harus salah satu dari: anime, drama, manga, novel.',
        ];
    }
}
