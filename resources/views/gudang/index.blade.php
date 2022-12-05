@extends('sidebar')

@section('container')

<h4 class="mt-2 text-center">Data Gudang</h4>
<div class="row justify-content-center text-center">
    <div class="col-5">
    <a href="{{ route('gudang.create') }}" type="button" class="btn-block btn btn-info rounded-3 mb-2 text-white font-weight-bold" >Tambah Data</a>
    </div>
</div>
<!-- <a href="{{ route('gudang.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a> -->

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table id="table_id" class="table table-hover mt-2">
    <thead class="bg-secondary text-white">
      <tr>
        <th>No.</th>
        <th>ID gudang</th>
        <th>Alamat Gudang</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_gudang }}</td>
                <td>{{ $data->alamat_gudang }}</td>
                <td>
                <a href="{{ route('gudang.edit', $data->id_gudang) }}" type="button" class="btn btn-outline-warning rounded-3">Ubah</a>
                <form action="{{route ('gudang.delete', $data->id_gudang)}}" method="post" class="d-inline">
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