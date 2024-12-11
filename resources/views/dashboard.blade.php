@extends('layouts.app')
@section('content')
<div style="background-image: url(/pembeli/assets/images/menu-bg.png);">
    <br><br><br><br><br><br><br>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight bg-indigo-100 p-3 rounded">
                    {{ __('Dashboard') }}
                </h2>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</div>