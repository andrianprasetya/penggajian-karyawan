@extends('layouts.aa')
@section('content')
<title>Jabatan</title>
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">Tambah Jabatan</div>
			<div class="panel-body">
				<form class="form-horizontal" action="{{route('jabatan.store')}}" method="POST">	
					<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
							<label for="kode_jabatan" class="col-md-4 control-label">Kode Jabatan :</label>
								<div class="col-md-6">
									<input type="text" name="kode_jabatan" placeholder="Kode Jabatan" class="form-control">
									@if ($errors->has('kode_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_jabatan') }}</strong>
                                    </span>
                                @endif
								</div>
					</div>
					<div class="form-group{{ $errors->has('nama_jabatan') ? ' has-error' : '' }}">
							<label for="nama_jabatan" class="col-md-4 control-label">Nama Jabatan :</label>
								<div class="col-md-6">
									<input type="text" name="nama_jabatan" placeholder="Nama Jabatan" class="form-control">
									@if ($errors->has('nama_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_jabatan') }}</strong>
                                    </span>
                                @endif
								</div>
					</div>
					<div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
							<label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label>
								<div class="col-md-6">
									<input type="text" name="besaran_uang" placeholder="Besaran Uang" class="form-control">
									@if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                                @endif
								</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4" >
							<button type="submit" class="btn btn-primary">
								Simpan
							</button>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>
@endsection