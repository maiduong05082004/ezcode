@php
    $hinhpart = 'public/images/' . $User->image;
@endphp
@extends('layout.main')
@section('content')
<form action="{{route('admin/user/edit_user')}}" method="post" enctype="multipart/form-data" class="form-add">
    <div class="container-adduser">
        <div class="avatar-adduser">
            <div class="avatar-user">
                <img src="{{route($hinhpart)}}" alt="Avatar" class="avatar-image" id="update-image">
            </div>
            <div class="avatar-add">Avatar</div>
            <input type="file" id="image" name="image" accept="image/*" class="avatar-input" onchange="previewImage()">
        </div>
        <div class="form-section-add">
            <div class="input-group-add-2">
                <div class="left-box">
                    <div class="name">Tên :</div>
                    <input type="text" id="name" name="name" placeholder="Tên" value="{{$User->name}}">
                </div>
                <div class="right-box">
                    <div class="Email">Email :</div>
                    <input type="email" id="email" name="email" placeholder="Duong1234@gmail.com" value="{{$User->email}}">
                </div>
            </div>
            <div class="input-group-add-2">
                <div class="left-box">
                    <div class="phone">Số điện thoại :</div>
                    <input type="tel" id="phone-user" name="tel" placeholder="+84" value="{{$User->tel}}">
                </div>
                <div class="right-box">
                    <div class="Email">Địa chỉ :</div>
                    <input type="text" id="address-user" name="address" placeholder="" value="{{$User->address}}">
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $User->id }}">
            <input class="submit-btn" type="submit" value="Xác nhận sửa" name="updateuser" id="show-user">
            <a href="{{route('admin/user/list_user')}}"> <input class="submit-btn" type="button" value="Xem tài khoản" id="show-user"></a>
            <button type="reset" class="submit-btn"  id="show-user">Nhập lại</button>
        </div>
    </div>
</form>
@endsection
@include('product.script')

