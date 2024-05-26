<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BansosModel extends Model
{
    use HasFactory;

    protected $table = "bansos";
    protected $primaryKey = "bansos_id";

    protected $fillable = [
        'kartu_keluarga_id',
        'nama_pengaju',
        'c1',
        'c2',
        'c3',
        'c4',
        'c5',
        'c6',
        'tanggal_bansos',
        'foto_dapur',
        'foto_depan_rumah',
        'foto_kamar_mandi',
        'foto_kamar_tidur',
        'foto_ruang_tamu',
        'status',
        'keterangan',
        'wsm'
    ];

    public function kartuKeluarga(): BelongsTo
    {
        return $this->belongsTo(KepalaKeluargaModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }
}
