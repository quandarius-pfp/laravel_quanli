<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    public  $timestamps = false;
    protected $fillable = [
        'NhanVien_name', 'username','password','anhdaidien','NhanVien_age','NhanVien_cmnd','NhanVien_chucvu','NhanVien_mucluong'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_nhanvien';
    public function chucvunhanvien(){
        return $this->belongsTo('App\Models\ChucVu','NhanVien_chucvu','id');
    }
}
