<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = 'jabatans';

    protected $fillable =['kode_jabatan','nama_jabatan','besaran_uang'];
    protected $visible =['kode_jabatan','nama_jabatan','besaran_uang'];

    public function kategori_lembur (){
    	return $this->hasOne('App\kategori_lembur','jabatan_id');
    }
    public function tunjangan (){
    	return $this->hasMany('App\tunjangan','jabatan_id');
    }
    public function pegawai (){
    	return $this->hasMany('App\pegawai','jabatan_id');
    }
}
