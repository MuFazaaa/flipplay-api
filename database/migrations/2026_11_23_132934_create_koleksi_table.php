<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('koleksi', function (Blueprint $table) {
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('media_id')->constrained('media')->cascadeOnDelete();
            $table->timestamps();
            $table->primary(['pengguna_id', 'media_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('koleksi');
    }
};
