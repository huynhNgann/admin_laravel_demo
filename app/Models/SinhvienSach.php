<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SinhvienSach extends Model
{
    use HasFactory;
    protected $table='sinhvien_saches';
    protected $fillable=['MaSach','MaSV','NgayMuon','NgayTra',];
    public function getAll($filter=[])
    {
        $listsachsv=DB::table($this->table)
        ->join('sinh_viens', 'sinhvien_saches.MaSV', '=', 'sinh_viens.MaSV')
       ->join('saches', 'sinhvien_saches.MaSach', '=', 'saches.MaSach')
        ->select($this->table.'*','sinh_viens.TenSV','saches.TenSach');

        $listsachsv=$listsachsv->orderBy('NgayMuon','DESC')->orderBy('NgayTra','DESC');
        return $listsachsv;
   
    }
    public function addsachsv($id) {
        return DB::table($this->table)->insertGetId($id);
    }

}
