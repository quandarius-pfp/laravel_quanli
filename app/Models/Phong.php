<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;
    public  $timestamps = false;
    protected $fillable = [
        'maPhong', 'vitri','loaiphong','tinhtrang','congdung','giatien'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_phong';
}
