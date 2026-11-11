<?php

namespace App\Models;

use Sakuci\Database\Model;

class Transaksi extends Model
{
    protected static ?string $table = 'transaksi';

    protected string $primaryKey = 'id_parkir';

    protected array $fillable = [
        'nomor_karcis',
        'id_member',
        'waktu_masuk',
        'waktu_keluar',
        'id_tarif',
        'durasi_jam',
        'biaya_total',
        'status',
        'id_user',
        'id_area',
        'foto_plat',
    ];
}
