{{-- Menampilkan data transaksi sebagai pembeli atau pemilik apotik --}}
@extends('layouts.app')
@section('content')
<br><br><br><br><br>
<br><br>
<div style="background-image: url(/pembeli/assets/images/menu-bg.png);">

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">
                <div class="flex flex-row w-full justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight 
                    {{ Auth::user()->hasRole('pemilik') ? 'bg-indigo-100 p-3 rounded' : '' }}">
                        {{-- Jika role-nya pemilik, tampilkan "Pesanan Warung", jika pembeli tampilkan "Transaksi Saya"
                        --}}
                        {{ Auth::user()->hasRole('pemilik') ? __('Pesanan Warung') : __('Transaksi Saya') }}
                    </h2>
                </div>

                @forelse ($transaksi_produks as $transaksi)
                <div class="item-card flex flex-row justify-between items-center">
                    <a href="{{ route('transaksi_produk.show', $transaksi->id) }}">
                        <div class="flex flex-row items-center gap-x-3">
                            <div>
                                <p class="text-base text-slate-500">Total Transaksi</p>
                                <h3 class="text-xl font-bold text-indigo-950">Rp {{ $transaksi->harga_total }}</h3>
                            </div>
                        </div>
                    </a>
                    <div class="hidden md:flex flex-col">
                        <p class="text-base text-slate-500">Tanggal</p>
                        <h3 class="text-xl font-bold text-indigo-950">{{ $transaksi->created_at }}</h3>
                    </div>

                    @if ($transaksi->status_pembayaran)
                    <span class="py-1 px-3 rounded-full bg-green-500">
                        <p class="text-white font-bold text-sm">SUKSES</p>
                    </span>
                    @else
                    <span class="py-1 px-3 rounded-full bg-orange-500">
                        <p class="text-white font-bold text-sm">PENDING</p>
                    </span>
                    @endif
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('transaksi_produk.show', $transaksi->id) }}"
                            class="font-bold py-3 px-5 rounded-full text-white bg-indigo-700">Lihat Detail
                            Transaksi</a>
                    </div>
                </div>
                <hr class="my-3">
                @empty
                <p>Belum Tersedia Transaksi terbaru</p>
                @endforelse
            </div>
        </div>
    </div>
</div>