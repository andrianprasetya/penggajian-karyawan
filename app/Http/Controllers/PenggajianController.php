<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use DB;
use App\pegawai;
use App\tunjangan;
class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct (){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('penggajian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $pegawai = pegawai::with('User')->get();
     return view('penggajian.create',compact('pegawai','tunjangan_pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->get('pegawai_id');
        // $jabatan = DB::select("SELECT jabatans.besaran_uang FROM jabatans");
        // $golongan = DB::select("SELECT golongans.besaran_uang FROM golongans");
        // $pegawai = pegawai::all('user_id')->where('user_id',$user);
        #Gaji Pokok
        $pegawai = DB::select("SELECT jabatans.besaran_uang+golongans.besaran_uang As 'Gaji Pokok' From pegawais JOIN golongans ON golongans.id=pegawais.golongan_id JOIN jabatans ON jabatans.id=pegawais.jabatan_id where pegawais.id=$user");
        #Jumlah Jam
        $lembur_pegawai = DB::select("SELECT SUM(lembur_pegawais.jumlah_jam) FROM lembur_pegawais JOIN pegawais ON pegawais.id=lembur_pegawais.pegawai_id where lembur_pegawais.pegawai_id=$user");
        #Jumlah Uang Lembur
        $lembur_pegawai2 = DB::select("SELECT SUM(lembur_pegawais.jumlah_jam)*MAX(kategori_lemburs.besaran_uang) As 'Jumlah Uang Lembur' FROM lembur_pegawais JOIN kategori_lemburs ON kategori_lemburs.id=lembur_pegawais.kode_lembur_id where lembur_pegawais.pegawai_id=$user");
        #Kode Tunjangan ID
        $tunjangan_pegawai = DB::select("SELECT tunjangan_pegawais.id FROM tunjangan_pegawais where tunjangan_pegawais.pegawai_id=$user");
        #Total Gaji 
        $tunjangan_pegawai2 = DB::select("SELECT tunjangans.besaran_uang FROM tunjangan_pegawais JOIN tunjangans ON tunjangans.id=tunjangan_pegawais.kode_tunjangan_id where tunjangan_pegawais.pegawai_id=$user");
        $Total = $tunjangan_pegawai2+$lembur_pegawai2+$pegawai;
        dd($Total);
        // $penggajian = new penggajian;
        // $penggajian->kode_tunjangan_id = $tunjangan_pegawai;
        // $penggajian->jumlah_jam_lembur = $lembur_pegawai;
        // $penggajian->jumlah_uang_lembur = $lembur_pegawai2;
        // $penggajian->gaji_pokok = $pegawai;
        // $penggajian->
        // DB::insert("INSERT INTO penggajians (tunjangan_pegawai_id,jumlah_jam_lembur,jumlah_uang_lembur,gaji_pokok,total_gaji,tanggal_pengambilan,status_pengambilan,petugas_penerima) VALUES ( '1', '2', '10000', '1000000', '1020000', '1999-04-25', '1', 'Andri')");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
