{{-- menampilkan data transaksi sebagai pembeli atau pemilik apotik --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

                {{ __('Detail') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <div>
                            <p class="text-base text-slate-500">
                                Total Transaksi
                            </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                Rp {{ $transaksi_produk->harga_total }}
                            </h3>

                        </div>
                    </div>
                    <div>
                        <p class="text-base text-slate-500">
                            Tanggal
                        </p>
                        <h3 class="text-xl font-bold text-indigo-950">
                            {{ $transaksi_produk->created_at }}
                        </h3>

                    </div>
                    @if ($transaksi_produk->status_pembayaran)
                        <span class="py-1 px-3 rounded-full bg-green-500">
                            <p class="text-white font-bold text-sm">SUKSES</p>
                        </span>
                    @else
                        <span class="py-1 px-3 rounded-full bg-orange-500">
                            <p class="text-white font-bold text-sm">PENDING</p>
                        </span>
                    @endif

                </div>
                <hr class="my-3">

                <h3 class="text-xl font-bold text-indigo-950">
                    List Item
                </h3>
                <div class="grid-cols-4 grid gap-x-10">
                    <div class="flex flex-col gap-y-5 col-span-2">
                        @forelse ($transaksi_produk->detail_transaksis as $detail)
                            <div class="item-card flex flex-row justify-between items-center">
                                <div class="flex flex-row items-center gap-x-3">
                                    <img src="{{ Storage::url($detail->produk->foto) }}" alt=""
                                        class="w-12 h-12 rounded-full object-cover">
                                    <div>
                                        <h3 class="text-xl font-bold text-indigo-950">
                                            {{ $detail->produk->nama_produk }}
                                        </h3>
                                        <p class="text-base text-slate-500">
                                            {{ $detail->produk->harga }}
                                        </p>
                                    </div>
                                </div>
                                <p class="text-base text-slate-500 mx-4">
                                    {{ $detail->produk->kategori->nama }}
                                </p>
                            @empty
                        @endforelse
                    </div>




                    <h3 class="text-xl font-bold text-indigo-950">
                        Detail Pembayaran
                    </h3>

                    <div class="item-card flex flex-row justify-between items-center">
                        <p class="text-base text-slate-500">
                            Alamat
                        </p>

                        <h3 class="text-xl font-bold text-indigo-950">
                            {{ $transaksi_produk->alamat }}
                        </h3>

                    </div>
                    <div class="item-card flex flex-row justify-between items-center">
                        <p class="text-base text-slate-500">
                            Nomor Hp
                        </p>

                        <h3 class="text-xl font-bold text-indigo-950">
                            {{ $transaksi_produk->nomor_hp }}
                        </h3>

                    </div>
                    <div class="item-card flex flex-col items-start">
                        <p class="text-base text-slate-500">
                            Catatan
                        </p>

                        <h3 class="text-lg font-bold text-indigo-950">
                            {{ $transaksi_produk->catatan }}
                        </h3>

                    </div>


                </div>

                <div class="flex flex-col gap-y-5 col-span-2 items-end">
                    <h3 class="text-xl font-bold text-indigo-950">
                        Bukti Pembayaran :
                    </h3>
                    <img src="{{ Storage::url($transaksi_produk->bukti_pembayaran) }}"
                        alt="{{ Storage::url($transaksi_produk->bukti_pembayaran) }}" class="w-[300px]h-[400px]">
                </div>
            </div>
            <hr class="my-3">

            @role('pemilik')
                @if ($transaksi_produk->status_pembayaran)
                    <button href="#" class="w-fit font-bold py-3 px-5 rounded-full text-white bg-indigo-700">
                        WhatsApp Customer
                    </button>
                @else
                    <form method="POST" action="{{ route('transaksi_produk.update', $transaksi_produk) }}">
                        @csrf
                        @method('PUT')
                        <button class="font-bold py-3 px-5 rounded-full text-white bg-indigo-700">
                            Menyetujui Pesanan
                        </button>
                    </form>
                @endif
            @endrole

            @role('pembeli')
                <button href="#" class="w-fit font-bold py-3 px-5 rounded-full text-white bg-indigo-700">
                    Hubungi Admin
                </button>
            @endrole
        </div>
    </div>
    </div>
</x-app-layout>
