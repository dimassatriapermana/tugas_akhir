@extends('sidebar')

@section('container')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data gudang</h5>

		<form method="post" action="{{ route('gudang.update', $data->id_gudang) }}">
			@csrf
            <div class="mb-3">
                <label for="id_gudang" class="form-label">ID Gudang</label>
                <input type="text" class="form-control" id="id_gudang" name="id_gudang" value="{{ $data->id_gudang }}">
            </div>
			<div class="mb-3">
                <label for="alamat_gudang" class="form-label">Alamat Gudang</label>
                <input type="text" class="form-control" id="alamat_gudang" name="alamat_gudang" value="{{ $data->alamat_gudang }}">
            </div>
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-warning" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop