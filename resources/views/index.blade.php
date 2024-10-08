@php $locale = session()->get('locale'); @endphp
<x-master-layout>
    <div class="content">
        <section class="banner-pages homepage">
            <div class="container">
                <div class="text">
                    <p>
                        {{__('index.text_banner_1')}}
                    </p>
                    <h3>
                        {{__('index.text_banner_2')}}
                        {{-- <b> {{__('index.text_banner_3')}}</b> --}}
                    </h3>
                    <a onclick="directurl('whatsapp')" class="btn btn-whatsapp fs-14"><i
                            class="mdi mdi-whatsapp fs-18 me-2"></i> {{__('index.text_banner_button')}} </a>
                </div>
            </div>

        </section>

        <section class="service">
            <h3 class="title-section"> {{__('index.section_2.text_header')}} </h3>
            <div class="text-center">
                @if ($locale === 'en')
                    <img src="assets/img/img-skinproblem.png" class="img-title-fever" alt="">
                @elseif($locale === 'id')
                    <img src="assets/img/img-skinproblem-indo.png" class="img-title-fever" alt="">
                @else
                    <img src="assets/img/img-skinproblem.png" class="img-title-fever" alt="">
                @endif
            </div>
        </section>

        <section class="white-glow">
            <div class="text">
                <h3>{{__('index.section_3.text_1')}}
                    - <b>{{__('index.section_3.text_2')}}</b>
                </h3>
                <p>
                    {{__('index.section_3.text_3')}}
                </p>
            </div>
        </section>

        <section class="price">
            {{-- @if ($locale === 'en')
                <img src="assets/img/price.svg" class="img-price" alt="Price Image">
            @elseif($locale === 'id')  <!-- Corrected locale check for Indonesian language -->
                <img src="assets/img/price-indo.svg" class="img-price" alt="Indonesian Price Image">
            @else
                <img src="assets/img/price.svg" class="img-price" alt="Default Price Image">
            @endif --}}

            <img src="assets/img/price_indo.png" class="img-price" alt="Price Indo Image"> <!-- Optional fallback image -->

            <div class="row text-center gx-0">
                <div class="col-12 col-md-12 col-lg-12">
                    <img src="assets/img/price_1.svg" class="" alt="Price C">
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <img src="assets/img/price_2.svg" class="" alt="Price B">
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <img src="assets/img/price_3.svg" class="" alt="Price A">
                </div>
            </div>
            <span style="color: white; padding: 0px 20px 0px 20px; font-weight: 500;">* {{__('index.section_4.text_1')}}</span>
        </section>

        <section class="benefit">
            <div class="container">
                <div class="row gx-md-5 gy-4 gy-md-0 align-items-center">
                    <div class="col-md-12">
                        <h3 class="title-line blue">
                            <span> {{__('index.section_5.text_1')}} </span>
                        </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="items-benefit">
                                    <img src="assets/img/benefit/icon-benefit01.svg" alt="">
                                    <span> {{__('index.section_5.text_2')}} </span>
                                </div>
                                <div class="items-benefit">
                                    <img src="assets/img/benefit/icon-benefit02.svg" alt="">
                                    <span> {{__('index.section_5.text_3')}} </span>
                                </div>
                                <div class="items-benefit">
                                    <img src="assets/img/benefit/icon-benefit03.svg" alt="">
                                    <span> {{__('index.section_5.text_4')}} </span>
                                </div>
                                <div class="items-benefit">
                                    <img src="assets/img/benefit/icon-benefit04.svg" alt="">
                                    <span> {{__('index.section_5.text_5')}} </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="items-benefit">
                                    <img src="assets/img/benefit/icon-benefit05.svg" alt="">
                                    <span> {{__('index.section_5.text_6')}} </span>
                                </div>
                                <div class="items-benefit">
                                    <img src="assets/img/benefit/icon-benefit06.svg" alt="">
                                    <span> {{__('index.section_5.text_7')}} </span>
                                </div>
                                <div class="items-benefit">
                                    <img src="assets/img/benefit/icon-benefit07.svg" alt="">
                                    <span> {{__('index.section_5.text_8')}} </span>
                                </div>
                                <div class="items-benefit">
                                    <img src="assets/img/icon_manfaat_8_1.svg" alt="">
                                    <span> {{__('index.section_5.text_9')}} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="d-flex justify-content-center">
                            @if ($locale === 'en')
                                <img src="assets/img/img-package.svg" class="img-package" alt="">
                            @elseif($locale === 'id')
                                <img src="assets/img/img-package-indo.svg" class="img-package" alt="">
                            @else
                                <img src="assets/img/img-package.svg" class="img-package" alt="">
                            @endif
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="product">
            <div class="container">
                <div class="title-icon">
                    <img src="assets/img/icon-product.svg" alt="">
                    <div class="text">
                        <h5>{{__('index.section_6.text_header')}}</h5>
                    </div>
                </div>
                <p class="desc">
                    {{__('index.section_6.text_header_2')}}
                </p>
                <div class="swiper swiper-product mt-5">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card-slide-product">
                                <div class="img-product">
                                    <img src="assets/img/product/img-product01.png" alt="">
                                </div>
                                <h5 class="title">
                                    {{__('index.section_6.product.prod_1')}}
                                </h5>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-slide-product">
                                <div class="img-product">
                                    <img src="assets/img/product/img-product02.png" alt="">
                                </div>
                                <h5 class="title">
                                    {{__('index.section_6.product.prod_2')}}
                                </h5>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-slide-product">
                                <div class="img-product">
                                    <img src="assets/img/product/img-product03.png" alt="">
                                </div>
                                <h5 class="title">
                                    {{__('index.section_6.product.prod_3')}}
                                </h5>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-slide-product">
                                <div class="img-product">
                                    <img src="assets/img/product/img-product04.png" alt="">
                                </div>
                                <h5 class="title">
                                    {{__('index.section_6.product.prod_4')}}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="discover">
            <div class="container">
                <div class="text">
                    <p>
                        {{__('index.section_7')}}
                    </p>
                </div>
            </div>
        </section>

        <section class="testimonial">
            <div class="container">
                <div class="title-section text-dark mb-0">
                    {{__('index.section_8.text_header')}}
                </div>
                <div class="swiper swiper-article mt-3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card-slide-testimoni">
                                <div class="top">
                                    <p class="say">
                                        "{{__('index.section_8.sarah')}}"
                                    </p>
                                </div>
                                <div class="name">
                                    <img src="assets/img/avatar/testi_1.webp" alt="">
                                    <div class="rate d-flex g-2">
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                    </div>
                                    <h6>Sarah K.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-slide-testimoni">
                                <div class="top">
                                    <p class="say">
                                        “{{__('index.section_8.jane')}}”
                                    </p>
                                </div>
                                <div class="name">
                                    <img src="assets/img/avatar/testi_3.webp" alt="">
                                    <div class="rate d-flex g-2">
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                    </div>
                                    <h6>Jane D.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-slide-testimoni">
                                <div class="top">
                                    <p class="say">
                                        "{{__('index.section_8.mark')}}"
                                    </p>
                                </div>
                                <div class="name">
                                    <img src="assets/img/avatar/testi_2.webp" alt="">
                                    <div class="rate d-flex g-2">
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                    </div>
                                    <h6>Mark T.</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</x-master-layout>
