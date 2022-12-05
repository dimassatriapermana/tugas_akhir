<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangController extends Controller
{
    public function index() {
        $datas = DB::select('select * from barang where deleted_at is NULL');

        return view('barang.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('barang.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_barang' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'tipe' => 'required',
            'stok' => 'required',
            'id_gudang' =>'required',
            'id_supplier' =>'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO barang(id_barang, merk, jenis, tipe, stok, id_gudang, id_supplier) VALUES (:id_barang, :merk, :jenis, :tipe, :stok, :id_gudang, :id_supplier)',
        [
            'id_barang' => $request->id_barang,
            'merk' => $request->merk,
            'jenis' => $request->jenis,
            'tipe' => $request->tipe,
            'stok' => $request->stok,
            'id_gudang' => $request->id_gudang,
            'id_supplier' => $request->id_supplier
        ]
        );

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('barang')->where('id_barang', $id)->first();

        return view('barang.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_barang' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'tipe' => 'required',
            'stok' => 'required',
            'id_gudang' =>'required',
            'id_supplier' =>'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE barang SET id_barang = :id_barang, merk = :merk, jenis = :jenis, tipe = :tipe, stok = :stok, id_gudang = :id_gudang, id_supplier = :id_supplier WHERE id_barang = :id',
        [
            'id' => $id,
            'id_barang' => $request->id_barang,
            'merk' => $request->merk,
            'jenis' => $request->jenis,
            'tipe' => $request->tipe,
            'stok' => $request->stok,
            'id_gudang' => $request->id_gudang,
            'id_supplier' => $request->id_supplier
        ]
        );

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diubah');
    }

    // public function show()
    // {
    //    $data = DB::select('select * from barang b inner join gudang g on b.id_gudang = g.id_gudang inner join supplier s on b.id_supplier = s.id_supplier');
    //    return view('barang.show',[
    //     'data' => $data
    //    ]);
    // }

    public function show($id)
    {
        $data = DB::select('select * from barang b inner join gudang g on b.id_gudang = g.id_gudang inner join supplier s on b.id_supplier = s.id_supplier WHERE id_barang = :id',[$id])[0];
        // dd($data->pasien_nama);
        return view('barang.show', [
            'data' => $data,
        ]);
    }

    // public function show($b)
    // {
    //     $data = DB::select('select * from data_rekam_medis rm inner join dokters d on rm.dokter_id = d.dokter_id inner join pasiens p on rm.pasien_id = p.pasien_id where rm.id = ?',[$rm])[0];
    //     // dd($data->pasien_nama);
    //     return view('informasi-medis.rekam-medis.show', [
    //         'dataRekamMedis' => $data,
    //     ]);
    // }
    
    public function softDelete($id)
    {
        DB::update('UPDATE barang SET deleted_at = ? where id_barang = ?',[
            now(),
            $id
        ]);

        return redirect('/soft');
    }

    public function restore($id)
    {
        DB::update('UPDATE barang SET deleted_at = ? where id_barang = ?',[
            null,
            $id
        ]);

        return redirect('/soft');
    }


    public function hardDelete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM barang WHERE id_barang = :id_barang', ['id_barang' => $id]);

        return redirect()->route('softDelete')->with('success', 'Data barang berhasil dihapus');
    }

    public function softIndex(){

        $datas = DB::select('select * from barang b inner join gudang g on b.id_gudang = g.id_gudang inner join supplier s on b.id_supplier = s.id_supplier where b.deleted_at is NOT NULL');

        return view('soft.index', [
            'datas' => $datas
        ]);
    }

    public function trashed()
    {
        $datas = DB::select('select * from barang b inner join gudang g on b.id_gudang = g.id_gudang inner join supplier s on b.id_supplier = s.id_supplier where b.deleted_at is NOT NULL');

        return view('soft.index', [
            'datas' => $datas
        ]);
    }
    
}
