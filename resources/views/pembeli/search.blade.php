<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Pencarian | Warung Uj</title>
  <link rel="shortcut icon" href="{{ asset('pembeli/logo.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <style>
    .light-cream-bg {
      background-color: #ebdee6;
    }
  </style>
</head>

<body class="bg-gray-100">
  <!-- Kontainer untuk keranjang -->
  <div class="wrapper light-cream-bg rounded-3xl shadow-lg p-6 mx-auto my-10 max-w-[600px]">
    <!-- Topbar -->
    <section class="relative flex items-center justify-between gap-5 wrapper">
      <a href="{{ route('pembeli.index') }}" class="p-2 bg-white rounded-full">
        <img src="{{ asset('assets/svgs/ic-arrow-left.svg') }}" class="size-5" alt="Kembali">
      </a>
      <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
        Cari Produk
      </p>
      <button type="button" class="p-2 bg-white rounded-full">
        <img src="{{ asset('assets/svgs/ic-triple-dots.svg') }}" class="size-5" alt="Menu">
      </button>
    </section>

    <!-- Form Pencarian -->
    <section class="wrapper">
      <form action="{{ route('pembeli.search') }}" method="GET" id="searchForm" class="w-full">
        <input style="background-image: url('{{ asset('assets/svgs/ic-search.svg') }}')" type="text" name="keyword"
          id="searchProduct"
          class="block w-full py-3.5 pl-4 pr-10 rounded-[50px] font-semibold placeholder:text-grey placeholder:font-normal text-black text-base bg-no-repeat bg-[calc(100%-16px)] focus:ring-2 focus:ring-primary focus:outline-none focus:border-none transition-all"
          placeholder="Cari Nama Produk" value="{{ $keyword }}">
      </form>
    </section>


    <!-- Hasil Pencarian -->
    <section class="wrapper flex flex-col gap-2.5">
      <p class="text-base font-bold">
        Hasil
      </p>
      <div class="flex flex-col gap-4">

        @forelse ($produks as $produk)
        <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
          <img src="{{ Storage::url($produk->foto)}}" class="w-full max-w-[70px] max-h-[70px] object-contain">
          <div class="flex flex-wrap items-center justify-between w-full gap-1">
            <div class="flex flex-col gap-1">
              <a href="{{ route('pembeli.produk.details', $produk->slug) }}"
                class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                {{ $produk->nama_produk }}
              </a>
              <p class="text-sm text-grey">
                Rp {{ $produk->harga }}
              </p>
            </div>
            <div class="flex">
              @for ($i = 0; $i < 5; $i++) <img src="{{ asset('assets/svgs/star.svg') }}" class="size-[18px]"
                alt="Bintang">
                @endfor
            </div>
          </div>
        </div>

        @empty
        <p>
          Produk Tidak Tersedia
        </p>
        @endforelse


      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </div>
</body>

</html>