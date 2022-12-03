<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GudangController extends Controller
{
    public function index() {
        $datas = DB::select('select * from gudang');

        return view('gudang.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('gudang.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_gudang' => 'required',
            'alamat_gudang' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO gudang(id_gudang, alamat_gudang) VALUES (:id_gudang, :alamat_gudang)',
        [
            'id_gudang' => $request->id_gudang,
            'alamat_gudang' => $request->alamat_gudang
        ]
        );

        return redirect()->route('gudang.index')->with('success', 'Data gudang berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('gudang')->where('id_gudang', $id)->first();

        return view('gudang.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_gudang' => 'required',
            'alamat_gudang' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE gudang SET id_gudang = :id_gudang, alamat_gudang = :alamat_gudang WHERE id_gudang = :id',
        [
            'id' => $id,
            'id_gudang' => $request->id_gudang,
            'alamat_gudang' => $request->alamat_gudang
        ]
        );

        return redirect()->route('gudang.index')->with('success', 'Data gudang berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM gudang WHERE id_gudang = :id_gudang', ['id_gudang' => $id]);

        // Menggunakan laravel eloquent 
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('gudang.index')->with('success', 'Data gudang berhasil dihapus');
    }

}
