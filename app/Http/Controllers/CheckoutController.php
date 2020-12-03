<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout()
    {
    	return view('pages.checkout.login_checkout');
    }
    public function add_customer(Request $request)
    {
    	$data = array();
    	$data['customer_username'] = $request->customer_username;
    	$data['customer_password'] = md5($request->customer_password);
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_phone'] = $request->customer_phone;
    	
    	$customer_id = DB::table('tbl_customers')->insertGetId($data);
    	Session::put('customer_id', $customer_id);
    	Session::put('customer_name', $request->customer_name);

    	return Redirect('/checkout');
    }
    public function checkout()
    {
    	return view('pages.checkout.show_checkout');
    }
     public function payment()
    {
        return view('pages.checkout.payment');
    }
    public function order_place(Request $request)
    {
        //insert payment_method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = '0';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = '0';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        switch ($data['payment_method']) {
            case 1:
                echo 'Thanh toán bằng ATM';
                break;
            
            case 2:
                return view('pages.checkout.handcash');
                break;

            case 3:
                echo 'Thanh toán bằng thẻ ghi nợ';
                break;
        }
        
    }
    public function save_checkout_customer(Request $request)
    {
    	$data = array();
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_name'] = ($request->shipping_name);
    	$data['shipping_address'] = $request->shipping_address;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['shipping_notes'] = $request->shipping_notes;

    	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);
    	Session::put('shipping_id', $shipping_id);
    	Session::put('shipping_name', $request->shipping_name);

    	return Redirect('/payment');
    }
    public function login_customer(Request $request)
    {
    	$username = $request->customer_username;
    	$password = md5($request->customer_password);
    	$result = DB::table('tbl_customers')->where('customer_username', $username)->where('customer_password', $password)->first();
    	if($result){
    		Session::put('customer_id', $result->customer_id);
    		return Redirect('/checkout');
    	}
    	Session::put('message', 'Tên tài khoản hoặc mật khẩu không chính xác');
    	return Redirect('/login-checkout');
    }
    public function logout_customer($value='')
    {
    	Session::flush();
    	return Redirect('/login-checkout');
    }
    public function manage_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
    public function view_order($order_id)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->where('tbl_order.order_id', $order_id)->get();
        // echo "<pre>";
        // var_dump($order_by_id);
        // echo "</pre>";
        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);

    }
}
