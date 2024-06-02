<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UmkmModel extends Model
{
    use HasFactory;

    protected $table = "umkm";
    protected $primaryKey = "umkm_id";

    protected $fillable = [
        'umkm_id',
        'penduduk_id',
        'nama_umkm',
        'foto_umkm',
        'link_medsos',
        'deskripsi_umkm',
        'lokasi_umkm',
        'tanggal_umkm',
        'no_wa',
        'nama_medsos',
        'asset_id'
    ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(PendudukModel::class, 'penduduk_id', 'penduduk_id');
    }
}
