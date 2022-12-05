@extends('sidebar')

@section('container')

<h4 class="mt-2 text-center">Data Supplier</h4>
<div class="row justify-content-center text-center">
    <div class="col-5">
    <a href="{{ route('supplier.create') }}" type="button" class="btn-block btn btn-info rounded-3 mb-2 text-white font-weight-bold" >Tambah Data</a>
    </div>
</div>
<!-- <a href="{{ route('supplier.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a> -->

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table id="table_id" class="table table-hover mt-2">
    <thead class="bg-secondary text-white">
      <tr>
        <th>No.</th>
        <th>ID Supplier</th>
        <th>Nama Supplier</th>
        <th>Alamat Supplier</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_supplier }}</td>
                <td>{{ $data->nama_supplier }}</td>
                <td>{{ $data->alamat_supplier }}</td>
                <td>
                <a href="{{ route('supplier.edit', $data->id_supplier) }}" type="button" class="btn btn-outline-warning rounded-3">Ubah</a>
                <form action="{{route ('supplier.delete', $data->id_supplier)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-outline-danger" onclick="return confirm('Hapus Data Ini?')">Hapus</button>
                </form>
                </td>
            </tr>
        @endforeach
        
            </td>
        </tr>
    </tbody>
</table>
@stop