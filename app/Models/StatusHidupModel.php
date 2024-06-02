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
        'id_penduduk_meninggal',
        'foto_bukti',
        'asset_id'
    ];

    public function Penduduk(): BelongsTo
    {
        return $this->belongsTo(PendudukModel::class, 'penduduk_id', 'penduduk_id');
    }

    public function PendudukM(): BelongsTo
    {
        return $this->belongsTo(PendudukModel::class, 'id_penduduk_meninggal', 'penduduk_id');
    }
}
