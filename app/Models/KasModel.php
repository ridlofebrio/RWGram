<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasModel extends Model
{
    use HasFactory;

    protected $table = "kas";
    protected $primaryKey = "kas_id";

    protected $fillable = ['kartu_keluarga_id', 'jumlah_kas', 'tanggal_kas'];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluargaModel::class, 'kartu_keluarga_id');
    }

    public function waktu()
    {
        return $this->belongsTo(waktuModel::class, 'bulan_membayar');
    }
}
