@extends('sidebar')

@section('container')
<h4 class="mt-5">Data Barang Terhapus</h4>

<table id="table_id" class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Barang</th>
        <th>Merk</th>
        <th>Jenis</th>
        <th>Tipe</th>
        <th>Stok</th>
        <th>Nama Supplier</th>
        <th>Alamat Supplier</th>
        <th>Alamat Gudang</th>
        <th>Tanggal Terhapus</th>
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
                <td>{{ $data->nama_supplier }}</td>
                <td>{{ $data->alamat_supplier }}</td>
                <td>{{ $data->alamat_gudang }}</td>
                <td>{{ $data->deleted_at }}</td>
                <td>
                <a href="{{ route('barang.restore', $data->id_barang) }}" type="button" class="btn btn-warning rounded-3">Restore</a>
                <form action="{{ route('barang.hardDelete', $data->id_barang) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data?')">Hapus</button>
                </form>
            </tr>
            @endforeach
    </tbody>
</table>
@stop