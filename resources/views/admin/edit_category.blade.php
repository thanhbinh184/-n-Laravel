@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
    <div class="panel-heading">
        Chỉnh Sửa Danh Mục Sản Phẩm
    </div>
    <div class="panel-body">
        <form role="form" action="{{ route('update.category', $category->category_id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="category_name">Tên danh mục</label>
                <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
            </div>
            <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="6" class="form-control" name="category_desc" id="exampleInputPassword1" >{{$category->category_desc}}</textarea>
            </div>
            <div class="form-group">
                <label for="category_status">Trạng thái</label>
                <select name="category_status" class="form-control">
                    <option value="0" {{ $category->category_status == 0 ? 'selected' : '' }}>Ẩn</option>
                    <option value="1" {{ $category->category_status == 1 ? 'selected' : '' }}>Hiển thị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">Cập nhật</button>
        </form>
    </div>
</div>
@endsection