<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InformasiModel extends Model
{
    use HasFactory;

    protected $table = "informasi";
    protected $primaryKey = "informasi_id";

    protected $fillable = [
        'user_id',
        'judul',
        'deskrisi_informasi',
        'foto_informasi',
        'lokasi_informasi',
        'tanggal_informasi'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
