@extends('layout.main')
@section('content')
<div class="content">
    <h1>DANH SÁCH KHÓA HỌC</h1>
    <div class="row2 form_content">
        <table class="product-table" border="1">
            <tr>
                <th class="center">TÊN KHÓA HỌC</th>
                <th class="center">Hình</th>
                <th class="center">Giá</th>
                <th class="center">Mô tả</th>
                <th class="center">Loại khóa học</th>
                <th class="center">Chức năng</th>
            </tr>
            @foreach ($Products as $product)
            @php
                $hinhpart = "public/assets/img/courses/" . $product->image;
            @endphp
            <tr>
                
                <td>{{ $product->name }}</td>
                <td><img src="{{ route($hinhpart) }}" alt="{{ $product->name }}"></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->describe }}</td>
                <td>{{ $product->category_name }}</td>
                <td class="center">
                    <a href="{{ route("admin/product/detail_product/$product->id") }}"><input type="button" value="Sửa" class="submit-btn"></a>
                    <a href="{{ route("admin/product/delete_product/$product->id") }}"><input type="button" value="Xóa" class="submit-btn"></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="row mb10">
        <a href="{{ route('admin/product/add_product') }}"> <input type="button" value="NHẬP THÊM" class="submit-btn" style="margin: 20px 11px;"></a>
    </div>
</div>
@endsection
