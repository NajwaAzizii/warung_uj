<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang | Warung UJ</title>
  <link rel="shortcut icon" href="{{ asset('pembeli/logo.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .light-cream-bg {
      background-color: #ebdee6;
    }

    /* Popup Styles */
    .popup {
      display: none;
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .popup-content {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      width: 300px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .popup-content i {
      font-size: 50px;
      margin-bottom: 10px;
      color: #f44336;
    }

    .close-btn {
      background-color: #f44336;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>

<body class="bg-gray-100">
  <div class="wrapper light-cream-bg rounded-3xl shadow-lg p-6 mx-auto my-10 max-w-[600px]">
    <section class="relative flex items-center justify-between w-full gap-5">
      <a href="{{ route('pembeli.index') }}" class="p-2 bg-white rounded-full">
        <img src="{{ asset('assets/svgs/ic-arrow-left.svg') }}" class="size-5" alt="Kembali">
      </a>
      <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
        Keranjang Belanja
      </p>
    </section>

    <br><br>

    <section class="flex flex-col gap-2.5 mt-4">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">Item</p>
        <button type="button" class="p-2 bg-white rounded-full" data-expand="itemsList">
          <img src="{{ asset('assets/svgs/ic-chevron.svg') }}" class="transition-all duration-300 -rotate-180 size-5"
            alt="Expand">
        </button>
      </div>
      <div class="flex flex-col gap-4" id="itemsList">
        @forelse ($keranjang_saya as $keranjang)
        <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
          <img src="{{ Storage::url($keranjang->produk->foto) }}"
            class="w-full max-w-[70px] max-h-[70px] object-contain" alt="{{ $keranjang->produk->nama_produk }}">
          <div class="flex flex-wrap items-center justify-between w-full gap-1">
            <div class="flex flex-col gap-1">
              <h3 class="text-base font-semibold whitespace-nowrap w-[150px] truncate">
                {{ $keranjang->produk->nama_produk }}</h3>
              <p class="text-sm text-grey produk-harga" data-harga="{{ $keranjang->produk->harga }}">
                Rp {{ number_format($keranjang->produk->harga, 2, ',', '.') }}
              </p>
            </div>
            <div class="flex items-center">
              <div style="background-color: #f8d7da; border-radius: 9999px; padding: 4px; margin-right: 8px;">
                <button type="button" class="bg-red-500" onclick="decrementQuantity(this)">
                  <i class="bi bi-dash"></i>
                </button>
              </div>
              <span class="quantity-display mx-2">1</span>
              <div style="background-color: #d4edda; border-radius: 9999px; padding: 4px; margin-left: 8px;">
                <button type="button" class="bg-green-500" onclick="incrementQuantity(this)">
                  <i class="bi bi-plus"></i>
                </button>
              </div>
            </div>
            <form action="{{ route('keranjangs.destroy', $keranjang) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-transparent border-0">
                <img src="{{ asset('assets/svgs/ic-trash-can-filled.svg') }}" class="size-[30px]" alt="Hapus">
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

    <section class="flex flex-col gap-2.5 mt-4">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">Rincian Pembayaran</p>
        <button type="button" class="p-2 bg-white rounded-full" data-expand="__detailsPayment">
          <img src="{{ asset('assets/svgs/ic-chevron.svg') }}" class="transition-all duration-300 size-5" alt="Expand">
        </button>
      </div>
      <div class="p-6 bg-white rounded-3xl" id="__detailsPayment" style="display: none;">
        <ul class="flex flex-col gap-5">
          <li class="flex items-center justify-between">
            <p class="text-base font-semibold">Sub Total</p>
            <p class="text-base font-semibold" id="checkout-sub-total"></p>
          </li>
          <li class="flex items-center justify-between">
            <p class="text-base font-semibold">Pengiriman</p>
            <p class="text-base font-semibold" id="checkout-delivery-fee"></p>
          </li>
          <li class="flex items-center justify-between">
            <p class="text-base font-bold">Total Keseluruhan</p>
            <p class="text-base font-bold text-primary" id="checkout-grand-total"></p>
          </li>
        </ul>
      </div>
    </section>

    <br>

    <section class="flex flex-col gap-2.5 mt-4">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">Metode Pembayaran</p>
      </div>
      <div class="grid items-center grid-cols-2 gap-4">
        <label class="relative rounded-2xl bg-white flex gap-2.5 px-3.5 py-3 items-center justify-start">
          <input type="radio" name="payment_method" id="manualMethod" class="absolute opacity-0"
            onchange="togglePaymentProof()">
          <img src="{{ asset('assets/svgs/ic-receipt-text-filled.svg') }}" alt="Transfer">
          <p class="text-base font-semibold">Transfer</p>
        </label>
        <label class="relative rounded-2xl bg-white flex gap-2.5 px-3.5 py-3 items-center justify-start">
          <input type="radio" name="payment_method" id="creditMethod" class="absolute opacity-0"
            onchange="togglePaymentProof()">
          <img src="{{ asset('assets/svgs/ic-card-filled.svg') }}" alt="COD">
          <p class="text-base font-semibold">COD</p>
        </label>
      </div>
      <div class="p-4 mt-0.5 bg-white rounded-3xl hidden" id="manualPaymentDetail">
        <div class="flex flex-col gap-5">
          <p class="text-base font-bold">Kirim Pembayaran ke</p>
          <div class="inline-flex items-center gap-2.5">
            <img src="{{ asset('assets/svgs/ic-bank.svg') }}" class="size-5" alt="Bank Mandiri">
            <p class="text-base font-semibold">Bank Mandiri</p>
          </div>
          <div class="inline-flex items-center gap-2.5">
            <img src="{{ asset('assets/svgs/ic-security-card.svg') }}" class="size-5" alt="Nomor Rekening">
            <p class="text-base font-semibold">123-456-7890</p>
          </div>
        </div>
      </div>
    </section>

    <br>

    <form enctype="multipart/form-data" action="{{ route('transaksi_produk.store') }}" method="POST"
      class="p-6 bg-white rounded-3xl" id="deliveryForm" onsubmit="return validateForm()">
      @csrf
      <div class="flex flex-col gap-5">
        <div class="flex flex-col gap-2.5">
          <label for="address__" class="text-base font-semibold">Alamat</label>
          <input type="text" name="alamat" id="address__" class="form-input"
            style="background-image: url('{{ asset('assets/svgs/ic-location.svg') }}');"
            placeholder="Ketikkan alamat di sini">
        </div>

        <div class="flex flex-col gap-2.5">
          <label for="phonenumber__" class="text-base font-semibold">Nomor Telepon</label>
          <input type="number" name="nomor_hp" id="phonenumber__" class="form-input"
            style="background-image: url('{{ asset('assets/svgs/ic-phone.svg') }}');"
            placeholder="Ketikkan nomor telepon di sini">
        </div>

        <div class="flex flex-col gap-2.5">
          <label for="notes__" class="text-base font-semibold">Catatan Tambahan</label>
          <span class="relative">
            <img src="{{ asset('assets/svgs/ic-edit.svg') }}" class="absolute size-5 top-4 left-4" alt="Catatan">
            <textarea name="catatan" id="notes__" class="form-input !rounded-2xl w-full min-h-[150px]"
              placeholder="Tulis catatan tambahan di sini..."></textarea>
          </span>
        </div>

        <div class="flex flex-col gap-2.5" id="paymentProofContainer" style="display: none;">
          <label for="proof_of_payment__" class="text-base font-semibold">Bukti Pembayaran</label>
          <input type="file" name="bukti_pembayaran" id="proof_of_payment__" class="form-input"
            style="background-image: url('{{ asset('assets/svgs/ic-folder-add.svg') }}');">
        </div>
      </div>
    </form>


    <br><br><br><br>

    <div
      class="fixed z-50 bottom-[30px] bg-black rounded-3xl p-5 left-1/2 -translate-x-1/2 w-[calc(100dvw-32px)] max-w-[425px]">
      <section class="flex items-center justify-between gap-5">
        <div>
          <p class="text-sm text-grey mb-0.5">Total Keseluruhan</p>
          <p class="text-lg min-[350px]:text-2xl font-bold text-white" id="checkout-grand-total-price">Rp
            0,00</p>

        </div>
        <button type="submit" form="deliveryForm"
          class="inline-flex items-center justify-center px-5 py-3 text-base font-bold text-white rounded-full w-max bg-primary whitespace-nowrap">
          Konfirmasi
        </button>
      </section>
    </div>
  </div>


  </div>

  <div class="popup" id="errorPopup">
    <div class="popup-content">
      <i class="bi bi-exclamation-circle"></i>
      <p id="errorMessage"></p>
      <br>
      <button class="close-btn" onclick="closePopup()">Tutup</button>
    </div>
  </div>

  <div class="popup" id="successPopup">
    <div class="popup-content">
      <i class="bi bi-check-circle"></i>
      <p id="successMessage">Data berhasil dikirim!</p>
      <br>
      <button class="close-btn" onclick="closeSuccessPopup()">Tutup</button>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{ asset('scripts/global.js') }}"></script>
  <script>
    function validateForm() {
            const address = document.getElementById('address__').value;
            const phoneNumber = document.getElementById('phonenumber__').value;
            const notes = document.getElementById('notes__').value;
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
            const paymentProof = document.getElementById('proof_of_payment__');

            console.log("Address:", address);
            console.log("Phone Number:", phoneNumber);
            console.log("Notes:", notes);
            console.log("Payment Method:", paymentMethod);
            console.log("Payment Proof:", paymentProof);

            // Validasi alamat (tidak boleh mengandung angka)  
            const addressHasNumber = /\d/.test(address);
            if (addressHasNumber) {
                showPopup("Alamat tidak boleh mengandung angka.");
                return false; // Mencegah pengiriman form  
            }

            // Validasi nomor telepon (wajib diisi)  
            if (!phoneNumber) {
                showPopup("Nomor telepon wajib diisi.");
                return false; // Mencegah pengiriman form  
            }

            // Validasi bukti pembayaran jika metode pembayaran adalah Transfer  
            if (paymentMethod && paymentMethod.id === 'manualMethod' && !paymentProof.files.length) {
                showPopup("Bukti pembayaran wajib diisi jika memilih Transfer.");
                return false; // Mencegah pengiriman form  
            }

            // Jika semua validasi lulus, tampilkan popup sukses  
            return true; // Mengizinkan pengiriman form  
        }

        function showPopup(message) {
            document.getElementById('errorMessage').textContent = message;
            document.getElementById('errorPopup').style.display = 'flex'; // Tampilkan popup  
        }

        function closePopup() {
            document.getElementById('errorPopup').style.display = 'none'; // Sembunyikan popup  
        }

        function closeSuccessPopup() {
            document.getElementById('successPopup').style.display = 'none'; // Sembunyikan popup sukses  
        }

        function togglePaymentProof() {
            const manualMethod = document.getElementById('manualMethod');
            const paymentProofContainer = document.getElementById('paymentProofContainer');

            if (manualMethod.checked) {
                paymentProofContainer.style.display = 'block'; // Tampilkan input bukti pembayaran  
            } else {
                paymentProofContainer.style.display = 'none'; // Sembunyikan input bukti pembayaran  
            }
        }

        // Jalankan  
        document.addEventListener('DOMContentLoaded', function() {
            calculatePrice();
        });


        function incrementQuantity(button) {
            const quantityDisplay = button.closest('.flex').querySelector('.quantity-display');
            let quantity = parseInt(quantityDisplay.textContent);
            quantityDisplay.textContent = quantity + 1;
            calculatePrice(); // Jika ada fungsi untuk menghitung harga berdasarkan kuantitas
        }

        function decrementQuantity(button) {
            const quantityDisplay = button.closest('.flex').querySelector('.quantity-display');
            let quantity = parseInt(quantityDisplay.textContent);
            if (quantity > 1) {
                quantityDisplay.textContent = quantity - 1;
                calculatePrice(); // Jika ada fungsi untuk menghitung harga berdasarkan kuantitas
            }
        }


        function calculatePrice() {
            let subTotal = 0;
            let deliveryFee = 1000;

            document.querySelectorAll('.produk-harga').forEach(item => {
                const price = parseFloat(item.getAttribute('data-harga'));
                const quantityElement = item.closest('.flex-wrap').querySelector('.quantity-display');
                if (quantityElement) {
                    const quantity = parseInt(quantityElement.textContent);
                    subTotal += price * quantity;
                }
            });

            // Update subtotal  
            document.getElementById('checkout-sub-total').textContent = 'Rp ' + subTotal.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            // Update delivery fee  
            document.getElementById('checkout-delivery-fee').textContent = 'Rp ' + deliveryFee.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            // Calculate and update grand total  
            const grandTotal = subTotal + deliveryFee;
            document.getElementById('checkout-grand-total').textContent = 'Rp ' + grandTotal.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            document.getElementById('checkout-grand-total-price').textContent = 'Rp ' + grandTotal.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
  </script>

</body>

</html>