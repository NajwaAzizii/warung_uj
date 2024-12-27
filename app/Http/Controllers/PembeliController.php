<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $produks = produk::with('kategori')->orderBy('id', 'DESC')->take(9)->get();
        $kategoris = kategori::all();
        return view('pembeli.index', [
            'produks' => $produks,
            'kategoris' => $kategoris,
        ]);
    }

    public function details(Produk $produk)
    {
        return view('pembeli.details', [
            'produk' => $produk,
        ]);
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
    
        
        $produk = produk::where('nama_produk', 'LIKE', '%' . $keyword . '%')->get();
    
        return view('pembeli.search', [
            'produks' => $produk,
            'keyword' => $keyword,
        ]);
    }
    
    
}
