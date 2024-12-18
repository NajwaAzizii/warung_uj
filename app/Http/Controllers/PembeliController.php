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
}
