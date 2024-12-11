<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pembeli.index');
        // $kategoris = kategori::all();
        // return view('admin.kategori.index', [
        //     'kategoris' => $kategoris
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'required|image|mimes:png,jpg,svg',
        ]);

        DB::beginTransaction();

        try {
            //cek apakah pemilik warung sudah benar untuk menginputkan icon
            if ($request->hasFile('icon')) {
                //menyimpan dari local ke public
                $iconpath = $request->file('icon')->store('kategori_icon', 'public');
                $validated['icon'] = $iconpath; //yang disimpan path nya
            }
            $validated['slug'] = Str::slug($request->nama);
            //jajan jajan -> jajan-jajan

            $kategoribaru = kategori::create($validated);

            DB::commit();
            return redirect()->route('admin.kategori.index');
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

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        return view('admin.kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        $validated = $request->validate([
            //ubah jadi sometimes karna mungkin hanya ingin mengganti salash satu data saja
            'nama' => 'sometimes|string|max:255',
            'icon' => 'sometimes|image|mimes:png,jpg,svg',
        ]);

        DB::beginTransaction();

        try {
            //cek apakah pemilik warung sudah benar untuk menginputkan icon
            if ($request->hasFile('icon')) {
                //menyimpan dari local ke public
                $iconpath = $request->file('icon')->store('kategori_icon', 'public');
                $validated['icon'] = $iconpath; //yang disimpan path nya
            }
            $validated['slug'] = Str::slug($request->nama);
            //jajan jajan -> jajan-jajan

            //ubah menjadi update
            $kategori->update($validated);

            DB::commit();
            return redirect()->route('admin.kategori.index');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        try {
            $kategori->delete();
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
