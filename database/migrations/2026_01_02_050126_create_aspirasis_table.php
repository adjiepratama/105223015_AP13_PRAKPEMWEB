<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('aspirasis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pengirim'); // Nama warga
        $table->string('kategori');      // Misal: Infrastruktur, Kebersihan, dll
        $table->text('isi_laporan');     // Isi aspirasinya
        $table->timestamps();            // Tanggal dibuat
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
