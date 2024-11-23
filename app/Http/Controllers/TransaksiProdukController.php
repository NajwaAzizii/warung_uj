<?php

namespace App\Http\Controllers;

use App\Models\transaksi_produk;
use App\Http\Requests\Storetransaksi_produkRequest;
use App\Http\Requests\Updatetransaksi_produkRequest;

class TransaksiProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storetransaksi_produkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi_produk $transaksi_produk)
    {
        //
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
    public function update(Updatetransaksi_produkRequest $request, transaksi_produk $transaksi_produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi_produk $transaksi_produk)
    {
        //
    }
}
