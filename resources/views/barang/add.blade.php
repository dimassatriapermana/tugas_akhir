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

        <h5 class="card-title fw-bolder mb-3">Tambah barang</h5>

		<form method="post" action="{{ route('barang.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_barang" class="form-label">ID barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang">
            </div>
			<div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk">
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="text" class="form-control" id="jenis" name="jenis">
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <input type="text" class="form-control" id="tipe" name="tipe">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok">
            </div>
            <div class="mb-3">
                <label for="id_gudang" class="form-label">ID Gudang</label>
                <input type="text" class="form-control" id="id_gudang" name="id_gudang">
            </div>
            <div class="mb-3">
                <label for="id_supplier" class="form-label">ID Supplier</label>
                <input type="text" class="form-control" id="id_supplier" name="id_supplier">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop