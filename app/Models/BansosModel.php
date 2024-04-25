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
        'total_pendapatan',
        'jumlah_tanggungan',
        'jumlah_kendaraan',
        'luas_rumah',
        'luas_tanah',
        'jumlah_watt',
        'tanggal_bansos',
        'foto_dapur',
        'foto_depan_rumah',
        'foto_kamar_mandi',
        'foto_kamar_tidur',
        'foto_kamar_tamu',
        'status',
    ];

    public function kartuKeluarga(): BelongsTo
    {
        return $this->belongsTo(KartuKeluargaModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }
}
