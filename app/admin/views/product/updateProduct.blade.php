@php
    $hinhpart = 'public/assets/img/courses/' . $Product->image;
@endphp
@extends('layout.main')
@section('content')
    <div class="admin-content">
        <h1>CHỈNH SỬA KHÓA HỌC</h1>
        <div class="row2 form_content">
            <form action="{{ route('admin/product/edit_product', ['id' => $Product->id]) }}" method="post" enctype="multipart/form-data">
                <div class="container-edit">
                    <div class="form-section-add">
                        <div class="input-group-add-2">
                            <div class="left-box">
                                <div class="email">Tên khóa học:</div>
                                <input type="text" id="name" name="name" placeholder="nhập tên" value="{{ $Product->name }}" required>
                            </div>
                            <div class="right-box">
                                <div class="phone">giá</div>
                                <input type="text" id="price" name="price" placeholder="1.000.000₫" value="{{ $Product->price }}" required>
                            </div>
                        </div>
                        <div class="input-group-add-2">
                            <div class="left-box">
                                <div class="describe">mô tả</div>
                                <textarea id="describe" name="describe" rows="1" placeholder="nhập mô tả sản phẩm"required>{{ $Product->describe }}</textarea>
                            </div>
                            <div class="right-box">
                                <div class="row2 mb10 form_content_container">
                                    <label> Loại khóa học </label> <br>
                                    <select name="category" id="category">
                                        @foreach ($Category as $category)
                                            <option value="{{ $category->id }}" {{ $Product->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="box-image">
                            <div class="image">hình</div>
                            <input type="file" id="image" name="image" class="update-img-product" onchange="previewImage()">
                            <img src="{{ route($hinhpart) }}" alt="{{ $Product->name }}" id="update-image" class="update-product-image">
                        </div>

                        <input type="hidden" name="id" value="{{ $Product->id }}">
                        <input type="submit" value="Lưu thay đổi" class="submit-btn" name="updateproduct" id="update-product">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@include('product.script')

