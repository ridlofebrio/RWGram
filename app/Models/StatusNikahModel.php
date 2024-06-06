<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusNikahModel extends Model
{
    use HasFactory;

    protected $table = "status_nikah";
    protected $primaryKey = "id_status_nikah";

    protected $fillable = [
        'id_status_nikah',
        'penduduk_id',
        'nama_pengaju',
        'NIK_pengaju',
        'nama_pasangan',
        'NIK_pasangan',
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
