<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;


class AdminController extends Controller
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
    
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $this->AuthLogin();
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

    // Kiểm tra thông tin đăng nhập
    $result = DB::table('tbl_admin')
        ->where('admin_email', $admin_email)
        ->where('admin_password', $admin_password)
        ->first();


    if ($result) {
        // Nếu thông tin đăng nhập đúng
        Session::put('admin_id', $result->admin_id);
        Session::put('admin_name', $result->admin_name);
        return Redirect::to('/dashboard');
    } else {
        // Nếu thông tin đăng nhập sai
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng!');
    }
    }

    public function show_orders()
    {
        $orders = Order::with('customer', 'shipping', 'orderDetails')->orderBy('created_at', 'desc')->get();
    
        return view('admin.order', compact('orders'));
    }
    
    

    public function show($id)
    {
        $order = Order::with('orderDetails.product.category')->findOrFail($id);
        return view('admin.order_details', compact('order'));
    }


    
    public function logout()
    {
        Session::forget(['admin_name', 'admin_id']);
        return Redirect::to('admin');
    }
}
  