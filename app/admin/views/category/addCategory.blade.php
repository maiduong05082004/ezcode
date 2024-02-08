@extends('layout.main')
@section('content')
<div class="admin-content">
    <h1>THÊM MỚI LOẠI SẢN PHẨM</h1>
    <div class="row2 form_content ">
        <form action="{{route('admin/category/create_category')}}" method="POST">
            <div class="row2 mb10">
                <label>Tên loại sản phẩm:</label> <br>
                <input type="text" name="name" id="name" placeholder="nhập vào tên">
            </div>
            <div class="mb10 ">
                <input  type="submit" name="addCategory" value="THÊM MỚI" class="submit-btn">
                <input  type="reset" value="NHẬP LẠI" class="submit-btn">
                <a href="{{route('admin/category/list_category')}}"><input type="button" value="DANH SÁCH" class="submit-btn"></a>
            </div>
        </form>
    </div>
</div>

@endsection
