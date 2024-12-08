<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\transaksi_produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TransaksiProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('pembeli')) {
            $transaksi_produks = $user->transaksi_produks()->orderBy('id', 'DESC')->get();
        } else {
            $transaksi_produks = transaksi_produk::orderBy('id', 'DESC')->get();
        }
        return view('admin.transaksi_produk.index', [
            'transaksi_produks' => $transaksi_produks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi_produk $transaksi_produk)
    {
        //untuk mengambil seluruh data produk dan detail berdarkan id yang dipilih
        $transaksi_produk = transaksi_produk::with('detail_transaksis.produk')->find($transaksi_produk->id);
        return view('admin.transaksi_produk.details', [
            'transaksi_produk' => $transaksi_produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi_produk $transaksi_produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaksi_produk $transaksi_produk)
    {
        $transaksi_produk->update([
            'status_pembayaran' => true,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi_produk $transaksi_produk)
    {
        //
    }
}
