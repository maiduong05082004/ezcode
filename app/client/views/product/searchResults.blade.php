@extends('layout.main')

@section('content')
<div class="container mt-5">
    <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>
    @if (count($Products) > 0)
        <div class="row">
            @foreach ($Products as $product)
                @php
                    $hinhpart = 'public/assets/img/courses/' . $product->image;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top w-100" src="{{ BASE_URL . '/' . $hinhpart }}" alt="courses" />
                        <div class="card-body">
                            <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">{{ $product->name }}</h5>
                            <a class="text-muted fs--1 stretched-link text-decoration-none"
                                href="{{ BASE_URL . 'client/product/product_detail/' . $product->id }}">
                                {{ $product->description }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Không tìm thấy kết quả nào.</p>
    @endif
</div>
@endsection
