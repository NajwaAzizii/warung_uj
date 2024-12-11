<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Website</title>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="/pembeli/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/pembeli/assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="/pembeli/assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/pembeli/style.css">
</head>

<body class="body-fixed">
  <!-- start of header  -->
  <header class="site-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          <div class="header-logo">
            <a href="{{ route('dashboard') }}">
              <img src="/pembeli/logo.png" width="160" height="36" alt="Logo">
            </a>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="main-navigation">
            <button class="menu-toggle" @click="open = ! open"><span></span><span></span></button>
            <nav class="header-menu">
              <ul class="menu food-nav-menu">
                <li>
                  <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}
                  </x-nav-link>
                </li>
                @role('pemilik')
                <li>
                  <x-nav-link :href="route('admin.produk.index')" :active="request()->routeIs('admin.produk.index')">{{
                    __('Mengelola produk') }}</x-nav-link>
                </li>
                <li>
                  <x-nav-link :href="route('admin.kategori.index')"
                    :active="request()->routeIs('admin.kategori.index')">{{ __('Mengelola kategori') }}</x-nav-link>
                </li>
                @endrole
                <li>
                  <x-nav-link :href="route('transaksi_produk.index')"
                    :active="request()->routeIs('transaksi_produk.index,index')">{{ Auth::user()->hasRole('pemilik') ?
                    __('Pesanan Warung Uj') : __('Transaksi Saya') }}</x-nav-link>
                </li>
              </ul>
            </nav>
            <div class="header-right">
              <form action="#" class="header-search-form for-des">
                <input type="search" class="form-input" placeholder="Search Here...">
                <button type="submit">
                  <i class="uil uil-search"></i>
                </button>
              </form>
              <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                  <button class="header-btn">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ms-1">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                      onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}
                    </x-dropdown-link>
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

  <!-- footer starts  -->
  <footer class="site-footer" id="contact">
    <div class="top-footer section">
      <div class="sec-wp">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="footer-info">
                <div class="footer-logo">
                  <a href="index.html">
                    <img src="logo.png" alt="">
                  </a>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia, tenetur.</p>
                <div class="social-icon">
                  <ul>
                    <li><a href="#"><i class="uil uil-facebook-f"></i></a></li>
                    <li><a href="#"><i class="uil uil-instagram"></i></a></li>
                    <li><a href="#"><i class="uil uil-github-alt"></i></a></li>
                    <li><a href="#"><i class="uil uil-youtube"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="footer-flex-box">
                <div class="footer-table-info">
                  <h3 class="h3-title">open hours</h3>
                  <ul>
                    <li><i class="uil uil-clock"></i> Mon-Thurs : 9am - 22pm</li>
                    <li><i class="uil uil-clock"></i> Fri-Sun : 11am - 22pm</li>
                  </ul>
                </div>
                <div class="footer-menu food-nav-menu">
                  <h3 class="h3-title">Links</h3>
                  <ul class="column-2">
                    <li><a href="#home" class="footer-active-menu">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                  </ul>
                </div>
                <div class="footer-menu">
                  <h3 class="h3-title">Company</h3>
                  <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="copyright-text">
              <p>Copyright &copy; 2021 <span class="name">TechieCoder.</span> All Rights Reserved.</p>
              <br>
            </div>
          </div>
        </div>
        <button class="scrolltop"><i class="uil uil-angle-up"></i></button>
      </div>
    </div>
  </footer>

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

</html>