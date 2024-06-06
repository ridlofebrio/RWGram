<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusTinggalModel extends Model
{
    use HasFactory;

    protected $table = "status_tinggal";
    protected $primaryKey = "id_status_tinggal";

    protected $fillable = [
        'id_status_tinggal',
        'penduduk_id',
        'nama_pengaju',
        'NIK',
        'alamat_asal',
        'alamat_pindah',
        'foto_bukti',
        'status',
        'status_pengajuan',
        'asset_id'
    ];

    public function Penduduk(): BelongsTo
    {
        return $this->belongsTo(PendudukModel::class, 'penduduk_id', 'penduduk_id');
    }
}
