<?php

namespace App\Models\LayananGereja;

use Illuminate\Database\Eloquent\Model;

class NaikSidi extends Model
{
    protected $fillable = ['nama_jemaat', 'batch_id', 'akta_upload', 'surat_baptis_upload'];

    public function batch()
    {
        return $this->belongsTo(BatchNaikSidi::class, 'batch_id');
    }
}
