<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function save_cart(Request $request){
        $request->validate([
            'productid_hidden' => 'required|exists:tbl_product,product_id',
            'qty' => 'required|integer|min:1'
        ]);
    
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();
    
        if (!$product_info) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        $data = [
            'id' => $product_info->product_id,
            'qty' => $quantity,
            'name' => $product_info->product_name,
            'price' => $product_info->product_price,
            'weight' => $product_info->product_price,
            'options' => ['image' => $product_info->product_image]
        ];
    
        Cart::add($data);
        Session::flash('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
        return Redirect::to('/show_cart');
    }
    public function show_cart(){
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $cartContent = Cart::content();
        return view('pages.cart.show_cart')->with('category', $category_product)->with('brand', $brand_product)->with('cart', $cartContent);
    }
    public function remove($rowId)
    {
        // Xóa sản phẩm khỏi giỏ hàng bằng rowId
        Cart::remove($rowId);

        // Thông báo thành công và chuyển hướng lại giỏ hàng
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
    public function increaseQuantity($rowId)
    {
        $cartItem = Cart::get($rowId);
        Cart::update($rowId, $cartItem->qty + 1); // Tăng số lượng lên 1
        return redirect()->back()->with('success', 'Cập nhật số lượng thành công!');
    }

    public function decreaseQuantity($rowId)
    {
        $cartItem = Cart::get($rowId);
        if ($cartItem->qty > 1) {
            Cart::update($rowId, $cartItem->qty - 1); // Giảm số lượng xuống 1
        } else {
            Cart::remove($rowId); // Xóa sản phẩm nếu số lượng bằng 0
        }
        return redirect()->back()->with('success', 'Cập nhật số lượng thành công!');
    }
    
}