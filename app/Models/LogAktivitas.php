<?php

namespace App\Models;

use Sakuci\Database\Model;

class LogAktivitas extends Model
{
    protected static ?string $table = 'log_aktivitas';

    protected string $primaryKey = 'id_log';

    protected array $fillable = [
        'id_user',
        'aktivitas',
        'keterangan',
        'waktu',
    ];

    public bool $timestamps = false;
}