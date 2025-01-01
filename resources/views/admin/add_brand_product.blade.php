@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Thương Hiệu Sản Phẩm
                        </header>
                        <div class="panel-body">
                            <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get("message");
                                if (empty($message)) {
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save_brand_product')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương Hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Thương Hiệu</label>
                                    <textarea style="resize: none" rows="6" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                                </div>
                                    <label for="brand_product_status">Trạng Thái:</label>
                                    <select name="brand_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                    <br>
                                <button type="submit" class="btn btn-info">Thêm Thương Hiệu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection