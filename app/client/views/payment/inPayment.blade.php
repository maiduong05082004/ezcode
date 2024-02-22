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
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Danh mục </strong>: {{ $Product->category_name }}
                                </li>
                                <li class="list-group-item"><strong>Giá khóa học</strong>:{{ $Product->price }}</li>
                                <li class="list-group-item text-center"><strong>THÔNG TIN NGƯỜI MUA</strong></li>
                                <li class="list-group-item"><strong>Tên</strong>:</li>
                                <li class="list-group-item"><input type="text" class="border-none border-bottom-custom b-n-f" id="name" value="{{ $User->name }}" /></li>
                                <li class="list-group-item"><strong>Email</strong>:</li>
                                <li class="list-group-item"><input type="text" class="border-none border-bottom-custom b-n-f" id="email" value="{{ $User->email }}" /></li>
                                <li class="list-group-item"><strong>Địa chỉ</strong>:</li>
                                <li class="list-group-item"><input type="text" class="border-none border-bottom-custom b-n-f" id="address" value="{{ $User->address }}" /></li>
                                <li class="list-group-item"><strong>Số điện thoại</strong>: </li>
                                <li class="list-group-item"><input type="text" class="border-none border-bottom-custom b-n-f" id="tel" value="{{ $User->tel }}" /></li>
                                <li class="list-group-item text-center">
                                    <a href="#" class="btn btn-primary">Mua ngay</a>
                                </li>
                                <li class="list-group-item text-center"><img
                                        src="{{ route('public/assets/img/gallery/searching.png') }}" width="78"
                                        alt="..." />
                                    <p class="text-muted mb-0 mt-4">Liên hệ với bộ phận hỗ trợ khách hàng tại</p><a
                                        class="text-info" href="duongmdph40323@gmail.com ">duongmdph40323@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->
            {{-- nút đăng kí  --}}
           
        </section>
    </div>
@endsection
