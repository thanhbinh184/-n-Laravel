<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{

   public function login_checkout()
   {
       $category = Category::where('category_status', 1)->orderBy('category_id', 'desc')->get();
       //Lấy dữ liệu thương hiệu
       $brand = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

       return view('pages.checkout.login_checkout')->with('category', $category)->with('brand', $brand);
   }
   public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = Hash::make($request->customer_password); 
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        Session::flash('message', 'Đăng ký tài khoản thành công!');

        return Redirect::to('/checkout');

    }
    public function checkout()
    {
        $category = Category::where('category_status', 1)->orderBy('category_id', 'desc')->get();
        //Lấy dữ liệu thương hiệu
        $brand = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.show_checkout')->with('category', $category)->with('brand', $brand);
    }

    // Đăng nhập khách hàng
   public function login_customer(Request $request)
   {
       $email = $request->email_account;
       $password = $request->password_account;

       // Lấy thông tin khách hàng từ email
       $result = DB::table('tbl_customers')->where('customer_email', $email)->first();

       if ($result && Hash::check($password, $result->customer_password)) {
           // Nếu đúng mật khẩu, lưu session
           Session::put('customers_id', $result->customers_id);
           Session::put('customer_name', $result->customer_name);
           return Redirect::to('/checkout');
       } else {
           // Nếu sai, hiển thị lỗi
           Session::flash('error', 'Email hoặc mật khẩu không chính xác!');
           return Redirect::to('/login_checkout');
       }
   }

   public function save_checkout_customer(Request $request)
   {
       $data = $request->all();
   
       // Kiểm tra xem khách hàng đã đăng nhập hay chưa
       $customers_id = Session::get('customers_id');
       if (!$customers_id) {
           return redirect()->back()->with('error', 'Vui lòng đăng nhập trước khi đặt hàng.');
       }
   
       // Lưu thông tin giao hàng
       $shipping_id = Shipping::insertGetId([
           'shipping_email' => $data['shipping_email'],
           'shipping_name' => $data['shipping_name'],
           'shipping_address' => $data['shipping_address'],
           'shipping_phone' => $data['shipping_phone'],
       ]);
   
       // Tính tổng giá trị đơn hàng từ giỏ hàng
       $total_price = 0;
       foreach (Cart::content() as $item) {
           $total_price += $item->price * $item->qty;
       }
   
       // Lưu đơn hàng
       $order = Order::create([
           'customers_id' => $customers_id,
           'shipping_id' => $shipping_id,
           'order_status' => 'pending',
           'total_price' => $total_price,
           'order_date' => now(),
       ]);
   
       // Lưu chi tiết đơn hàng
       foreach (Cart::content() as $item) {
           OrderDetail::create([
               'orders_id' => $order->id,
               'product_id' => $item->id,
               'product_name' => $item->name,
               'product_price' => $item->price,
           ]);
       }
   
       // Xóa giỏ hàng sau khi đặt hàng thành công
       Cart::destroy();
   
       // Xử lý thanh toán
       if ($data['payment_method'] == 'cod') {
           return redirect()->route('checkout.payment')->with('message', 'Đặt hàng thành công. Thanh toán khi nhận hàng.');
       } elseif ($data['payment_method'] == 'bank') {
           return redirect()->route('checkout.bank')->with('message', 'Vui lòng thực hiện chuyển khoản để hoàn tất đơn hàng.');
       }
   }
   

   // Trang thông báo thanh toán thành công
   public function payment()
   {
       $category = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
       $brand = DB::table('tbl_brand_product')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
   
       Session::flash('message', 'Cảm ơn bạn đã mua hàng! Đơn hàng của bạn đã được xử lý thành công.');
       return view('pages.checkout.payment')->with('category', $category)->with('brand', $brand);
   }

   // Trang thông tin thanh toán qua chuyển khoản ngân hàng
   public function checkout_bank()
   {
       $category = DB::table('tbl_category_product')->where('category_status', 1)->orderby('category_id', 'desc')->get();
       $brand = DB::table('tbl_brand_product')->where('brand_status', 1)->orderby('brand_id', 'desc')->get();
       
       $bank_account = [
           'name' => 'Hồ Thị Minh Thư',  // Tên chủ tài khoản
           'account_number' => '123456789',  // Số tài khoản
           'bank_name' => 'Ngân hàng MB Bank',  // Tên ngân hàng
       ];

       return view('pages.checkout.bank', compact('bank_account'))->with('category', $category)->with('brand', $brand);
   }

   // Đăng xuất
   public function logout_checkout()
   {
       Session::flush();
       return Redirect::to('/login_checkout');
   }

}