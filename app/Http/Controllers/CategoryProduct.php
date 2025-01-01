<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryProduct extends Controller
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
    public function add_category_product()
    {
        $this->AuthLogin();
        return view("admin.add_category_product");
    }
    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = DB::table("tbl_category_product")->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view("admin_layout")->with('admin.all_category_product', $manager_category_product);
    }
    public function save_category_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        return Redirect::to('add_category_product');

    }
    public function editCategory($id) {
        $this->AuthLogin();
        $category = DB::table('tbl_category_product')->where('category_id', $id)->first();
        return view('admin.edit_category', compact('category'));
    }
    
    public function deleteCategory($id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $id)->delete();
        return redirect()->back()->with('message', 'Xóa danh mục thành công');
    }
    
    public function updateCategory(Request $request, $id) {
        $this->AuthLogin();
        $data = $request->all();
        DB::table('tbl_category_product')->where('category_id', $id)->update([
            'category_name' => $data['category_name'],
            'category_status' => $data['category_status'],
        ]);
        return redirect('/all_category_product')->with('message', 'Cập nhật danh mục thành công');
}

    //Phần hiện danh mục bên home
    public function show_category_home($category_id) {
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=',
        'tbl_category_product.category_id')->where('tbl_product.category_id', $category_id)->get();
    
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();

        return view('pages.category.show_category')->with('category', $category_product)->with('brand', $brand_product)
        ->with('category_by_id', $category_by_id)->with('category_name', $category_name);
    }
}