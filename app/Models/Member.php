<?php

namespace App\Models;

use Sakuci\Database\Model;

class Member extends Model
{
    protected static ?string $table = 'member';
    protected string $primaryKey = 'id_member';

    protected array $fillable = ['nama_member', 'plat_nomor', 'jenis_kendaraan', 'warna'];
}
