@extends('layouts.aa')
@section('content')
<div align="center">
	<div class="col-lg-9 col-md-offset-2" >
	    <div class="panel panel-default">
	        <div class="panel-heading">
				<div class="panel-body">
					<div class="table-responsive table-bordered">
						<table class="table">
							<thead >
								<tr class="success">
									<th>Kode Tunjangan</th>
									<th>NIP Pegawai</th>									
									<th>Nama Pegawai</th>
									<th>Besar Tunjangan</th>
									<th colspan="3"><center>Aksi</center></th>
								</tr>
							</thead>
							<tbody>
							@foreach($tunjangan_pegawai as $data)
								<tr>
									<td>{{$data->tunjangan->kode_tunjangan}}</td>
									<td>{{$data->pegawai->nip}}</td>
									<td>{{$users->where('id',$data->pegawai->user_id)->first()->name}}</td>
									<td>{{$data->tunjangan->besaran_uang}}</td>
									<td align="right">
                                    <a href="{{route('tunjanganpegawai.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('tunjanganpegawai.destroy', $data->id),
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