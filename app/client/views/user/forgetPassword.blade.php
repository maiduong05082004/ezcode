@extends('layout.main')

@section('content')
<div class="container mt-5">
    <h2>Đổi Mật Khẩu</h2>
    <form id="changePasswordForm" method="POST" action="{{ route('client/user/forgetPassword') }}" onsubmit="return validatePasswords()">
        @csrf
        <div class="mb-3">
            <label for="currentPassword" class="form-label">Mật Khẩu Hiện Tại</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="mb-3">
            <label for="newPassword" class="form-label">Mật Khẩu Mới</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="mb-3">
            <label for="confirmNewPassword" class="form-label">Xác Nhận Mật Khẩu Mới</label>
            <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
        </div>
        <div class="form-text mb-3">
            Mật khẩu phải từ 8-20 ký tự, bao gồm chữ cái và số, không chứa ký tự đặc biệt hoặc emoji.
        </div>
        <button type="submit" class="btn btn-primary">Thay Đổi Mật Khẩu</button>
    </form>
</div>

<script>
    function validatePasswords() {
        var newPassword = document.getElementById('newPassword').value;
        var confirmNewPassword = document.getElementById('confirmNewPassword').value;
        if (newPassword !== confirmNewPassword) {
            alert('Mật khẩu mới và xác nhận mật khẩu không khớp.');
            return false;
        }
        return true;
    }
</script>
@endsection
