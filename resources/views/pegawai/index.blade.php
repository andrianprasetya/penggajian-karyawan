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
									<th>NIP</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Jabatan</th>
									<th>Golongan</th>
									<th>Photo</th>
									<th colspan="3"><center>Aksi</center></th>
								</tr>
							</thead>
							<tbody>
							@foreach($pegawai as $data)
								<tr>
									<td>{{$data->nip}}</td>
									<td>{{$data->User->name}}</td>
									<td>{{$data->User->email}}</td>
									<td>{{$data->jabatan->nama_jabatan}}</td>
									<td>{{$data->golongan->nama_golongan}}</td>
									<td><img src="assets/image
									/{{$data->photo}}" width="100" height="100"></td>
									<td align="right">
                                    <a href="{{route('pegawai.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('pegawai.destroy', $data->id),
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