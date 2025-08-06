@extends('frontend.layout')

@section('content')
    <main>
        <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow"
            data-settings='{
                "autoplay": {
                    "delay": 5000
                },
                "slidesPerView": 1,
                "effect": "fade",
                "loop": true
            }'>
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide">
                        <div class="overflow-hidden position-relative h-100">
                            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                                <img loading="lazy" src="{{ Storage::url($slide->path) }}" width="542" height="733"
                                    alt="Woman Fashion 1"
                                    class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                            </div>
                            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                                <h6
                                    class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                    {{ $slide->title }}</h6>
                                <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">
                                    {{ $slide->body }}</h2>
                                <a href="{{ $slide->url }}"
                                    class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container">
                <div
                    class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
                </div>
            </div>
        </section>
        <div class="container mw-1620 bg-white border-radius-10">
            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
            <section class="category-carousel container">
                <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Kategori Produk</h2>

                <div class="position-relative">
                    <div class="swiper-container js-swiper-slider"
                        data-settings='{
                            "autoplay": {
                            "delay": 5000
                            },
                            "slidesPerView": 8,
                            "slidesPerGroup": 1,
                            "effect": "none",
                            "loop": true,
                            "navigation": {
                            "nextEl": ".products-carousel__next-1",
                            "prevEl": ".products-carousel__prev-1"
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 2,
                                    "slidesPerGroup": 2,
                                    "spaceBetween": 15
                                },
                                "768": {
                                    "slidesPerView": 4,
                                    "slidesPerGroup": 4,
                                    "spaceBetween": 30
                                },
                                "992": {
                                    "slidesPerView": 6,
                                    "slidesPerGroup": 1,
                                    "spaceBetween": 45,
                                    "pagination": false
                                },
                                "1200": {
                                    "slidesPerView": 8,
                                    "slidesPerGroup": 1,
                                    "spaceBetween": 60,
                                    "pagination": false
                                }
                            }
                        }'>
                        <div class="swiper-wrapper">
                            @foreach ($categories as $category)
                                <div class="swiper-slide">
                                    <img loading="lazy" class="w-100 h-auto mb-3" src="{{ Storage::url($category->image) }}"
                                        width="124" height="124" alt="" />
                                    <div class="text-center">
                                        <a href="{{ url('products?category=' . $category->slug) }}"
                                            class="menu-link fw-medium">{{ $category->name }}</a>
                                    </div>
                                </div>
                            @endforeach

                        </div><!-- /.swiper-wrapper -->
                    </div><!-- /.swiper-container js-swiper-slider -->

                    <div
                        class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
                        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_prev_md" />
                        </svg>
                    </div><!-- /.products-carousel__prev -->
                    <div
                        class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
                        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_next_md" />
                        </svg>
                    </div><!-- /.products-carousel__next -->
                </div><!-- /.position-relative -->
            </section>

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            <section class="products-grid container">
                <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Produk Terbaik</h2>

                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                                <div class="pc__img-wrapper">
                                    <a href="{{ url('product/' . $product->slug) }}">
                                        @if ($product->productImages->first())
                                            <img src="{{ asset('storage/' . $product->productImages->first()->path) }}"
                                                alt="{{ $product->name }}" loading="lazy" width="330" height="400"
                                                alt="Cropped Faux leather Jacket" class="pc__img">
                                        @endif
                                    </a>
                                </div>

                                <div class="pc__info position-relative">
                                    <h6 class="pc__title"><a
                                            href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a></h6>
                                    <div class="product-card__price d-flex align-items-center">
                                        <span
                                            class="money price text-secondary">Rp{{ number_format($product->priceLabel(), 0, ',', '.') }}</span>
                                    </div>

                                    <div
                                        class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                        <a product-id="{{ $product->id }}" product-type="{{ $product->type }}"
                                            product-slug="{{ $product->slug }}" href="#"
                                            class="add-to-card btn-link btn-link_lg me-4 text-uppercase fw-medium"
                                            data-aside="cartDrawer" title="Tambah ke Keranjang">Tambah ke Keranjang</a>
                                        <a class="pc__btn-wl bg-transparent border-0 js-add-wishlist add-to-fav"
                                            title="Wishlist" product-slug="{{ $product->slug }}" href="#">
                                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_heart" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
