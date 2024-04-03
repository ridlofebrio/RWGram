<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluargaModel extends Model
{
    use HasFactory;

    protected $table = "kartu_keluarga";
    protected $primaryKey = "kartu_keluarga_id";

    protected $fillable = [
        'rt_id',
        'NKK',
        "no_telepon",
        'tanggal_kk'
    ];

    public function rt()
    {
        return $this->belongsTo(RtModel::class, 'rt_id');
    }
}
