<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukModel extends Model
{
    use HasFactory;

    protected $table = "penduduk";
    protected $primaryKey = "penduduk_id";

    protected $fillable = ['kartu_keluarga_id', 'NIK', 'nama_penduduk', 'tanggal_lahir', 'status_perkawinan', 'jenis_kelamin', 'alamat', 'agama', 'pekerjaan', 'status_tinggal', 'tempat_lahir', 'status_kematian'];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluargaModel::class, 'kartu_keluarga_id');
    }
}

