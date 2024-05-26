<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KepalaKeluargaModel extends Model
{
    use HasFactory;

    protected $table = 'kepala_keluarga';
    protected $primaryKey = 'id_kepala_keluarga';

    protected $fillable = ['kartu_keluarga_id', 'penduduk_id'];
    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluargaModel::class, 'kartu_keluarga_id');
    }

    public function Penduduk(): BelongsTo
    {
        return $this->belongsTo(PendudukModel::class, 'penduduk_id', 'penduduk_id');
    }



}
