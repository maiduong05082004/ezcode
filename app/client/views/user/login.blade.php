@extends('layout.main')
@section('content')
<div class="login-form">
    <div class="modal-overlay">
        <div class="register-modal">
            <span class="close-modal">&times;</span>
            <h2>Đăng nhập</h2>
            <form action="{{ route('client/user/login') }}" method="post" enctype="multipart/form-data">
                @csrf 
                <input type="text" id="login-type" name="nameaccount" placeholder="Tên đăng nhập" required>
                <input type="password" id="login-type" name="password" placeholder="Mật khẩu" required>
                <input type="submit" id="login-submit" value="Đăng nhập" name="loginaccount">
                @if(isset($thongbao) && !empty($thongbao)) 
                    <p class="error-message">{{ $thongbao }}</p> 
                @endif
            </form>
            <a href="{{ route('client/user/register') }}">Chưa có tài khoản? Đăng ký ngay thôi nào</a>
        </div>
    </div>
</div>
@endsection
@include('user.script')
