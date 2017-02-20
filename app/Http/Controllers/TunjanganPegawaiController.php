<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\tunjangan_pegawai;
use App\pegawai;
use App\User;
use App\tunjangan;
use Validator;
use Input;
class TunjanganPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan_pegawai = tunjangan_pegawai::with('tunjangan')->get();
        $tunjangan_pegawai = tunjangan_pegawai::with('pegawai')->get();
        $users = User::all();

        return view('tunjanganpegawai.index',compact('tunjangan_pegawai','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan = tunjangan::all();
        $pegawai = pegawai::with('User')->get();
        return view('tunjanganpegawai.create',compact('tunjangan','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tunjangan = tunjangan::all();
        $pegawai = pegawai::with('User')->get();
        $tunjangan_pegawai = Request::all();
        
        $rules = ['pegawai_id' => 'required|unique:tunjangan_pegawais'];
        $sms = ['pegawai_id.unique' => 'Data Sudah Ada Tidak Boleh Sama',
                'pegawai_id.required' => 'Harus Diisi',];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            alert()->error('Data Salah');  
            return redirect('tunjanganpegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {


        alert()->success('Data Tersimpan');
        $pegawai = pegawai::where('id',$tunjangan_pegawai['pegawai_id'])->first();
        $check = tunjangan::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        if(!isset($check)){
            $pegawai = pegawai::with('User')->get();
            $missing_count = true;
            // dd($error_klnf);
            return view('tunjanganpegawai.create',compact('tunjangan_pegawai','pegawai','missing_count'));
        }
        $tunjangan_pegawai['kode_tunjangan_id'] = $check->id;
        tunjangan_pegawai::create($tunjangan_pegawai);
        }
        return redirect('tunjanganpegawai');
        
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
        tunjangan_pegawai::find($id)->delete();
        alert()->success('Data Terhapus');
        return redirect('tunjanganpegawai');
    }
}
