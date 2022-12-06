<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberToken;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::all();

        return $this->response(200, true, $data);
    }

    public function create(Request $request)
    {
        $kode = $request->input('kode_produk');
        $nama = $request->input('nama_produk');
        $harga = $request->input('harga');

        $produk = Produk::create([
            'kode_produk' => $kode,
            'nama_produk' => $nama,
            'harga' => $harga,
        ]);

        return $this->response(200, true, $produk);
    }

    public function show($id)
    {
        $data = Produk::findOrFail($id);

        return $this->response(200, true, $data);
    }

    public function update(Request $request, $id)
    {
        $kode = $request->input('kode_produk');
        $nama = $request->input('nama_produk');
        $harga = $request->input('harga');

        $produk = Produk::findOrFail($id);

        $produk->update([
            'kode_produk' => $kode,
            'nama_produk' => $nama,
            'harga' => $harga,
        ]);

        return $this->response(200, true, $produk);
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $data = $produk->delete();

        return $this->response(200, true, $data);
    }
}