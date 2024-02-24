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
                        <h1 class="my-4">Miêu tả</h1>
                        <p>Bằng Thạc sĩ Máy tính và Công nghệ Thông tin trực tuyến (MCIT Online) là một bằng thạc sĩ trực
                            tuyến
                            về Khoa học Máy tính được thiết kế riêng cho các chuyên ngành không thuộc Khoa học Máy tính.
                            Được
                            cung cấp bởi Đại học Pennsylvania, chương trình mới này mang đến trực tuyến bằng MCIT lâu đời,
                            được
                            thiết lập trong khuôn viên trường. Chương trình MCIT Online giúp sinh viên không có nền tảng
                            khoa
                            học máy tính thành công trong lĩnh vực máy tính và công nghệ. Sinh viên MCIT Online đến từ các
                            nền
                            tảng học thuật đa dạng, từ kinh doanh và lịch sử đến hóa học và y học.</p>
                        <p>Khoa học máy tính có thể không ở trong quá khứ của bạn, nhưng nó sẽ có trong tương lai của bạn.
                            Công
                            nghệ có tác động to lớn đến cuộc sống của chúng ta và đang tạo ra những lĩnh vực và vị trí chưa
                            từng
                            tồn tại cách đây 5 năm. Được trang bị bằng khoa học máy tính cạnh tranh, sinh viên tốt nghiệp
                            MCIT
                            Online sẽ có vị trí đặc biệt để đảm nhiệm các vai trò trong lĩnh vực tài chính, chăm sóc sức
                            khỏe,
                            giáo dục và chính phủ, cũng như trong ngành phát triển phần mềm cốt lõi. Tiếp xúc với các dự án
                            thực
                            tế trong suốt chương trình sẽ chuẩn bị cho sinh viên để sử dụng các kỹ năng có tác động tích cực
                            đến
                            xã hội.</p>
                        <h1>Bạn sẽ học gì?</h1>
                        <ul class="list-unstyled">
                            <li class="mb-3"> <i class="fas fa-check text-info me-2"></i><strong>Chất lượng của Ivy
                                    League</strong>&nbsp;Một chương trình đầu tiên cung cấp bằng thạc sĩ của Ivy League về
                                Khoa
                                học Máy tính được thiết kế cho các chuyên ngành không thuộc CS.</li>
                            <li class="mb-3"> <i class="fas fa-check text-info me-2"></i><strong>Xây dựng quanh lịch trình
                                    của
                                    bạn Các môn học</strong>&nbsp; là 100 phần trăm trực tuyến. Bạn sẽ được hưởng lợi từ
                                chương
                                trình giảng dạy chất lượng cao giống như sinh viên trong khuôn viên trường và tốt nghiệp với
                                cùng một bằng cấp. Bằng tốt nghiệp không cho biết bằng được kiếm trực tuyến hay trong khuôn
                                viên
                                trường.</li>
                            <li class="mb-3"> <i class="fas fa-check text-info me-2"></i><strong>Định giá có thể truy cập
                                    Chi
                                    phí của bằng MCIT Online</strong>&nbsp; thấp hơn đáng kể so với các lựa chọn thay thế
                                trong
                                khuôn viên trường và hầu hết các bằng thạc sĩ trực tuyến về Khoa học Máy tính. Sinh viên
                                phải
                                trả $ 2,640 cho mỗi đơn vị khóa học cho tổng số 10 đơn vị khóa học. Học phí và lệ phí được
                                đăng
                                dưới dạng hướng dẫn và có thể thay đổi.</li>
                            <li class="mb-3"> <i class="fas fa-check text-info me-2"></i><strong>Hãy thử trước khi bạn
                                    đăng ký
                                    Penn Engineering</strong>&nbsp; cung cấp Chuyên ngành trực tuyến, Giới thiệu về Lập
                                trình
                                với Python và Java, trên Coursera để giúp bạn quyết định xem chương trình MCIT Online có phù
                                hợp
                                hay không trước khi bạn đăng ký.</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Đã đăng kí </strong>: {{ $Product->total_register }} học
                                    viên</li>
                                <li class="list-group-item"><strong>Thời lượng </strong>: {{ $Product->duration }}</li>
                                <li class="list-group-item"><strong>Danh mục </strong>: {{ $Product->category_name }}</li>
                                <li class="list-group-item"><strong>Giá khóa học</strong>:{{ $Product->price }}</li>
                                <li class="list-group-item text-center">
                                    <form method="POST" action="{{ route('client/payment/in_payment') }}">
                                        <input type="hidden" name="product_id" value="{{ $Product->id }}">
                                        <button type="submit" class="btn btn-warning">Đăng kí khóa học ngay</button>
                                    </form>
                                </li>
                                <li class="list-group-item text-center"><img
                                        src="{{ route('public/assets/img/gallery/searching.png') }}" width="78"
                                        alt="..." />
                                    <p class="text-muted mb-0 mt-4">Liên hệ với bộ phận hỗ trợ khách hàng tại</p><a
                                        class="text-info" href="contact-henry@gmail.com ">contact-henry@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->
            {{-- nút đăng kí  --}}
            <div class="container mt-4">
                <div class="row">
                    <div class="col ms-2">
                        <form method="POST" action="{{ route('client/payment/in_payment') }}">
                            <input type="hidden" name="product_id" value="{{ $Product->id }}">
                            <button type="submit" class="btn btn-warning p-3">Đăng kí khóa học ngay</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    </div>
@endsection
