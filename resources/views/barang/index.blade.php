@extends('sidebar')

@section('container')

<h4 class="mt-5">Data Barang</h4>
<a href="{{ route('barang.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table id="table_id" class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Barang</th>
        <th>Merk</th>
        <th>Jenis</th>
        <th>Tipe</th>
        <th>Stok</th>
        <th>ID Gudang</th>
        <th>ID Supplier</th>
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
                <td>{{ $data->id_gudang }}</td>
                <td>{{ $data->id_supplier }}</td>
                <td>
                <a href="{{ route('barang.edit', $data->id_barang) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
                <form action="{{route ('barang.delete', $data->id_barang)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data?')">Hapus</button>
                </form>
            </tr>
            @endforeach
    </tbody>
</table>
@stop