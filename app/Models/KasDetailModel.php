<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasDetailModel extends Model
{
    use HasFactory;

    protected $table = 'kas';
    protected $primaryKey = 'id_kas';

    protected $fillable = [
        'kartu_keluarga_id',
        'tahun',
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KepalaKeluargaModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
