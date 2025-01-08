@extends('layouts.app')
@section('content')
<div style="background-image: url(/pembeli/assets/images/menu-bg.png);">
    <br><br><br><br><br><br>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">
                <div class="flex flex-row justify-between items-center mb-1">
                    <h2
                        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight bg-indigo-100 p-3 rounded">
                        {{ __('Mengelola Kategori') }}
                    </h2>
                    <a href="{{ route('admin.kategori.create') }}"
                        class="font-bold py-2 px-4 rounded-full text-white bg-green-500 hover:bg-green-700 transition duration-200">Tambah
                        Kategori</a>
                </div>
                <hr class="my-1">
                @forelse ($kategoris as $kategori)
                <div class="item-card flex flex-row justify-between items-center">
                    <img src="{{ Storage::url($kategori->icon) }}" alt="" class="w-[50px] h-[50px]">
                    <h3 class="text-xl font-bold text-indigo-950 items-center">
                        {{ $kategori->nama }}
                    </h3>
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.kategori.edit', $kategori) }}"
                            class="font-bold py-3 px-5 rounded-full text-white bg-indigo-700"
                            style="margin: 0; width: 100px; display: flex; align-items: center; justify-content: center;">Ubah</a>
                        <form method="POST" action="{{ route('admin.kategori.destroy', $kategori) }}" style="margin: 0;"
                            onsubmit="return showModal(event);">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="font-bold py-3 px-5 rounded-full text-white bg-red-700"
                                style="margin: 0; width: 100px; display: flex; align-items: center; justify-content: center;"
                                onclick="showModal(event);">
                                Hapus
                            </button>
                        </form>

                        <!-- Modal Konfirmasi -->
                        <div id="deleteModal" class="modal" style="display: none;">
                            <div class="modal-content">
                                <span class="close" onclick="closeModal()">&times;</span>
                                <h2><i class="fas fa-exclamation-triangle" style="color: red;"></i> Peringatan!</h2>
                                <p>Apakah Anda yakin ingin menghapus kategori ini? Semua produk terkait juga akan
                                    dihapus.</p>
                                <div class="modal-buttons">
                                    <button class="confirm-btn" onclick="confirmDelete()">Ya, Hapus</button>
                                    <button class="cancel-btn" onclick="closeModal()">Batal</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                @empty
                <p>Belum ada Kategori ditambahkan oleh pemilik warung</p>
                @endforelse

            </div>
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
        /* Lebar modal yang lebih kecil */
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
        /* Merah untuk konfirmasi */
        color: white;
    }

    .cancel-btn {
        background-color: #6c757d;
        /* Abu-abu untuk batal */
        color: white;
    }

    .confirm-btn:hover,
    .cancel-btn:hover {
        opacity: 0.8;
    }
</style>

<script>
    function showModal(event) {
        event.preventDefault(); // Mencegah form dari disubmit
        document.getElementById('deleteModal').style.display = 'flex'; // Menampilkan modal
    }

    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none'; // Menyembunyikan modal
    }

    function confirmDelete() {
        document.querySelector('form').submit(); // Menyubmit form jika pengguna mengonfirmasi
    }
</script>