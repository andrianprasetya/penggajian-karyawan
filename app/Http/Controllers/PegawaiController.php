<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\pegawai;
use App\golongan;
use App\jabatan;
use Validator;
use Input;
use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RegistersUsers;
    

    public function index()
    {
        $pegawai = pegawai::with('jabatan')->get();
        $pegawai = pegawai::with('golongan')->get();
        $pegawai = pegawai::with('User')->get();
        $pegawai = pegawai::all();
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = golongan::all();
        $jabatan = jabatan::all();
        return view('pegawai.create',compact('golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$rules = [  'name' => 'required|max:255',
            'nip'  => 'required|numeric|min:3|unique:pegawais',
            'email' => 'required|email|max:255|unique:users',
            'permission' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'photo' => 'required'];
        $sms = ['nip.required' => 'Harus Diisi',
                'nip.unique' => 'Data Sudah Ada',
                'nip.numeric' => 'Harus Angka',
                'email.required' => 'Harus Diisi',
                'email.unque' => 'Data Sudah Ada',
                'jabatan_id.required' => 'Harus Diisi',
                'golongan_id.required' => 'Harus Diisi',
                'photo.required' => 'Harus Diisi',
                'email.email' => 'Harus Format Email',
                'name.required' => 'Harus Diisi',
                'password.min' => 'Sandi harus minimal 6 karakter',
                'nip.min' => 'nip harus minimal 3.',
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            alert()->error('Data Salah');  
            return redirect('pegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        alert()->success('Data Tersimpan');
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'permission' => $request->get('permission'),
            'password' => bcrypt($request->get('password')),
        ]);

        
        
        $file = Input::file('photo');
        $destinationPath = public_path().'/assets/image/';
        $filename = $file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);

        if(Input::hasFile('photo')){
            $pegawai = new pegawai;
            $pegawai->nip =$request->get('nip');
            $pegawai->jabatan_id =$request->get('jabatan_id');
            $pegawai->golongan_id =$request->get('golongan_id');
            $pegawai->photo =$request->get('photo');
            $pegawai->user_id = $user->id;
            $pegawai->photo = $filename;
            $pegawai->save();
            }  
            }      
        return redirect('/pegawai');
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
        pegawai::find($id)->delete();
        alert()->success('Data Terhapus');
        return redirect('pegawai');
    }
}
