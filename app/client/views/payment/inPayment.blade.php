@extends('layout.main')
@section('content')
    @php
        $hinhpart = 'public/assets/img/courses/' . $Product->image;
    @endphp
    <div class="content">
        <section class="pb-11 pt-7 bg-600">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h6 class="font-sans-serif text-primary fw-bold">Chi tiết khóa học</h6>
                        <h1 class="mb-6">{{ $Product->category_name }}<br />{{ $Product->name }}</h1>

                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section style="margin-top:-21.5rem">

            <div class="container">
                <div class="row">
                    <div class="col-md-8"><img class="w-100" src="{{ route($hinhpart) }}" alt="..." />
                    </div>
                    <div class="col-md-4">
                        <form onsubmit="return comfirm('Xác nhận đặt hàng')" method="POST"
                            action="{{ route('client/payment/online_checkout') }}">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center"><strong>Vui lòng kiểm tra thông tin Khách hàng,
                                            thông tin Giỏ hàng trước khi Đặt hàng.</strong></li>
                                    <li class="list-group-item"><strong>Danh mục </strong>: {{ $Product->category_name }}
                                    </li><input type="hidden" name="product_price" value="{{ $Product->price }}">
                                    <li class="list-group-item"><strong>Giá khóa học</strong>:{{ $Product->price }}</li>
                                    <li class="list-group-item"><strong>Tên</strong>:</li>
                                    <li class="list-group-item"><input type="text"
                                            class="border-none border-bottom-custom b-n-f" id="name" name="name"
                                            value="{{ $User->name }}" /></li>
                                    <li class="list-group-item"><strong>Email</strong>:</li>
                                    <li class="list-group-item"><input type="text"
                                            class="border-none border-bottom-custom b-n-f" id="email" name="email"
                                            value="{{ $User->email }}" /></li>
                                    <li class="list-group-item"><strong>Địa chỉ</strong>:</li>
                                    <li class="list-group-item"><input type="text"
                                            class="border-none border-bottom-custom b-n-f" id="address" name="address"
                                            value="{{ $User->address }}" /></li>
                                    <li class="list-group-item"><strong>Số điện thoại</strong>: </li>
                                    <li class="list-group-item"><input type="text"
                                            class="border-none border-bottom-custom b-n-f" id="tel" name="tel"
                                            value="{{ $User->tel }}" /></li>
                                    <li class="list-group-item text-center">
                                        <input type="submit" class="btn btn-primary" name="payUrl" value="Thanh toán với MOMO">
                                        <input type="submit" class="btn btn-primary" name="COD" value="Thanh toán bằng COD">
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
