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
            $table->string('no_surat')->nullable();
            $table->string('semester')->nullable();
            $table->string('NPM_Name')->nullable();
            $table->decimal('nilai_laporan_pembimbing_1', 5, 2)->nullable();
            $table->decimal('nilai_laporan_pembimbing_2', 5, 2)->nullable();
            $table->decimal('nilai_laporan_penguji_1', 5, 2)->nullable();
            $table->decimal('nilai_laporan_penguji_2', 5, 2)->nullable();
            $table->decimal('nilai_skp_pembimbing_1', 5, 2)->nullable();
            $table->decimal('nilai_skp_pembimbing_2', 5, 2)->nullable();
            $table->decimal('nilai_skp_penguji_1', 5, 2)->nullable();
            $table->decimal('nilai_skp_penguji_2', 5, 2)->nullable();
            $table->decimal('nilai_pembimbingan_pembimbing_1', 5, 2)->nullable();
            $table->decimal('nilai_pembimbingan_pembimbing_2', 5, 2)->nullable();
            $table->decimal('nilai_pembimbingan_penguji_1', 5, 2)->nullable();
            $table->decimal('nilai_pembimbingan_penguji_2', 5, 2)->nullable();
            $table->decimal('nilai_lapangan', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $table->dropColumn([
                'no_surat',
                'semester',
                'NPM_Name',
                'nilai_laporan_pembimbing_1',
                'nilai_laporan_pembimbing_2',
                'nilai_laporan_penguji_1',
                'nilai_laporan_penguji_2',
                'nilai_skp_pembimbing_1',
                'nilai_skp_pembimbing_2',
                'nilai_skp_penguji_1',
                'nilai_skp_penguji_2',
                'nilai_pembimbingan_pembimbing_1',
                'nilai_pembimbingan_pembimbing_2',
                'nilai_pembimbingan_penguji_1',
                'nilai_pembimbingan_penguji_2',
                'nilai_lapangan'
            ]);
        });
    }
};
