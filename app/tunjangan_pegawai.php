<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan_pegawai extends Model
{
    protected $table = 'tunjangan_pegawais';

    protected $fillable =['kode_tunjangan_id','pegawai_id'];
    protected $visible =['kode_tunjangan_id','pegawai_id'];

    public function tunjangan (){
    	return $this->belongsTo('App\tunjangan','kode_tunjangan_id');
    }
    public function pegawai (){
    	return $this->belongsTo('App\pegawai','pegawai_id');
    }
}
