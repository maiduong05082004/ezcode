@extends('layout.main')
@section('content')
<div class="content">
    <h1>DANH SÁCH SẢN PHẨM</h1>
    <div class="row2 form_content">
        <table class="product-table" border="1">
            <tr>
                <th>TÊN SẢN PHẨM</th>
                <th>Hình</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Loại hàng</th>
                <th>Chức năng</th>
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
                <td>
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
