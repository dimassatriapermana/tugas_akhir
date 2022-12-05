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

        <h5 class="card-title fw-bolder mb-3">Ubah Data barang</h5>

		<form method="post" action="{{ route('barang.update', $data->id_barang) }}">
			@csrf
            <div class="mb-3">
                <label for="id_barang" class="form-label">ID barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" value="{{ $data->id_barang }}">
            </div>
			<div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" value="{{ $data->merk }}">
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $data->jenis }}">
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $data->tipe }}">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="{{ $data->stok }}">
            </div>
            <div class="mb-3">
                <label for="id_gudang" class="form-label">ID Gudang</label>
                <input type="text" class="form-control" id="id_gudang" name="id_gudang" value="{{ $data->id_gudang }}">
            </div>
            <div class="mb-3">
                <label for="id_supplier" class="form-label">ID Supplier</label>
                <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="{{ $data->id_supplier }}">
            </div>
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-info" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop