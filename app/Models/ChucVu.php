<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

    public  $timestamps = false;
    protected $fillable = [
        'chucvu', 'slug_chucvu','kichhoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_chucvu';
    public function nhanvien(){
        return $this->hasMany('App\Models\NhanVien');
    }
}
