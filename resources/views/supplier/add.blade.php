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

        <h5 class="card-title fw-bolder mb-3">Tambah supplier</h5>

		<form method="post" action="{{ route('supplier.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_supplier" class="form-label">ID supplier</label>
                <input type="text" class="form-control" id="id_supplier" name="id_supplier">
            </div>
            <div class="mb-3">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier">
            </div>
			<div class="mb-3">
                <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier">
            </div>
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop