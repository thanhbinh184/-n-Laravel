@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
    <div class="panel-heading">
        Cập Nhật Thương Hiệu Sản Phẩm
    </div>
    <div class="panel-body">
        <form role="form" action="{{ route('update.brand', $brand->brand_id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="brand_name">Tên thương hiệu</label>
                <input type="text" class="form-control" name="brand_name" value="{{ $brand->brand_name }}">
            </div>
            <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none" rows="6" class="form-control" name="product_desc" id="exampleInputPassword1" >{{$brand->brand_desc}}</textarea>
            </div>
            <div class="form-group">
                <label for="brand_status">Trạng thái</label>
                <select name="brand_status" class="form-control">
                    <option value="0" {{ $brand->brand_status == 0 ? 'selected' : '' }}>Ẩn</option>
                    <option value="1" {{ $brand->brand_status == 1 ? 'selected' : '' }}>Hiển thị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">Cập nhật</button>
        </form>
    </div>
</div>
@endsection