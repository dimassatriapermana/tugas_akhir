@extends('sidebar')

@section('container')

<h4 class="mt-2 text-center">Data Barang</h4>
<!-- <div class="row justify-content-center text-center">
<a href="{{ route('barang.create') }}" type="button" class="btn btn-primary rounded-3 mb-2 ">Tambah Data</a>
</div> -->

<!-- <div class="row justify-content-center text-center">
<div class="col-3">

</div>
</div> -->

<div class="row justify-content-center text-center">
    <div class="col-5">
    <a href="{{ route('barang.create') }}" type="button" class="btn-block btn btn-info rounded-3 mb-2 text-white" >Tambah Data</a>
    </div>
</div>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table id="table_id" class="table  mt-2">
    <thead class="bg-secondary text-white">
      <tr>
        <th>No.</th>
        <th>ID Barang</th>
        <th>Merk</th>
        <th>Jenis</th>
        <th>Tipe</th>
        <th>Stok</th>  
        <th>ID Supplier</th>
        <th>ID Gudang</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_barang }}</td>
                <td>{{ $data->merk }}</td>
                <td>{{ $data->jenis }}</td>
                <td>{{ $data->tipe }}</td>
                <td>{{ $data->stok }}</td>
                <td>{{ $data->id_supplier }}</td>
                <td>{{ $data->id_gudang }}</td>
                <td>
                <a href="{{ route('barang.show', $data->id_barang) }}" type="button" class="btn btn-outline-info rounded-3">Lihat</a>
                <a href="{{ route('barang.edit', $data->id_barang) }}" type="button" class="btn btn-outline-warning rounded-3">Ubah</a>
                <form action="{{route ('barang.softDelete', $data->id_barang)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-outline-danger rounded-3" onclick="return confirm('Hapus Data Ini?')">Hapus</button>
                </form>
            </tr>
            @endforeach
    </tbody>
</table>
@stop