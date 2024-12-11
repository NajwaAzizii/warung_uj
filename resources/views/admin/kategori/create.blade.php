@extends('layouts.app')
@section('content')
<div style="background-image: url(/pembeli/assets/images/menu-bg.png);">
    <br><br> <br><br>



    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight bg-indigo-100 p-3 rounded">
                {{ __('Kategori Baru') }}
            </h2>
            <div class="bg-white  overflow-hidden p-10 shadow-sm sm:rounded-lg">

                {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                    {{ $error }}
                </div>
                @endforeach
                @endif --}}

                <form method="POST" action="{{ route('admin.kategori.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="nama" :value="__('Nama Kategori')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')"
                            required autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <!-- Input Icon -->
                    <div class="mt-4">
                        <x-input-label for="icon" :value="__('icon')" />
                        <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon" required autofocus
                            autocomplete="icon" />
                        <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-primary-button class="ms-4">
                            {{ __('Tambah Kategori Baru') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>