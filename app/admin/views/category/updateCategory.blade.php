@extends('layout.main')
@section('content')
<div class="admin-content">
    <h1>SỬA LOẠI SẢN PHẨM</h1>
    <div class="row2 form_content ">
        <form action="{{ route('admin/category/edit_category', ['id' => $Category->id]) }}" method="POST">
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="name" id="name" placeholder="nhập vào tên" value="{{$Category->name}}">
            </div>
            <div class="mb10 ">
                <input type="hidden" name="id" value="{{ $Category->id }}">
                <input  type="submit" name="updateCategory" value="Cập nhập lại" class="submit-btn">
                <input  type="reset" value="NHẬP LẠI" class="submit-btn">
                <a href="{{route('admin/category/list_category')}}"><input type="button" value="DANH SÁCH" class="submit-btn"></a>
            </div>
        </form>
    </div>
</div>

@endsection
