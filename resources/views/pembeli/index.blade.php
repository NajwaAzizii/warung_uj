@extends('layouts.pembeli')
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
                                    Welcome to our
                                    <span>India</span>
                                    restaurant.
                                </h1>
                                <p>This is Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam eius
                                    vel tempore consectetur nesciunt? Nam eius tenetur recusandae optio aperiam.</p>
                                <div class="banner-btn mt-4">
                                    <a href="#menu" class="sec-btn">Check our Menu</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-img-wp">
                                <div class="banner-img"
                                    style="background-image: url(/pembeli/assets/images/main-b.jpg);">
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
                            <p class="sec-sub-title mb-3">About Us</p>
                            <h2 class="h2-title">Discover our <span>restaurant story</span></h2>
                            <div class="sec-title-shape mb-4">
                                <img src="/pembeli/assets/images/title-shape.svg" alt="">
                            </div>
                            <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe dolore at
                                aspernatur eveniet temporibus placeat voluptatum quaerat accusamus possimus
                                cupiditate, quidem impedit sed libero id perspiciatis esse earum repellat quam.
                                Dolore modi temporibus quae possimus accusantium, cum corrupti sed deserunt iusto at
                                sapiente nihil sint iste similique soluta dolor! Quod.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="about-video">
                            <div class="about-video-img"
                                style="background-image: url(/pembeli/assets/images/about.jpg);">
                            </div>
                            <div class="play-btn-wp">
                                <a href="/pembeli/assets/images/video.mp4" data-fancybox="video" class="play-btn">
                                    <i class="uil uil-play"></i>

                                </a>
                                <span>Watch The Recipe</span>
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
                                <p class="sec-sub-title mb-3">our menu</p>
                                <h2 class="h2-title">wake up early, <span>eat fresh & healthy</span></h2>
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
                                    <ul class="filters">
                                        <div class="filter-active"></div>
                                        <li class="filter" data-filter=".all, .breakfast, .lunch, .dinner">
                                            <img src="/pembeli/assets/images/menu-1.png" alt="">
                                            All
                                        </li>
                                        <li class="filter" data-filter=".breakfast">
                                            <img src="/pembeli/assets/images/menu-2.png" alt="">
                                            Breakfast
                                        </li>
                                        <li class="filter" data-filter=".lunch">
                                            <img src="/pembeli/assets/images/menu-3.png" alt="">
                                            Lunch
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list-row">
                        <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                            <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                <div class="dish-box text-center">
                                    <div class="dist-img">
                                        <img src="/pembeli/assets/images/dish/1.png" alt="">
                                    </div>
                                    <div class="dish-rating">
                                        5
                                        <i class="uil uil-star"></i>
                                    </div>
                                    <div class="dish-title">
                                        <h3 class="h3-title">Fresh Chicken Veggies</h3>
                                        <p>120 calories</p>
                                    </div>
                                    <div class="dish-info">
                                        <ul>
                                            <li>
                                                <p>Type</p>
                                                <b>Non Veg</b>
                                            </li>
                                            <li>
                                                <p>Persons</p>
                                                <b>2</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dist-bottom-row">
                                        <ul>
                                            <li>
                                                <b>Rs. 499</b>
                                            </li>
                                            <li>
                                                <button class="dish-add-btn">
                                                    <i class="uil uil-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- 2 -->
                            <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                <div class="dish-box text-center">
                                    <div class="dist-img">
                                        <img src="/pembeli/assets/images/dish/2.png" alt="">
                                    </div>
                                    <div class="dish-rating">
                                        4.3
                                        <i class="uil uil-star"></i>
                                    </div>
                                    <div class="dish-title">
                                        <h3 class="h3-title">Grilled Chicken</h3>
                                        <p>80 calories</p>
                                    </div>
                                    <div class="dish-info">
                                        <ul>
                                            <li>
                                                <p>Type</p>
                                                <b>Non Veg</b>
                                            </li>
                                            <li>
                                                <p>Persons</p>
                                                <b>1</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dist-bottom-row">
                                        <ul>
                                            <li>
                                                <b>Rs. 359</b>
                                            </li>
                                            <li>
                                                <button class="dish-add-btn">
                                                    <i class="uil uil-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- 3 -->
                            <div class="col-lg-4 col-sm-6 dish-box-wp lunch" data-cat="lunch">
                                <div class="dish-box text-center">
                                    <div class="dist-img">
                                        <img src="/pembeli/assets/images/dish/3.png" alt="">
                                    </div>
                                    <div class="dish-rating">
                                        4
                                        <i class="uil uil-star"></i>
                                    </div>
                                    <div class="dish-title">
                                        <h3 class="h3-title">Panner Noodles</h3>
                                        <p>100 calories</p>
                                    </div>
                                    <div class="dish-info">
                                        <ul>
                                            <li>
                                                <p>Type</p>
                                                <b>Veg</b>
                                            </li>
                                            <li>
                                                <p>Persons</p>
                                                <b>2</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dist-bottom-row">
                                        <ul>
                                            <li>
                                                <b>Rs. 149</b>
                                            </li>
                                            <li>
                                                <button class="dish-add-btn">
                                                    <i class="uil uil-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- 4 -->
                            <div class="col-lg-4 col-sm-6 dish-box-wp lunch" data-cat="lunch">
                                <div class="dish-box text-center">
                                    <div class="dist-img">
                                        <img src="/pembeli/assets/images/dish/4.png" alt="">
                                    </div>
                                    <div class="dish-rating">
                                        4.5
                                        <i class="uil uil-star"></i>
                                    </div>
                                    <div class="dish-title">
                                        <h3 class="h3-title">Chicken Noodles</h3>
                                        <p>120 calories</p>
                                    </div>
                                    <div class="dish-info">
                                        <ul>
                                            <li>
                                                <p>Type</p>
                                                <b>Non Veg</b>
                                            </li>
                                            <li>
                                                <p>Persons</p>
                                                <b>2</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dist-bottom-row">
                                        <ul>
                                            <li>
                                                <b>Rs. 379</b>
                                            </li>
                                            <li>
                                                <button class="dish-add-btn">
                                                    <i class="uil uil-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- 5 -->
                            <div class="col-lg-4 col-sm-6 dish-box-wp dinner" data-cat="dinner">
                                <div class="dish-box text-center">
                                    <div class="dist-img">
                                        <img src="/pembeli/assets/images/dish/5.png" alt="">
                                    </div>
                                    <div class="dish-rating">
                                        5
                                        <i class="uil uil-star"></i>
                                    </div>
                                    <div class="dish-title">
                                        <h3 class="h3-title">Bread Boiled Egg</h3>
                                        <p>120 calories</p>
                                    </div>
                                    <div class="dish-info">
                                        <ul>
                                            <li>
                                                <p>Type</p>
                                                <b>Non Veg</b>
                                            </li>
                                            <li>
                                                <p>Persons</p>
                                                <b>2</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dist-bottom-row">
                                        <ul>
                                            <li>
                                                <b>Rs. 99</b>
                                            </li>
                                            <li>
                                                <button class="dish-add-btn">
                                                    <i class="uil uil-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- 6 -->
                            <div class="col-lg-4 col-sm-6 dish-box-wp dinner" data-cat="dinner">
                                <div class="dish-box text-center">
                                    <div class="dist-img">
                                        <img src="/pembeli/assets/images/dish/6.png" alt="">
                                    </div>
                                    <div class="dish-rating">
                                        5
                                        <i class="uil uil-star"></i>
                                    </div>
                                    <div class="dish-title">
                                        <h3 class="h3-title">Immunity Dish</h3>
                                        <p>120 calories</p>
                                    </div>
                                    <div class="dish-info">
                                        <ul>
                                            <li>
                                                <p>Type</p>
                                                <b>Veg</b>
                                            </li>
                                            <li>
                                                <p>Persons</p>
                                                <b>2</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dist-bottom-row">
                                        <ul>
                                            <li>
                                                <b>Rs. 159</b>
                                            </li>
                                            <li>
                                                <button class="dish-add-btn">
                                                    <i class="uil uil-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <section class="book-table section bg-light">
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
                                <p class="sec-sub-title mb-3">Book Table</p>
                                <h2 class="h2-title">Opening Table</h2>
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
                                    <h3>Monday to Thrusday</h3>
                                    <p>9:00 am - 22:00 pm</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="call-now text-center">
                                    <i class="uil uil-phone"></i>
                                    <a href="tel:+91-8866998866">+91 - 8866998866</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="table-title text-center">
                                    <h3>Friday to Sunday</h3>
                                    <p>11::00 am to 20:00 pm</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="gallery">
                        <div class="col-lg-10 m-auto">
                            <div class="book-table-img-slider" id="icon">
                                <div class="swiper-wrapper">
                                    <a href="/pembeli/assets/images/bt1.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/bt1.jpg)"></a>
                                    <a href="/pembeli/assets/images/bt2.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/bt2.jpg)"></a>
                                    <a href="/pembeli/assets/images/bt3.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/bt3.jpg)"></a>
                                    <a href="/pembeli/assets/images/bt4.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/bt4.jpg)"></a>
                                    <a href="/pembeli/assets/images/bt1.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/bt1.jpg)"></a>
                                    <a href="/pembeli/assets/images/bt2.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/bt2.jpg)"></a>
                                    <a href="/pembeli/assets/images/bt3.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/bt3.jpg)"></a>
                                    <a href="/pembeli/assets/images/bt4.jpg" data-fancybox="table-slider"
                                        class="book-table-img back-img swiper-slide"
                                        style="background-image: url(/pembeli/assets/images/bt4.jpg)"></a>
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
                                <h2 class="h2-title">Frequently <span>asked questions</span></h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="/pembeli/assets/images/title-shape.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-row">
                        <div class="faq-box">
                            <h4 class="h4-title">What are the login hours?</h4>
                            <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                vitae fugit laboriosam dolor distinctio.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">What do i get my refund?</h4>
                            <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                vitae fugit laboriosam dolor distinctio. Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">How long it will take food to arrive?</h4>
                            <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                vitae fugit laboriosam dolor distinctio.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">Does your restaurant has both veg and non veg?</h4>
                            <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                vitae fugit laboriosam dolor distinctio. Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Voluptates, distinctio?</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">What is cost of food delivery?</h4>
                            <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                vitae fugit laboriosam dolor distinctio. Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Nam officiis ducimus, cum enim repudiandae animi.</p>
                        </div>
                        <div class="faq-box">
                            <h4 class="h4-title">Who is eligible for pro membership?</h4>
                            <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                vitae fugit laboriosam dolor distinctio. </p>
                        </div>
                    </div>

                </div>
            </div>

        </section>