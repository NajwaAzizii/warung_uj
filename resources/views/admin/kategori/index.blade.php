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
                            class="font-bold py-3 px-5 rounded-full text-white bg-indigo-700">Edit</a>
                        <form method="POST" action="{{ route('admin.kategori.destroy', $kategori) }}">
                            @csrf
                            @method('DELETE')
                            <button class="font-bold py-3 px-5 rounded-full text-white bg-red-700">
                                Delete
                            </button>

                    </div>
                </div>

                @empty
                @endforelse

            </div>
        </div>
    </div>
</div>