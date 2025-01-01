<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandProduct;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
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
    public function add_brand_product()
    {
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product()
    {
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view("admin_layout")->with('admin.all_brand_product', $manager_brand_product);
    }
    public function save_brand_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;

        DB::table('tbl_brand_product')->insert($data);
        Session::put('message','Thêm thương hiệu thành công');
        return Redirect::to('add_brand_product');

    }
    public function editBrand($id) {
        $this->AuthLogin();
        $brand = DB::table('tbl_brand_product')->where('brand_id', $id)->first();
        return view('admin.edit_brand', compact('brand'));
    }
    
    public function deleteBrand($id) {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $id)->delete();
        return redirect()->back()->with('message', 'Xóa thương hiệu thành công');
    }
    
    public function updateBrand(Request $request, $id) {
        $this->AuthLogin();
        $data = $request->all();
        DB::table('tbl_brand_product')->where('brand_id', $id)->update([
            'brand_name' => $data['brand_name'],
            'brand_status' => $data['brand_status'],
        ]);
        return redirect('/all_brand_product')->with('message', 'Cập nhật thương hiệu thành công');
    }
    //Phần hiện thương hiệu bên home
    public function show_brand_home($brand_id) {
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $brand_by_id = DB::table('tbl_product')
        ->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')
        ->where('tbl_product.brand_id', $brand_id)
        ->where('tbl_product.product_status', '1')->get();
        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id', $brand_id)->limit(1)->get();
        return view('pages.category.show_brand')->with('category', $category_product)->with('brand', $brand_product)
        ->with('brand_by_id', $brand_by_id)->with('brand_name', $brand_name);
    }
}
