<?php

namespace App\Models\LayananGereja;

use Illuminate\Database\Eloquent\Model;

class BatchNaikSidi extends Model
{
    protected $fillable = ['nama_batch'];

    public function naikSidis()
    {
        return $this->hasMany(NaikSidi::class, 'batch_id');
    }
}
