<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_lembur extends Model
{    
    protected $table = 'kategori_lemburs';

    protected $fillable =['kode_lembur','jabatan_id','golongan_id','besaran_uang'];
    protected $visible =['kode_lembur','jabatan_id','golongan_id','besaran_uang'];

    public function golongan (){
    	return $this->belongsTo('App\golongan','golongan_id');
    }
    public function jabatan (){
    	return $this->belongsTo('App\jabatan','jabatan_id');
    }
    public function lembur_pegawai (){
    	return $this->hasOne('App\lembur_pegawai','kode_lembur_id');
    }
}
