@extends('layouts.app')
@section('content')
<br><br><br>
<div class="py-12">
  <div class="max-w-xl mx-auto sm:px-6 lg:px-1">
    <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">
      <a href="{{ route('pembeli.index') }}" class="p-2 bg-white rounded-full">
        <img src="/pembeli/assets/svgs/ic-arrow-left.svg" class="size-5" alt="">
      </a>
      <div class="flex flex-col items-center w-full">
        <section class="relative flex items-center justify-center gap-5 wrapper w-full">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight rounded mx-auto">
            {{ __('Detail Produk') }}
          </h2>
        </section>
      </div>


      <div class="flex flex-col items-center">
        <img src="{{ Storage::url($produk->foto) }}" class="h-[220px] w-auto mx-auto relative z-10" alt="">
        <p class="font-bold text-[22px] text-center">
          {{ $produk->nama_produk }}
        </p>
        <div class="flex items-center gap-1.5 mt-2">
          <!-- Menggunakan flex untuk menyelaraskan -->
          <img src="{{Storage::url($produk->kategori->icon) }}" class="size-[30px]" alt="">
          <p class="font-semibold text-balance">
            {{ $produk->kategori->nama }}
          </p>
        </div>

      </div>

      <hr class="my-1">

      <div class="flex items-center justify-between">
        <div class="flex flex-col gap-0.5">
          <p class="text-lg min-[350px]:text-2xl font-bold text-center">
            {{ $produk->harga }}
          </p>
          <p class="text-sm text-grey text-center">
            /produk
          </p>
        </div>
        <form action="{{ route('keranjangs.store') }}" method="POST">
          @csrf
          <input type="hidden" name="produk_id" value="{{ $produk->id }}">
          <button type="submit"
            class="inline-flex w-max text-white font-bold text-base bg-primary rounded-full px-[30px] py-3 justify-center items-center whitespace-nowrap">
            Add to Cart
          </button>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection