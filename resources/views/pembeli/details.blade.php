@extends('layouts.app')
@section('content')

<div class="py-12">
  <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">
      <a href="./index.html" class="p-2 bg-white rounded-full">
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
        <img src="/pembeli/assets/images/product-2.webp" class="h-[220px] w-auto mx-auto relative z-10" alt="">
        <p class="font-bold text-[22px] text-center">
          Immuguard Junior
        </p>
        <div class="flex items-center gap-1.5 mt-2">
          <!-- Menggunakan flex untuk menyelaraskan -->
          <img src="/pembeli/assets/svgs/ic-fitness-filled.svg" class="size-[30px]" alt="">
          <p class="font-semibold text-balance">
            Fitness
          </p>
        </div>
        <p class="mt-3.5 text-base leading-7 text-center">
          Medicine good for your body even when
          don’t really need them so keep all without
          worrying about the life would be later.
        </p>
      </div>

      <hr class="my-1">

      <div class="flex items-center justify-between">
        <div class="flex flex-col gap-0.5">
          <p class="text-lg min-[350px]:text-2xl font-bold text-center">
            Rp 3.290.000
          </p>
          <p class="text-sm text-grey text-center">
            /quantity
          </p>
        </div>
        <a href="./cart.html"
          class="inline-flex w-max text-white font-bold text-base bg-primary rounded-full px-[30px] py-3 justify-center items-center whitespace-nowrap">
          Add to Cart
        </a>
      </div>
    </div>
  </div>
</div>
@endsection