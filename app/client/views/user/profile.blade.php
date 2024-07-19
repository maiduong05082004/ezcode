@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Thông tin người dùng
        </div>
        <div class="card-body">
            <h3 class="card-title">Thông tin cá nhân</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Họ và tên:</strong> {{ $User->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $User->email }}</li>
                <li class="list-group-item"><strong>Số điện thoại:</strong> {{ $User->tel }}</li>
                <li class="list-group-item"><strong>Địa chỉ:</strong> {{ $User->address }}</li>
            </ul>
            <div class="mt-4">
                <a href="{{ BASE_URL }}" class="btn btn-primary">Về trang chủ</a>
            </div>
        </div>
    </div>
</div>
@endsection
