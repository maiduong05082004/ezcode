@extends('layout.main')
@section('content')
    <div class="content">
        <section class="pt-6 bg-600" id="home">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100"
                            src="{{ route('public/assets/img/gallery/hero-header.png') }}" width="470" alt="hero-header" />
                    </div>
                    <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
                        <h4 class="fw-bold font-sans-serif">Trở thành bậc thầy Full Stack</h4>
                        <h1 class="fs-6 fs-xl-7 mb-5">Học Full Stack cấp tốc trong vòng 6 Tháng</h1><a
                            class="btn btn-primary me-2" href="#!" role="button">Đăng kí ngay</a><a
                            class="btn btn-outline-secondary" href="#!" role="button">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </section>
    
    
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-0" style="margin-top:-5.8rem">
    
            <div class="container">
                <div class="row">
                    <div class="card card-span bg-secondary">
                        <div class="card-body">
                            <div class="row flex-center gx-0">
                                <div class="col-lg-4 col-xl-2 text-center text-xl-start"><img
                                        src="{{ route('public/assets/img/gallery/funfacts.png') }}" width="170"
                                        alt="..." /></div>
                                <div class="col-lg-8 col-xl-4">
                                    <h1 class="text-light fs-lg-4 fs-xl-5">Khóa Học <span class="text-primary">Lập
                                            Trình PHP Cơ Bản </span> Của Chúng Tôi!</h1>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <h1 class="display-1 text-light text-center text-xl-end">11 : 02 : 45 : 21</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->
    
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
        <section>
            <div class="container">
                <div class="row">
                    <h1 class="text-center mb-5"> Các khóa học nổi bật hàng đầu</h1>
                    @foreach ($Products as $product)
                        @php
                            $hinhpart = 'public/assets/img/courses/' . $product->image;
                        @endphp
                        <div class="col-md-4 mb-4">
                            <div class="card h-100"><img class="card-img-top w-100" src="{{ route($hinhpart) }}"
                                    alt="courses" />
                                <div class="card-body">
                                    <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">{{ $product->name }}</h5><a
                                        class="text-muted fs--1 stretched-link text-decoration-none"
                                        href="{{ route("client/product/product_detail/$product->id") }}">{{ $product->describe }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
