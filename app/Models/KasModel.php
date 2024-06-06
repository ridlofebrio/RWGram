<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasModel extends Model
{
    use HasFactory;

    protected $table = "detail_kas";
    protected $primaryKey = "id_detail_kas";

    protected $fillable = ['jumlah_kas', 'id_kas', 'tanggal_kas', 'bulan'];



    public function kas()
    {
        return $this->belongsTo(KasDetailModel::class, 'id_kas');
    }



}
