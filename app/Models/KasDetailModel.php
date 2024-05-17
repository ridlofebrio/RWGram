<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasDetailModel extends Model
{
    use HasFactory;

    protected $table = 'kas';
    protected $primaryKey = 'id_kas';



    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluargaModel::class, 'kartu_keluarga_id');
    }

}
