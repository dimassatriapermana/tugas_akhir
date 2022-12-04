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

        <h5 class="card-title fw-bolder mb-3">Detail barang</h5>

			@csrf
            <div class="mb-3">
                <label for="id_barang" class="form-label">ID barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" value="{{ $data->id_barang }}" readonly>
            </div>
			<div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" value="{{ $data->merk }}" readonly>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $data->jenis }}" readonly>
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $data->tipe }}" readonly>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="{{ $data->stok }}" readonly>
            </div>
            <div class="mb-3">
                <label for="id_supplier" class="form-label">ID Supplier</label>
                <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="{{ $data->id_supplier }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_supplier" class="form-label">Supplier</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ $data->nama_supplier }}" readonly>
            </div>
            <div class="mb-3">
                <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" value="{{ $data->alamat_supplier }}" readonly>
            </div>
            <div class="mb-3">
                <label for="id_gudang" class="form-label">ID Gudang</label>
                <input type="text" class="form-control" id="id_gudang" name="id_gudang" value="{{ $data->id_gudang }}" readonly>
            </div>
            <div class="mb-3">
                <label for="alamat_gudang" class="form-label">ID Supplier</label>
                <input type="text" class="form-control" id="alamat_gudang" name="alamat_gudang" value="{{ $data->alamat_gudang }}" readonly>
            </div>
            <div class="text-center">
            <a href="{{ route('barang.index') }}" type="button" class="btn btn-primary rounded-3" >Kembali</a>
			</div>
            <!-- <a href="{{ route('barang.index') }}" type="button" class="btn btn-primary rounded-3 text-center" >Kembali</a> -->
		</form>
	</div>
</div>

@stop