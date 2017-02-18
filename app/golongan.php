<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
    protected $table = 'golongans';

    protected $fillable =['kode_golongan','nama_golongan','besaran_uang'];
    protected $visible  =['kode_golongan','nama_golongan','besaran_uang'];

    public function kategori_lembur (){
    	return $this->hasMany('App\kategori_lembur','golongan_id');
    }
    public function tunjangan (){
    	return $this->hasMany('App\tunjangan','golongan_id');
    }
    public function pegawai (){
    	return $this->hasMany('App\pegawai','golongan_id');
    }
}
