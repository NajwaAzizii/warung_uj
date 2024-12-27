<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
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
            // Menggunakan query builder untuk mengurutkan hasil
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
    $user = Auth::user();

    // Validasi input
    $validated = $request->validate([
        'alamat' => 'required|string|max:255',
        'nomor_hp' => 'required|string|regex:/^[0-9\+\- ]+$/', // Pastikan regex ini benar
        'catatan' => 'nullable|string|max:65535', // Catatan boleh kosong
        'bukti_pembayaran' => 'nullable|image|mimes:png,jpg,jpeg',
    ]);
    
    DB::beginTransaction();
    try {
        $subTotalCents = 0;
        $deliveryFeeCents = 1000 * 100; // Biaya pengiriman dalam sen
        $itemKeranjang = $user->keranjangs;

        foreach ($itemKeranjang as $item) {
            $subTotalCents += $item->produk->harga * 100; // Menghitung subtotal dalam sen
        }

        $grandTotalCents = $subTotalCents + $deliveryFeeCents;

        // Ubah sen ke rupiah
        $grandTotal = $grandTotalCents / 100;

        // Simpan data ke dalam database 
        $validated['user_id'] = $user->id;
        $validated['harga_total'] = $grandTotal;
        $validated['status_pembayaran'] = false;

        // Simpan bukti pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayarans', 'public');
            $validated['bukti_pembayaran'] = $buktiPath;
        }

        // Buat transaksi baru
        $transaksiBaru = transaksi_produk::create($validated);

        // Simpan detail transaksi
        foreach ($itemKeranjang as $item) {
            detail_transaksi::create([
                'transaksi_produk_id' => $transaksiBaru->id,
                'produk_id' => $item->produk_id,
                'harga' => $item->produk->harga,
            ]);

            // Hapus item dari keranjang setelah checkout
            $item->delete();
        }

        // Commit transaksi
        DB::commit();

        return redirect()->route('transaksi_produk.index')->with('success', 'Transaksi berhasil!');
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, rollback
        DB::rollBack();
        Log::error('Error storing transaksi: ' . $e->getMessage());
        return redirect()->back()->withErrors(['system_error' => 'Terjadi kesalahan saat menyimpan transaksi.']);
    }
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
