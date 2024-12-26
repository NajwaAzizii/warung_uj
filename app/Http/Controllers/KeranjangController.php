<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $keranjang_Saya = $user->keranjangs()->with('produk')->get();
        return view('pembeli.keranjang', [
            'keranjang_saya' => $keranjang_Saya
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
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
        ]);

        $user = Auth::user();
        $produkId = $request->input('produk_id');

        // Cek apakah produk sudah ada di keranjang
        $existingproduk = keranjang::where('user_id', $user->id)->where('produk_id', $produkId)->first();
        if ($existingproduk) {
            return redirect()->route('keranjangs.index');
        }

        DB::beginTransaction();
        try {
            $keranjang = keranjang::updateOrCreate([
                'user_id' => $user->id,
                'produk_id' => $produkId
            ]);
            $keranjang->save();
            DB::commit();

            return redirect()->route('keranjangs.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing Produk: ' . $e->getMessage());
            throw ValidationException::withMessages(['system_error' => ['system error!' . $e->getMessage()]]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keranjang $keranjang)
    {
        try {
            $keranjang->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            //jika eror maka datanya tidak masuk
            DB::rollBack();
            Log::error('Error storing keranjang: ' . $e->getMessage());
            $error = ValidationException::withMessages([
                'system_error' => ['system error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }
}
