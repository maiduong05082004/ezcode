@extends('layout.main')

@section('content')
<div class="content">
    <h1>DANH SÁCH NGƯỜI DÙNG</h1>
    <div class="row2 form_content">
        <table class="user-table" border="1">
            <tr>
                <th>TÊN NGƯỜI DÙNG</th>
                <th>Ảnh</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Chức năng</th>
            </tr>
            @foreach ($Users as $user)
            @php
                $hinhpart = "public/assets/img/courses/" . $user->image;
            @endphp
            <tr>
                
                <td>{{ $user->name }}</td>
                <td><img src="{{ route($hinhpart) }}" alt="{{ $user->name }}"></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->tel }}</td>
                <td>
                    <a href="{{ route("admin/user/detail_user/$user->id") }}"><input type="button" value="Sửa" class="submit-btn"></a>
                    <a href="{{ route("admin/user/delete_user/$user->id") }}"><input type="button" value="Xóa" class="submit-btn"></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="row mb10">
        <a href="{{ route('admin/user/add_user') }}"> <input type="button" value="NHẬP THÊM" class="submit-btn" style="margin: 20px 11px;"></a>
    </div>
</div>
@endsection
