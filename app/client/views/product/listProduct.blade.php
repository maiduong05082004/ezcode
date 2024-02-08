@extends('layout.main')
@section('content')
    <div class="content">
        <section class="pt-7 bg-600">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h6 class="font-sans-serif text-primary fw-bold">Danh mục khóa học</h6>
                        <h1 class="mb-6">Phát triển Website</h1>
                        <form class="row g-3" method="GET" action="{{ route('client/product/list_product') }}">
                            <div class="col-sm-6 col-md-3">
                                <label class="form-label" for="inputCategories">Danh mục</label>
                                <select class="form-select" id="inputCategories" name="category">
                                    <option selected="selected">Chọn danh mục</option>
                                    @foreach ($Categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto z-index-2">
                                <button class="btn btn-primary" type="submit" style="margin: 30px;">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end of .container-->
    
        </section>
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <div class="container" style="margin-top: -75px; ">
            <div class="row">
                @foreach ($Products as $product)
                    @php
                        $hinhpart = 'public/assets/img/courses/' . $product->image;
                    @endphp
                    <div class="col-md-4 mb-4">
                        <div class="card h-100"><img class="card-img-top w-100" src="{{ route($hinhpart) }}" alt="courses" />
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
    </div>
@endsection
