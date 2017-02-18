<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\pegawai;
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
        $user = request()->user()->id;
        $jabatan = DB::select("SELECT jabatans.besaran_uang FROM jabatans");
        $golongan = DB::select("SELECT golongans.besaran_uang FROM golongans");
        $pegawai = DB::select("SELECT pegawais.user_id FROM pegawais where pegawais.user_id=$user");
        $tunjangan_pegawai = DB::select("SELECT tunjangan_pegawais.pegawai_id,
                                        tunjangan_pegawais.kode_tunjangan_id FROM tunjangan_pegawais ");
        $pegawai = pegawai::with('User')->get();
        $lembur_pegawai = DB::select("SELECT lembur_pegawais.id,lembur_pegawais.jumlah_jam,pegawais.user_id FROM lembur_pegawais JOIN pegawais ON pegawais.id=lembur_pegawais.pegawai_id where lembur_pegawais  .pegawai_id=$user");
        dd($lembur_pegawai);
        // DB::insert("INSERT INTO penggajians (tunjangan_pegawai_id,jumlah_jam_lembur,jumlah_uang_lembur,gaji_pokok,total_gaji,tanggal_pengambilan,status_pengambilan,petugas_penerima) VALUES ( '1', '2', '10000', '1000000', '1020000', '1999-04-25', '1', 'Andri')");
        return view('penggajian.index',compact('gaji_pokok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
