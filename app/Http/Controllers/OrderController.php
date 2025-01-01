<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\Brand;
use App\Models\OrderDetail;
use DB;

class OrderController extends Controller
{
    // Danh sách đơn hàng
    public function index()
    {
        $orders = Order::with('customer', 'orderDetails.product.category')->paginate(10);
        $category = Category::where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        return view('admin.order', compact('orders', 'category', 'brand'));
    }

    public function delete($id) {
        DB::table('tbl_orders')->where('orders_id', $id)->delete();
        return redirect()->back()->with('message', 'Xóa đơn hàng thành công');
    }
    
        public function storeOrder(Request $request)
    {
        $customer_id = $request->customer_id;
        $cart = $request->cart; // Cart chứa thông tin sản phẩm và số lượng.

        // Lưu thông tin đơn hàng
        $order = Order::create([
            'customers_id' => $customer_id,
            'orders_status' => 'pending',
            'total_price' => $cart['total_price'],
            'order_date' => now(),
        ]);

        // Lưu chi tiết đơn hàng
        foreach ($cart['items'] as $item) {
            OrderDetail::create([
                'orders_id' => $order->orders_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'product_price' => $item['price'],
            ]);
        }

        return redirect()->route('order.success')->with('success', 'Đặt hàng thành công!');
}

}
