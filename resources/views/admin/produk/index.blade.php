@extends('layouts.app')
@section('content')
<div style="background-image: url(/pembeli/assets/images/menu-bg.png);">
    <br><br>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">
                <div class="flex flex-row justify-between items-center mb-1">
                    <h2
                        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight bg-indigo-100 p-3 rounded">
                        {{ __('Mengelola produk') }}
                    </h2>
                    <a href="{{ route('admin.produk.create') }}"
                        class="font-bold py-2 px-4 rounded-full text-white bg-green-500 hover:bg-green-700 transition duration-200">Tambah
                        Produk</a>
                </div>
                <hr class="my-1">

                @forelse ($produks as $produk)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($produk->foto) }}" alt="" class="w-[50px] h-[50px]">
                        <div>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $produk->nama_produk }}</h3>
                            <p class="text-base text-slate-500">Rp {{ $produk->harga }}</p>
                        </div>
                    </div>
                    <p class="text-base text-slate-500 mx-4">{{ $produk->kategori->nama }}</p>
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.produk.edit', $produk) }}"
                            class="font-bold py-3 px-5 rounded-full text-white bg-indigo-700">Edit</a>
                        <form method="POST" action="{{ route('admin.produk.destroy', $produk) }}">
                            @csrf
                            @method('DELETE')
                            <button class="font-bold py-3 px-5 rounded-full text-white bg-red-700">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                <p>Belum ada Produk ditambahkan oleh pemilik warung</p>
                @endforelse
            </div>
        </div>
    </div>
    @endsection
</div>