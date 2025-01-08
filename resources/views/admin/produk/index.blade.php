@extends('layouts.app')
@section('content')
<div style="background-image: url(/pembeli/assets/images/menu-bg.png);">
    <br><br>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
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
                <div class="item-card1 flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($produk->foto) }}" alt="" class="w-[50px] h-[50px]">
                        <div>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $produk->nama_produk }}</h3>
                            <p class="text-base text-slate-500">Rp {{ $produk->harga }}</p>
                        </div>
                    </div>
                    <div class="flex-grow text-center mx-4">
                        <p class="text-base text-slate-500">{{ $produk->kategori->nama }}</p>
                    </div>
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.produk.edit', $produk) }}"
                            class="py-2 px-4 rounded-full bg-indigo-600 text-white font-bold">Ubah</a>
                        <form method="POST" action="{{ route('admin.produk.destroy', $produk) }}"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="py-2 px-4 rounded-full bg-red-600 text-white font-bold"
                                onclick="showModal(event, this.form);">Hapus</button>
                        </form>
                    </div>
                </div>
                @empty
                <p>Belum ada Produk ditambahkan oleh pemilik warung</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div id="deleteModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2><i class="fas fa-exclamation-triangle" style="color: red;"></i> Peringatan!</h2>
        <p>Apakah Anda yakin ingin menghapus produk ini?</p>
        <div class="modal-buttons">
            <button class="confirm-btn" onclick="confirmDelete()">Ya, Hapus</button>
            <button class="cancel-btn" onclick="closeModal()">Batal</button>
        </div>
    </div>
</div>

<style>
    /* CSS untuk modal */
    .modal {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fefefe;
        padding: 20px;
        border: 1px solid #888;
        width: 250px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 20px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-buttons {
        margin-top: 20px;
    }

    .confirm-btn,
    .cancel-btn {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 5px;
    }

    .confirm-btn {
        background-color: #dc3545;
        color: white;
    }

    .cancel-btn {
        background-color: #6c757d;
        color: white;
    }

    .confirm-btn:hover,
    .cancel-btn:hover {
        opacity: 0.8;
    }
</style>

<script>
    let formToSubmit;  
  
    function showModal(event, form) {  
        event.preventDefault(); // Mencegah form dari disubmit  
        formToSubmit = form; // Simpan form yang akan disubmit  
        document.getElementById('deleteModal').style.display = 'flex'; // Menampilkan modal  
    }  
  
    function closeModal() {  
        document.getElementById('deleteModal').style.display = 'none'; // Menyembunyikan modal  
    }  
  
    function confirmDelete() {  
        formToSubmit.submit(); // Menyubmit form jika pengguna mengonfirmasi  
    }  
</script>
@endsection