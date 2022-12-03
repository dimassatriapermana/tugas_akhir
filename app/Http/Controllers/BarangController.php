<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangController extends Controller
{
    public function index() {
        $datas = DB::select('select * from barang');

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

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM barang WHERE id_barang = :id_barang', ['id_barang' => $id]);

        // Menggunakan laravel eloquent 
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }

}
