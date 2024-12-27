<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Website</title>

    <link rel="shortcut icon" href="{{ asset('pembeli/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/pembeli/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/pembeli/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/pembeli/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/pembeli/style.css">
</head>

<body class="body-fixed">
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="{{ route('pembeli.index') }}">
                            <img src="/pembeli/logo.png" width="85" height="30" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle" onclick="toggleMenu()"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">

                                <li>
                                    <x-nav-link :href="route('pembeli.index')"
                                        :active="request()->routeIs('pembeli.index')">
                                        {{ __('Dashboard') }}
                                    </x-nav-link>
                                </li>


                                <li>
                                    <x-nav-link :href="route('transaksi_produk.index')"
                                        :active="request()->routeIs('transaksi_produk.index')">
                                        {{ Auth::check() && Auth::user()->hasRole('pemilik') ? __('Pesanan Warung Uj') :
                                        __('Transaksi Saya') }}
                                    </x-nav-link>
                                </li>


                                @role('pemilik')
                                <li>
                                    <x-nav-link :href="route('admin.produk.index')"
                                        :active="request()->routeIs('admin.produk.index')">{{ __('Mengelola produk') }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('admin.kategori.index')"
                                        :active="request()->routeIs('admin.kategori.index')">{{ __('Mengelola kategori')
                                        }}
                                    </x-nav-link>
                                </li>
                                @endrole
                                {{-- <li>
                                    <x-nav-link :href="route('transaksi_produk.index')"
                                        :active="request()->routeIs('transaksi_produk.index')">
                                        {{ Auth::check() && Auth::user()->hasRole('pemilik') ? __('Pesanan Warung Uj') :
                                        __('Transaksi Saya') }}
                                    </x-nav-link>
                                </li> --}}
                            </ul>
                        </nav>

                        <div class="header-right">
                            @role('pembeli')
                            <form action="{{ route('pembeli.search') }}" method="GET" id="searchForm"
                                class="header-search-form for-des">
                                <input type="search" name="keyword" id="searchProduct" class="form-input"
                                    placeholder="Cari Produk...">
                                <button type="submit">
                                    <i class="uil uil-search"></i>
                                </button>
                            </form>
                            @endrole
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="header-btn">
                                        <div>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log
                                            Out') }}</x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends  -->

    <main class="content">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="/pembeli/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/pembeli/assets/js/bootstrap.min.js"></script>
    <script src="/pembeli/assets/js/popper.min.js"></script>
    <script src="/pembeli/assets/js/font-awesome.min.js"></script>
    <script src="/pembeli/assets/js/swiper-bundle.min.js"></script>
    <script src="/pembeli/assets/js/jquery.mixitup.min.js"></script>
    <script src="/pembeli/assets/js/jquery.fancybox.min.js"></script>
    <script src="/pembeli/assets/js/parallax.min.js"></script>
    <script src="/pembeli/assets/js/gsap.min.js"></script>
    <script src="/pembeli/assets/js/ScrollTrigger.min.js"></script>
    <script src="/pembeli/assets/js/ScrollToPlugin.min.js"></script>
    <script src="/pembeli/assets/js/smooth-scroll.js"></script>
    <script src="/pembeli/main.js"></script>
</body>