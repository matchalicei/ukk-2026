<?php

namespace App\Models;

use Sakuci\Database\Model;

class AreaParkir extends Model
{
    protected static ?string $table = 'area_parkir';
    protected string $primaryKey = 'id_member';

    protected array $fillable = ['nama_area', 'kapasitas', 'area'];
}
