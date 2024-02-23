@extends('layout.main')
@section('content')

<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-success text-white">
      Mua khóa học thành công
    </div>
    <div class="card-body">
      <h3 class="card-title">Cảm ơn bạn đã mua khóa học tại website của chúng tôi!</h3>
      <h4 class="card-text">Thông tin người mua khóa học gồm:</h4>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Họ và tên:</strong>{{$_SESSION['user_details']['name']}}</li>
        <li class="list-group-item"><strong>Số điện thoại:</strong>{{$_SESSION['user_details']['email']}}</li>
        <li class="list-group-item"><strong>Địa chỉ:</strong>{{$_SESSION['user_details']['address']}} </li>
        <li class="list-group-item"><strong>Email:</strong>{{$_SESSION['user_details']['tel']}}  </li>
      </ul>
      <br>
      <h4 class="card-text">Thông tin đơn hàng gồm:</h4>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Mã đơn hàng:</strong> {{ $orderId }}</li>
        <li class="list-group-item"><strong>Thông tin đơn hàng:</strong> {{ urldecode($orderInfo) }}</li>
        <li class="list-group-item"><strong>ID giao dịch:</strong> {{ $transId }}</li>
        <li class="list-group-item"><strong>Kết quả:</strong> {{ $resultCode == 0 ? 'Thành công' : 'Thất bại' }}</li>
        <li class="list-group-item"><strong>Tổng đơn hàng:</strong> {{$_SESSION['user_details']['product_price']}}₫</li>
        <li class="list-group-item"><strong>Thông điệp:</strong> {{ $message }}</li>
    </ul>
      <div class="mt-4">
        <a href="{{route('client/home_page')}}" class="btn btn-primary">Về trang chủ</a>
      </div>
    </div>
  </div>
</div>
@endsection
