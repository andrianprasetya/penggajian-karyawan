<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penggajian extends Model
{
    protected $table = 'penggajians';

    protected $fillable =['tunjangan_pegawai_id','jumlah_jam_lembur','jumlah_uang_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','status_pengambilan','petugas_pengambilan'];
    protected $visible =['tunjangan_pegawai_id','jumlah_jam_lembur','jumlah_uang_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','status_pengambilan','petugas_pengambilan'];

    
    public function tunjangan_pegawai (){
    	return $this->belongsTo('App\tunjangan_pegawai','tunjangan_pegawai_id');
    }
}
