<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusHidupModel extends Model
{
    use HasFactory;

    protected $table = "status_hidup";
    protected $primaryKey = "id_status_hidup";

    protected $fillable = [
        'id_status_hidup',
        'penduduk_id',
        'nama_pengaju',
        'NIK_pengaju',
        'nama_meninggal',
        'NIK_meninggal',
        'foto_bukti',
        'status_pengajuan'
    ];

    public function Penduduk(): BelongsTo
    {
        return $this->belongsTo(PendudukModel::class, 'penduduk_id', 'penduduk_id');
    }
}
