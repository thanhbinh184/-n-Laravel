@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Sản Phẩm
            </header>
            <div class="panel-body">
                @if(Session::has('message'))
                    <span class="text-alert">{{ Session::get('message') }}</span>
                    {{ Session::put('message', null) }}
                @endif
                <div class="position-center">
                    @foreach($edit_product as $key => $product)
                    <form role="form" action="{{URL::to('/update_product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$product->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1"  value="{{$product->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{ URL::to('public/uploads/products/' . $product->product_image) }}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="6" class="form-control" name="product_desc" id="exampleInputPassword1" >{{$product->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="6" class="form-control" name="product_content" id="exampleInputPassword1">{{$product->product_content}}</textarea>
                        </div>           
                        <div class="form-group">
                            <label for="category_id">Danh mục sản phẩm</label>
                            <select name="product_category" class="form-control input-sm m-bot15">
                                @foreach($category_product as $key => $cate)
                                @if($cate->category_id==$product->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Thương Hiệu</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                @if($brand->brand_id==$product->brand_id)
                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_status">Trạng Thái:</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hết Hàng</option>
                                <option value="1">Còn Hàng</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
