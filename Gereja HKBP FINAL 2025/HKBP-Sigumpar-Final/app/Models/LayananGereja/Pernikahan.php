<?php

namespace App\Models\LayananGereja;

use Illuminate\Database\Eloquent\Model;

class Pernikahan extends Model
{
    protected $fillable = ['nama_calon_suami', 'nama_calon_istri', 'tanggal_pernikahan', 'dokumen_upload'];
}
