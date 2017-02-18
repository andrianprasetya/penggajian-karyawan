<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan extends Model
{
    protected $table = 'tunjangans';

    protected $fillable =['id','kode_tunjangan','jabatan_id','golongan_id','status','jumlah_anak','besaran_uang'];
    protected $visible =['kode_lembur_id','pegawai_id','jumlah_jam'];

    public function jabatan (){
    	return $this->belongsTo('App\jabatan','jabatan_id');
    }
    public function golongan (){
    	return $this->belongsTo('App\golongan','golongan_id');
    }
    public function tunjangan_pegawai(){
    	return $this->hasMany('App\tunjangan_pegawai','kode_tunjangan_id');
    }
}
