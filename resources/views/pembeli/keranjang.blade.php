<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang | Warung UJ</title>
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
    <section class="relative flex items-center justify-between w-full gap-5">
      <a href="{{ route('pembeli.index') }}" class="p-2 bg-white rounded-full">
        <img src="{{ asset('assets/svgs/ic-arrow-left.svg') }}" class="size-5" alt="">
      </a>
      <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
        Keranjang Belanja
      </p>
    </section>
    <br><br>
    <!-- Item -->
    <section class="flex flex-col gap-2.5 mt-4">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">Item</p>
        <button type="button" class="p-2 bg-white rounded-full" data-expand="itemsList">
          <img src="{{ asset('assets/svgs/ic-chevron.svg') }}" class="transition-all duration-300 -rotate-180 size-5"
            alt="">
        </button>
      </div>
      <div class="flex flex-col gap-4" id="itemsList">
        @forelse ($keranjang_saya as $keranjang)
        <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
          <img src="{{ Storage::url($keranjang->produk->foto) }}"
            class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
          <div class="flex flex-wrap items-center justify-between w-full gap-1">
            <div class="flex flex-col gap-1">
              <h3 class="text-base font-semibold whitespace-nowrap w-[150px] truncate">
                {{ $keranjang->produk->nama_produk }}
              </h3>
              <p class="text-sm text-grey produk-harga" data-harga="{{ $keranjang->produk->harga }}">Rp {{
                $keranjang->produk->harga }}</p>
            </div>
            <form action="{{ route('keranjangs.destroy', $keranjang) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit">
                <img src="{{ asset('assets/svgs/ic-trash-can-filled.svg') }}" class="size-[30px]" alt="">
              </button>
            </form>
          </div>
        </div>
        @empty
        <p>Belum ada transaksi tersedia</p>
        @endforelse
      </div>
    </section>
    <br>
    <!-- Rincian Pembayaran -->
    <section class="flex flex-col gap-2.5 mt-4">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">Rincian Pembayaran</p>
        <button type="button" class="p-2 bg-white rounded-full" data-expand="__detailsPayment">
          <img src="{{ asset('assets/svgs/ic-chevron.svg') }}" class="transition-all duration-300 size-5" alt="">
        </button>
      </div>
      <div class="p-6 bg-white rounded-3xl" id="__detailsPayment" style="display: none;">
        <ul class="flex flex-col gap-5">
          <li class="flex items-center justify-between">
            <p class="text-base font-semibold first:font-normal">Sub Total</p>
            <p class="text-base font-semibold first:font-normal" id="checkout-sub-total"></p>
          </li>
          <li class="flex items-center justify-between">
            <p class="text-base font-semibold first:font-normal">Pengiriman</p>
            <p class="text-base font-semibold first:font-normal" id="checkout-delivery-fee"></p>
          </li>
          <li class="flex items-center justify-between">
            <p class="text-base font-bold first:font-normal">Total Keseluruhan</p>
            <p class="text-base font-bold first:font-normal text-primary" id="checkout-grand-total"></p>
          </li>
        </ul>
      </div>
    </section>
    <br>
    <!-- Metode Pembayaran -->
    <section class="flex flex-col gap-2.5 mt-4">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">Metode Pembayaran</p>
      </div>
      <div class="grid items-center grid-cols-2 gap-4">
        <label
          class="relative rounded-2xl bg-white flex gap-2.5 px-3.5 py-3 items-center justify-start has-[:checked]:ring-2 has-[:checked]:ring-primary transition-all">
          <input type="radio" name="payment_method" id="manualMethod" class="absolute opacity-0">
          <img src="{{ asset('assets/svgs/ic-receipt-text-filled.svg') }}" alt="">
          <p class="text-base font-semibold">Transfer</p>
        </label>
        <label
          class="relative rounded-2xl bg-white flex gap-2.5 px-3.5 py-3 items-center justify-start has-[:checked]:ring-2 has-[:checked]:ring-primary transition-all">
          <input type="radio" name="payment_method" id="creditMethod" class="absolute opacity-0">
          <img src="{{ asset('assets/svgs/ic-card-filled.svg') }}" alt="">
          <p class="text-base font-semibold">COD</p>
        </label>
      </div>
      <div class="p-4 mt-0.5 bg-white rounded-3xl hidden" id="manualPaymentDetail">
        <div class="flex flex-col gap-5">
          <p class="text-base font-bold">Kirim Pembayaran ke</p>
          <div class="inline-flex items-center gap-2.5">
            <img src="{{ asset('assets/svgs/ic-bank.svg') }}" class="size-5" alt="">
            <p class="text-base font-semibold">Bank Mandiri</p>
          </div>
          <div class="inline-flex items-center gap-2.5">
            <img src="{{ asset('assets/svgs/ic-security-card.svg') }}" class="size-5" alt="">
            <p class="text-base font-semibold">123-456-7890</p>
          </div>
        </div>
      </div>
    </section>
    <br>
    <!-- Pengiriman ke -->
    <section class="flex flex-col gap-2.5 pb-40 mt-4">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">Pengiriman ke</p>
        <button type="button" class="p-2 bg-white rounded-full" data-expand="deliveryForm">
          <img src="{{ asset('assets/svgs/ic-chevron.svg') }}" class="transition-all duration-300 -rotate-180 size-5"
            alt="">
        </button>
      </div>
      <form enctype="multipart/form-data" action="{{ route('transaksi_produk.store') }}" method="POST"
        class="p-6 bg-white rounded-3xl" id="deliveryForm">
        @csrf
        <div class="flex flex-col gap-5">
          <!-- Alamat -->
          <div class="flex flex-col gap-2.5">
            <label for="address" class="text-base font-semibold">Alamat</label>
            <input type="text" name="alamat" id="address__"
              class="form-input bg-[url('{{ asset('assets/svgs/ic-location.svg') }}')]" value="Jalan Batin MuajoLelo">
          </div>

          <!-- Nomor Telepon -->
          <div class="flex flex-col gap-2.5">
            <label for="phonenumber" class="text-base font-semibold">Nomor Telepon</label>
            <input type="number" name="nomor_hp" id="phonenumber__"
              class="form-input bg-[url('{{ asset('assets/svgs/ic-phone.svg') }}')]" value="602192301923">
          </div>
          <!-- Catatan Tambahan -->
          <div class="flex flex-col gap-2.5">
            <label for="notes" class="text-base font-semibold">Catatan Tambahan</label>
            <span class="relative">
              <img src="{{ asset('assets/svgs/ic-edit.svg') }}" class="absolute size-5 top-4 left-4" alt="">
              <textarea name="catatan" id="notes__"
                class="form-input !rounded-2xl w-full min-h-[150px]">dekat dengan toko lokal yang dekat dengan sungai besar di sebelah tempat aftermarket.</textarea>
            </span>
          </div>
          <!-- Bukti Pembayaran -->
          <div class="flex flex-col gap-2.5">
            <label for="proof_of_payment" class="text-base font-semibold">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" id="proof_of_payment__"
              class="form-input bg-[url('{{ asset('assets/svgs/ic-folder-add.svg') }}')]">
          </div>
        </div>
      </form>
    </section>

    <!-- Total keseluruhan mengambang -->
    <div
      class="fixed z-50 bottom-[30px] bg-black rounded-3xl p-5 left-1/2 -translate-x-1/2 w-[calc(100dvw-32px)] max-w-[425px]">
      <section class="flex items-center justify-between gap-5">
        <div>
          <p class="text-sm text-grey mb-0.5">Total Keseluruhan</p>
          <p class="text-lg min-[350px]:text-2xl font-bold text-white" id="checkout-grand-total-price"></p>
        </div>
        <button type="submit" form="deliveryForm"
          class="inline-flex items-center justify-center px-5 py-3 text-base font-bold text-white rounded-full w-max bg-primary whitespace-nowrap">
          Konfirmasi
        </button>
      </section>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{ asset('scripts/global.js') }}"></script>
  <script>
    function calculatePrice() {
      let subTotal = 0;
      let deliveryFee = 1000;

      document.querySelectorAll('.produk-harga').forEach(item => {
        subTotal += parseFloat(item.getAttribute('data-harga'));
      });

      document.getElementById('checkout-sub-total').textContent = 'Rp ' + subTotal.toLocaleString('id', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
      document.getElementById('checkout-delivery-fee').textContent = 'Rp ' + deliveryFee.toLocaleString('id', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
      document.getElementById('checkout-grand-total').textContent = 'Rp ' + (subTotal + deliveryFee).toLocaleString('id', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
      document.getElementById('checkout-grand-total-price').textContent = 'Rp ' + (subTotal + deliveryFee).toLocaleString('id', { minimumFractionDigits: 0, maximumFractionDigits: 2 });
    }

    // Jalankan
    document.addEventListener('DOMContentLoaded', function() {
      calculatePrice();
    });
  </script>

</body>

</html>