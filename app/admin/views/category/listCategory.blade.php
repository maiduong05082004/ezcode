@extends('layout.main')
@section('content')
<div class="admin-content">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI KHÓA HỌC</h1>
    </div>
    <div class="row2 form_content ">
            <div class="row2 mb10 formds_loai">
                <table border="1" class="product-table">
                    <tr>
                        <th>TÊN LOẠI</th>
                        <th>Hành động</th>
                    </tr>
                    
                        @foreach($Categorys as $Category) 
                            <tr>
                                <td>{{$Category->name}}</td>
                                <td>
                                    <a href="{{route("admin/category/detail_category/$Category->id")}}"><input type="button" value="Sửa" class="submit-btn"></a> 
                                    <a href="{{route("admin/category/delete_category/$Category->id")}}"><input type="button" class="submit-btn" value="Xóa"></a>
                                </td>
                            </tr>
                        @endforeach
                    

                </table>
            </div>
            <div class="row mb10 ">
                <a href="{{route('admin/category/add_category')}}"> <input class="submit-btn" type="button" value="NHẬP THÊM" style="margin: 20px 11px;"></a>
            </div>
    </div>
</div>


@endsection
