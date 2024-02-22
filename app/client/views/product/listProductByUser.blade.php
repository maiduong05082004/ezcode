@extends('layout.main')
@section('content')
    <div class="content">
        <section class="pt-7 bg-600">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-6 text-primary">Danh mục khóa học của {{$User->name}}</h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="container" style="margin-top: -75px; ">
            <div class="row">
                @if (!empty($message))
                    <div class="alert alert-warning" role="alert">
                        {{ $message }}
                    </div>
                @else
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
                @endif
            </div>
        </div>
    </div>
@endsection
