@extends('layout.main')
@section('content')
<div class="admin-content">
    <h1>Thêm sản phẩm</h1>
    <div class="row2 form_content ">
        <form action="{{ route('admin/product/create_product')}}" method="POST" enctype="multipart/form-data">
            <div class="container-add">
                <div class="form-section-add">
                    <div class="input-group-add-2">
                        <div class="left-box">
                            <div class="email">Tên sản phẩm</div>
                            <input type="text" id="name" name="name" placeholder="nhập tên">
                        </div>
                        <div class="right-box">
                            <div class="phone">giá</div>
                            <input type="text" id="price" name="price" placeholder="1.000.000₫">
                        </div>
                    </div>
                    <div class="input-group-add-2">
                        <div class="left-box">
                            <div class="describe">mô tả</div>
                            <textarea id="describe" name="describe" rows="1" placeholder="nhập mô tả sản phẩm"></textarea>
                        </div>
                        <div class="right-box">
                            <div class="row2 mb10 form_content_container">
                                <label>Loại sản phẩm</label> <br>
                                <select name="category" id="category">
                                    @foreach ($Category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-image">
                        <div class="image">hình</div>
                        <input type="file" id="image" name="image" class="update-img-product" onchange="previewImage()">
                        <img src="{{route('public/assets/img/courses/icon-food1.png')}}" id="update-image" class="update-product-image">
                    </div>
                    <div class="row mb10 " id="buttons">
                        <input class="submit-btn" type="submit" value="THÊM MỚI" name="addproduct">
                        <input class="submit-btn" type="reset" value="NHẬP LẠI" >

                        <a href="{{route('product/list_product')}}"><input class="submit-btn" id="list" type="button" value="DANH SÁCH"></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@include('product.script')