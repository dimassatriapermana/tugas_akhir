@extends('sidebar')

@section('container')

<h4 class="mt-5">Data Supplier</h4>
<a href="{{ route('supplier.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Supplier</th>
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
                <a href="{{ route('supplier.edit', $data->id_supplier) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
                <form action="{{route ('supplier.delete', $data->id_supplier)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data?')">Hapus</button>
                </form>
                </td>
            </tr>
        @endforeach
        
            </td>
        </tr>
    </tbody>
</table>
@stop