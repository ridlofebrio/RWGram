<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanModel extends Model
{
    use HasFactory;

    protected $table = "laporan";
    protected $primaryKey = "laporan_id";

    protected $fillable = [
        'penduduk_id',
        'deskripsi_laporan',
        'tanggal_laporan',
        'status_laporan'
    ];

    public function penduduk()
    {
        return $this->belongsTo(PendudukModel::class, 'penduduk_id');
    }
}
