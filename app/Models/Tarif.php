<?php

namespace App\Models;

use Sakuci\Database\Model;

class Tarif extends Model
{
    protected static ?string $table = 'tarif';

    protected array $fillable = ['jenis_kendaraan', 'tarif_per_jam'];
}
