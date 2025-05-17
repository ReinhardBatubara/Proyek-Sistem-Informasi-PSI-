<?php

namespace App\Models\LayananGereja;

use Illuminate\Database\Eloquent\Model;

class KunjunganMakam extends Model
{
    protected $fillable = ['nama_jemaat', 'tanggal_kunjungan', 'pendeta_ikut', 'kunci_disediakan'];
}
