<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    public function index() {
        $datas = DB::select('select * from supplier');

        return view('supplier.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('supplier.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_supplier' => 'required',
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO supplier(id_supplier, nama_supplier, alamat_supplier) VALUES (:id_supplier, :nama_supplier, :alamat_supplier)',
        [
            'id_supplier' => $request->id_supplier,
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier
        ]
        );

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('supplier')->where('id_supplier', $id)->first();

        return view('supplier.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_supplier' => 'required',
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE supplier SET id_supplier = :id_supplier, nama_supplier = :nama_supplier, alamat_supplier = :alamat_supplier WHERE id_supplier = :id',
        [
            'id' => $id,
            'id_supplier' => $request->id_supplier,
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier
        ]
        );

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM supplier WHERE id_supplier = :id_supplier', ['id_supplier' => $id]);

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil dihapus');
    }

}