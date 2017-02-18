@extends('layouts.aa')
@section('content')
<div align="center">
    <div class="col-lg-10 col-md-offset-1" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-body">
                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead >
                                <tr class="success">
                                    <th>Kode Tunjangan</th>
                                    <th>Nama Jabatan</th>
                                    <th>Nama Golongan</th>
                                    <th>Status</th>
                                    <th>Jumlah Anak</th>
                                    <th>Besaran Uang</th>
                                    <th colspan="3"><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tunjangan as $data)
                                <tr>
                                    <td>{{$data->kode_tunjangan}}</td>
                                    <td>{{$data->jabatan->nama_jabatan}}</td>
                                    <td>{{$data->golongan->nama_golongan}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>{{$data->jumlah_anak}}</td>
                                    <td>{{$data->besaran_uang}}</td>
                                    <td align="right">
                                    <a href="{{route('tunjangan.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('tunjangan.destroy', $data->id),
                                    'model' => $data
                                  ])
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection