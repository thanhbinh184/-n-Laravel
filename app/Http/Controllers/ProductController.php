<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }        
    }
    
    public function add_product()
    {
        $this->AuthLogin();
        $category_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();
        
        return view('admin.add_product')->with('category_product', $category_product)->with('brand_product', $brand_product);
           
    }
    public function all_product()
    {
       // $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=', 'tbl_product.category_id') 
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=', 'tbl_product.brand_id')
        ->orderby('tbl_product.product_id', 'desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/products'), $new_image);
            $data['product_image'] = '' . $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('add_product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add_product');
        /*$request->validate([
            'product_name' => 'required|max:255',
            'product_desc' => 'required',
            'product_content' => 'required',
            'product_price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'product_status' => 'required|integer',
        ]);

        $data = $request->only([
            'category_id',
            'brand_id',
            'product_name',
            'product_desc',
            'product_content',
            'product_price',
            'product_image',
            'product_status',
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $image_name);
            $data['product_image'] = $image_name;
        }

        /*if($request->hasFile('product_image')) {
            $new_image = rand(0,99). ' '.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/products', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('add_product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add_product');
    }
    */
        DB::table('tbl_product')->where('product_id', $id)->update($data);
            return Redirect::to('/all_product')->with('message', 'Cập nhật sản phẩm thành công');
        }

    // Hiển thị form chỉnh sửa sản phẩm
    public function editProduct($id)
    {
        $this->AuthLogin();
        $edit_product = DB::table('tbl_product')->where('product_id', $id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product);
        $category_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();
    
        return view('admin.edit_product', compact('edit_product', 'category_product', 'brand_product'));
        //return view('admin.edit_product', compact('product'));
        //return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    // Cập nhật sản phẩm
    public function updateProduct(Request $request, $product_id) 
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');

        // Nếu có upload ảnh mới
        if ($get_image) {
            // Lấy tên file và tạo tên file mới
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99) . '.' . $get_image->getClientOriginalExtension();

            // Di chuyển file vào thư mục lưu trữ
            $get_image->move(public_path('uploads/products'), $new_image);

            // Xóa ảnh cũ nếu có
            $old_image = DB::table('tbl_product')->where('product_id', $product_id)->value('product_image');
            if ($old_image && file_exists(public_path('uploads/products/' . $old_image))) {
                unlink(public_path('uploads/products/' . $old_image));
            }

            // Gán ảnh mới vào mảng dữ liệu
            $data['product_image'] = $new_image;
        }

        // Cập nhật dữ liệu sản phẩm
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);

        // Thông báo và chuyển hướng
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all_product');
    }

    
    
    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        $this->AuthLogin();
        $product = DB::table('tbl_product')->where('product_id', $id)->first();

        if ($product && file_exists(public_path('uploads/products/' . $product->product_image))) {
            unlink(public_path('uploads/products/' . $product->product_image));
        }

        DB::table('tbl_product')->where('product_id', $id)->delete();
        return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
    }

    //End Admin page
    public function details_product($product_id){
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=', 'tbl_product.category_id') 
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=', 'tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        return view('pages.category.show_details')->with('category', $category_product)->with('brand', $brand_product)->with('product_details', $details_product);
    }
}
