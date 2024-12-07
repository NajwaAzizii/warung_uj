<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::with('kategori')->orderBy('id', 'DESC')->get();
        return view('admin.produk.index', [
            'produks' => $produks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produk.create', [
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|integer',
            'foto' => 'required|image|mimes:png,jpg,svg',
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('foto')) {
                $fotopath = $request->file('foto')->store('produk_foto', 'public');
                $validated['foto'] = $fotopath;
            }
            $validated['slug'] = Str::slug($request->nama_produk);

            $produkbaru = Produk::create($validated);

            DB::commit();
            return redirect()->route('admin.produk.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing product: ' . $e->getMessage());
            $error = ValidationException::withMessages([
                'system_error' => ['system error! ' . $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        $kategoris = Kategori::all();
        return view('admin.produk.edit', [
            'produk' => $produk,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|integer',
            'foto' => 'sometimes|image|mimes:png,jpg,svg',
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('foto')) {
                $fotopath = $request->file('foto')->store('produk_foto', 'public');
                $validated['foto'] = $fotopath;
            }
            $validated['slug'] = Str::slug($request->nama_produk);

            $produk->update($validated);

            DB::commit();
            return redirect()->route('admin.produk.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing product: ' . $e->getMessage());
            $error = ValidationException::withMessages([
                'system_error' => ['system error! ' . $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        try {
            $produk->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            //jika eror maka datanya tidak masuk
            DB::rollBack();
            Log::error('Error storing category: ' . $e->getMessage());
            $error = ValidationException::withMessages([
                'system_error' => ['system error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }
}
