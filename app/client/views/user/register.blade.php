@extends('layout.main')
@section('content')
<div class="registration-form">
    <div class="modal-overlay">
        <div class="register-modal">
            <span class="close-modal">&times;</span>
            <h2>Đăng ký thành viên</h2>
            <form action="{{route('client/user/register')}}" method="post" enctype="multipart/form-data">
                <input type="text" class="register-type" name="username" placeholder="Tên đăng nhập" required
                    autocomplete="new-password">
                <input type="password" class="register-type" name="password" placeholder="Mật khẩu" required
                    autocomplete="new-password">
                <input type="password" class="register-type" name="confirm_password" placeholder="Nhập lại mật khẩu"
                    required>
                <input type="text" class="register-type" name="accname" placeholder="Tên hiển thị" required>
                <input type="email" class="register-type" id="email" name="email" placeholder="Email" required>
                <input type="tel" class="register-type" id="phone" name="tel" placeholder="+84" required>
                <input type="text" class="register-type" id="address" name="address" placeholder="Địa chỉ"
                    required>
                <input type="hidden" name="role" value="2">
                <div class="box">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label for="agree">Tôi đồng ý với Điều Khoản Sử Dụng Của DUONGCOURSES</label>
                </div>
                <input type="submit" id="register-submit" value="Đăng ký" name="addaccount">
                <?php
                if (isset($thongbao) && $thongbao != '') {
                    echo $thongbao;
                }
                ?>
            </form>
            <a class="come-login" href="{{route('client/user/login')}}">
                <h4>Đăng nhập</h4>
            </a>
        </div>
    </div>
    </form>
</div>
@endsection
@include( 'user.script' )