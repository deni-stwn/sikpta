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
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $table->string('tempat_kerja')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pembimbing_lapangan')->nullable();
            $table->string('jenis_kerja')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('nama_kordinator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
