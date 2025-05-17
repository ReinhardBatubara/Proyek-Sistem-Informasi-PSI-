<?php

namespace App\Models\LayananGereja;

use Illuminate\Database\Eloquent\Model;

class AnakLahir extends Model
{
    protected $fillable = ['nama_anak', 'tanggal_lahir', 'nama_ortu'];
}
