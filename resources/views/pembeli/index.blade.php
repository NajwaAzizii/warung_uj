@extends('layouts.app')

@section('content')
<div id="viewport">
    <div id="js-scroll-content">
        <section class="main-banner" id="home">
            <div class="js-parallax-scene">
                <div class="banner-shape-1 w-100" data-depth="0.30">
                    <img src="/pembeli/assets/images/berry.png" alt="">
                </div>
                <div class="banner-shape-2 w-100" data-depth="0.25">
                    <img src="/pembeli/assets/images/leaf.png" alt="">
                </div>
            </div>
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banner-text">
                                <h1 class="h1-title">
                                    Selamat Datang Di
                                    <span>Warung Uj.</span>
                                </h1>
                                <p>Rasakan cita rasa autentik dari setiap hidangan yang kami sajikan,
                                    dibuat dengan bahan berkualitas dan penuh cinta. Temukan menu spesial
                                    kami yang siap memanjakan lidah Anda setiap hari!.</p>
                                <div class="banner-btn mt-4">
                                    <a href="#menu" class="sec-btn">Cek Menu Kita</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-img-wp">
                                <div class="banner-img"
                                    style="background-image: url(/pembeli/logo.png); width: 600px; height: 500px; background-size: contain; background-repeat: no-repeat;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-sec section" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sec-title text-center mb-5">
                            <p class="sec-sub-title mb-3">Tentang Kita</p>
                            <h2 class="h2-title">Cerita di Balik <span>Warung Uj</span></h2>
                            <div class="sec-title-shape mb-4">
                                <img src="/pembeli/assets/images/title-shape.svg" alt="">
                            </div>
                            <p>Selamat datang di Warung Uj, tempat di mana cita rasa dan tradisi bertemu.
                                Kami berdedikasi untuk menyajikan hidangan lezat yang terinspirasi dari
                                resep autentik, menggunakan bahan-bahan segar dan berkualitas. Dengan
                                pengalaman bertahun-tahun di industri kuliner, kami berkomitmen untuk memberikan
                                pelayanan terbaik dan menciptakan pengalaman bersantap yang tak terlupakan bagi setiap
                                pengunjung. Bergabunglah dengan kami dan nikmati perjalanan rasa yang istimewa!.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="about-video">
                            <div class="about-video-img"
                                style="background-image: url(/pembeli/assets/images/tentang.jpg);">
                            </div>
                            <div class="play-btn-wp">
                                <a href="/pembeli/assets/images/video.mp4" data-fancybox="video" class="play-btn">
                                    <i class="uil uil-play"></i>
                                </a>
                                <span>Lihat Vidio Lokasi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section style="background-image: url(/pembeli/assets/images/menu-bg.png);"
            class="our-menu section bg-light repeat-img" id="menu">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">Menu Kita</p>
                                <h2 class="h2-title">Pilihan Makanan & <span>Minuman Segar</span></h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="/pembeli/assets/images/title-shape.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="menu-tab-wp">
                        <div class="row">
                            <div class="col-lg-12 m-auto">
                                <div class="menu-tab text-center">
                                    <ul class="filters" style="list-style: none; padding: 0;">
                                        <div class="filter-active"></div>
                                        <li class="filter" data-filter="all" onclick="filterProducts('all')">
                                            <img src="/pembeli/assets/images/menu-1.png" alt="All Menu">
                                            Semua
                                        </li>
                                        @forelse ($kategoris as $kategori)
                                        <li class="filter" data-filter="{{ $kategori->slug }}"
                                            onclick="filterProducts('{{ $kategori->slug }}')">
                                            <img src="{{ Storage::url($kategori->icon) }}"
                                                style="width: 40px; height: 40px;" alt="{{ $kategori->nama }}">
                                            {{ $kategori->nama }}
                                        </li>
                                        @empty
                                        <li class="col-12 text-center">
                                            <p>Belum Ada Kategori</p>
                                        </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="menu-list-row">
                        <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                            @forelse ($produks as $produk)
                            <div class="col-lg-4 col-sm-6 dish-box-wp {{ $produk->kategori->slug }}"
                                data-cat="{{ $produk->kategori->slug }}">
                                <div class="dish-box text-center">
                                    <a href="{{ route('pembeli.produk.details', $produk->slug) }}">
                                        <div class="dist-img"
                                            style="display: flex; justify-content: center; align-items: center; height: 250px;">
                                            <img src="{{ Storage::url($produk->foto) }}"
                                                alt="{{ $produk->nama_produk }}"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                        <div class="dish-title">
                                            <h3 class="h3-title">{{ $produk->nama_produk }}</h3>
                                        </div>
                                        <div class="dish-info">
                                            <ul>
                                                <li>
                                                    <p class="text-black">Kategori</p>
                                                    <b class="text-black">{{ $produk->kategori->nama }}</b>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="dist-bottom-row">
                                            <ul class="flex justify-between">
                                                <li>
                                                    <b class="text-black">Rp. {{ number_format($produk->harga, 0, ',',
                                                        '.') }}</b>
                                                </li>
                                                <li>
                                                    <button class="dish-add-btn">
                                                        <i class="uil uil-plus"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center">
                                <p>Belum Ada Produk Baru</p>
                            </div>
                            @endforelse
                        </div>
                    </div>



                </div>
            </div>
        </section>

        <section class="book-table section bg-light" id="contact">
            <div class="book-table-shape">
                <img src="/pembeli/assets/images/table-leaves-shape.png" alt="">
            </div>

            <div class="book-table-shape book-table-shape2">
                <img src="/pembeli/assets/images/table-leaves-shape.png" alt="">
            </div>

            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">Info Warung</p>
                                <h2 class="h2-title">Jam Buka</h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="/pembeli/assets/images/title-shape.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="book-table-info">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="table-title text-center">
                                    <h3>Setiap Hari</h3>
                                    <p>9:00 am - 22:00 pm</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="call-now text-center">
                                    <i class="uil uil-phone"></i>
                                    <a href="tel:+62 823-9201-5547">+62 823-9201-5547</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="table-title text-center">
                                    <h3>Lokasi</h3>
                                    <p>Jl. Batin Muajo Lelo </p>
                                    <p>(Depan kantor camat Baru Pinggir)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="gallery">
                        <div class="col-lg-10 m-auto">
                            <div class="book-table-img-slider" id="icon">
                                <div class="swiper-wrapper">
                                    <a href="/pembeli/assets/images/ASLI/abakar.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/ASLI/abakar.jpg)"></a>
                                    <a href="/pembeli/assets/images//ASLI/achijau.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/ASLI/achijau.jpg)"></a>
                                    <a href="/pembeli/assets/images//ASLI/acmata.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/ASLI/acmata.jpg)"></a>
                                    <a href="/pembeli/assets/images//ASLI/agoreng.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/ASLI/agoreng.jpg)"></a>
                                    <a href="/pembeli/assets/images/ASLI/seblak.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/ASLI/seblak.jpg)"></a>
                                    <a href="/pembeli/assets/images/ASLI/jbNaga.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/ASLI/jbNaga.jpg)"></a>
                                    <a href="/pembeli/assets/images/ASLI/igoreng.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/ASLI/igoreng.jpg)"></a>
                                    <a href="/pembeli/assets/images/ASLI/jeruk.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/ASLI/jeruk.jpg)"></a>
                                </div>

                                <div class="swiper-button-wp">
                                    <div class="swiper-button-prev swiper-button">
                                        <i class="uil uil-angle-left"></i>
                                    </div>
                                    <div class="swiper-button-next swiper-button">
                                        <i class="uil uil-angle-right"></i>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="faq-sec section-repeat-img" style="background-image: url(/pembeli/assets/images/faq-bg.png);">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">faqs</p>
                                <h2 class="h2-title">Pertanyaan <span>yang Sering Diajukan</span></h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="/pembeli/assets/images/title-shape.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-row">
                        <div class="faq-box">
                            <h4 class="h4-title">Warung Uj Buka Jam Berapa?</h4>
                            <p>Warung Uj buka setiap hari dari pukul 08.00 hingga 22.00. Kami siap melayani Anda!.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">Berapa Lama Makanan Akan Sampai?</h4>
                            <p>Waktu pengiriman makanan biasanya memakan waktu antara 30 hingga 45 menit, tergantung
                                pada lokasi Anda dan tingkat keramaian di Warung Uj. Kami akan berusaha secepat mungkin
                                untuk menyajikan pesanan Anda!.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">Apakah Ada Biaya Pengiriman?</h4>
                            <p>Biaya pengiriman adalah Rp 1.000 untuk semua lokasi.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">Apa Menu Utama di Warung Uj?</h4>
                            <p>Kami menyajikan berbagai hidangan lezat berbahan dasar ayam dan ikan, serta minuman segar
                                untuk melengkapi pengalaman makan Anda.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">Apakah Makanan di Warung Uj Halal?</h4>
                            <p>Semua makanan yang kami sajikan di Warung Uj adalah halal dan dipersiapkan dengan
                                bahan-bahan berkualitas.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">Bagaimana Cara Menghubungi Layanan Pelanggan?</h4>
                            <p>Anda dapat menghubungi layanan pelanggan kami melalui nomor telepon yang tertera di
                                website atau melalui media sosial kami. </p>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </section>

        <footer class="site-footer">
            <div class="top-footer section">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="footer-info">
                                    <div class="footer-logo">
                                        <a href="{{ route('pembeli.index') }}">
                                            <img src="/pembeli/logo.png" width="85" height="30" alt="Logo">
                                        </a>
                                    </div>
                                    <p>Selamat datang di Warung Uj!</p>
                                    <p>Nikmati berbagai pilihan makanan ayam dan ikan yang segar dan lezat. Kami
                                        berkomitmen untuk memberikan pengalaman kuliner terbaik bagi Anda.</p>
                                    <div class="social-icon">
                                        <ul>
                                            <li><a href="https://www.facebook.com/share/1B4a3fHLVr/?mibextid=wwXIfr"><i
                                                        class="uil uil-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/rima_hariyani?igsh=MXB0NjFhajAyeGg2dA=="
                                                    target="_blank"><i class="uil uil-instagram"></i></a></li>
                                            <li><a href="https://wa.me/6282392015547" target="_blank"><i
                                                        class="uil uil-whatsapp"></i></a></li>
                                            <li><a href="https://www.tiktok.com/@rimahariyani_11?_t=ZS-8sJGjOSrSLf&_r=1"
                                                    target="_blank"><i class="fab fa-tiktok"
                                                        style="color: #FFA500;"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="footer-flex-box">
                                    <div class="footer-table-info">
                                        <h3 class="h3-title">Jam Buka</h3>
                                        <ul>
                                            <li><i class="uil uil-clock"></i> Setiap Hari : 08.00 - 22.00</li>
                                        </ul>
                                    </div>
                                    <div class="footer-menu food-nav-menu">
                                        <h3 class="h3-title">Tautan</h3>
                                        <ul class="column-2">
                                            <li><a href="#home" class="footer-active-menu">Beranda</a></li>
                                            <li><a href="#about">Tentang Kami</a></li>
                                            <li><a href="#menu">Menu</a></li>
                                            <li><a href="#gallery">Galeri</a></li>
                                            <li><a href="#contact">Kontak</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer-menu">
                                        <h3 class="h3-title">Lokasi</h3>
                                        <ul>
                                            <p>Jl. Batin Muajo Lelo</p>
                                            <p>(Depan kantor camat Baru Pinggir)</p>
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
                            </div>
                        </div>
                    </div>
                    <button class="scrolltop"><i class="uil uil-angle-up"></i></button>
                </div>
            </div>
        </footer>
    </div>
</div>

<script>
    function filterProducts(category) {
        const dishes = document.querySelectorAll('.dish-box-wp');
        dishes.forEach(dish => {
            if (category === 'all' || dish.classList.contains(category)) {
                dish.style.display = 'block'; 
            } else {
                dish.style.display = 'none'; 
            }
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection