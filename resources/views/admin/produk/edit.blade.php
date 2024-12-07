<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden p-10 shadow-sm sm:rounded-lg">

                {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                        {{ $error }}
                    </div>
                @endforeach
            @endif --}}

                <form method="POST" action="{{ route('admin.produk.update', $produk) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="nama_produk" :value="__('Nama Produk')" />
                        <x-text-input id="nama_produk" class="block mt-1 w-full" type="text" name="nama_produk"
                            value="{{ $produk->nama_produk }}" required autofocus autocomplete="nama_produk" />
                        <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
                    </div>
                    <!-- Input Harga -->
                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga Produk')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga"
                            value="{{ $produk->harga }}" required autofocus autocomplete="harga" />

                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <!-- Pilih Kategori -->
                    <div class="mt-4">
                        <x-input-label for="kategori_id" :value="__('Kategori')" />
                        <select name="kategori_id" id="kategori_id"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="{{ $produk->kategori->id }}">{{ $produk->kategori->nama }}</option>
                            @forelse ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @empty
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('kategori_id')" class="mt-2" />
                    </div>


                    <!-- Input Foto -->
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('foto')" />
                        <img src="{{ Storage::url($produk->foto) }}" alt="" class="w-[50px] h-[50px]">
                        <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" autofocus
                            autocomplete="foto" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-primary-button class="ms-4">
                            {{ __('Update Produk') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
