<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
      // Lấy dữ liệu danh mục
      $category = Category::where('category_status', 1)->orderBy('category_id', 'desc')->get();
      //Lấy dữ liệu thương hiệu
      $brand = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
      //Lấy dữ liệu sản phẩm
      $all_product = Product::where('product_status', 1)->orderBy('product_id', 'desc')->limit(18)->get();
  
      return view('pages.home', compact('category', 'brand', 'all_product'));
    }

    public function search(Request $request)  
    {
      $search = $request->input('search');

      // Nếu không có từ khóa tìm kiếm, chuyển hướng về trang chủ
      if (!$search) {
        return redirect()->route('home')->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
    }

    // Tìm kiếm sản phẩm theo tên hoặc mô tả
    $products = Product::where('product_name', 'like', '%' . $search . '%')
        ->orWhere('product_desc', 'like', '%' . $search . '%')
        ->paginate(12); // Thêm phân trang

    // Lấy dữ liệu danh mục và thương hiệu
    $category = Category::where('category_status', 1)->orderBy('category_id', 'desc')->get();
    $brand = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

    return view('pages.search', compact('products', 'search', 'category', 'brand'));

    }
   

}
