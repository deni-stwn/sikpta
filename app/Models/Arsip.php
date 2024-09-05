<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relasi dengan surat
    public function surat()
    {
        return $this->belongsTo(PengajuanSurat::class , 'pengajuan_surats_id' , 'id');
    }
}
