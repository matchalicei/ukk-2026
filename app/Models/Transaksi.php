<?php

namespace App\Models;

use Sakuci\Database\Model;

class Transaksi extends Model
{
    protected static ?string $table = 'transaksi';

    protected array $fillable = ['id_parkir', 'id_member', 'waktu_masuk', 'waktu_keluar', 'id_tarif', 'durasi_jam', 'biaya_total', 'status', 'id_user', 'id_area'];
}
