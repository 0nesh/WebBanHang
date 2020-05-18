<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class CheckOutController extends Controller
{
    public function login_checkout(){
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	return view('pages.logincheck.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function add_customer(Request $request) {
    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);
    	$data['customer_phone'] = $request->customer_phone;

    	$customer_id = DB::table('tbl_tbl_customer')->insertGetId($data);

    	$request->session()->put('customer_id', $customer_id);
    	$request->session()->put('customer_name', $request->customer_name);

    	return Redirect('/checkout');
    }

    public function checkout() {
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	return view('pages.checkout.checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $idshipping = DB::table('tbl_shipping')->insertGetId($data);
        $request->session()->put('shipping_id', $idshipping);

        return Redirect('/payment');

    }

    public function payment() {
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);

    }

    public function account_customer($customer_id){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $customer_account = DB::table('tbl_tbl_customer')->where('customer_id',$customer_id)->get();
        return view('pages.accountCustomer.account_customer')->with('category',$cate_product)->with('brand',$brand_product)->with('customer_account',$customer_account);
    }

    public function customer_login(Request $request) {
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('tbl_tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else
        {
            return redirect('/login-checkout');
        }
        
    }

    public function logout_checkout() {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function order_place(Request $request) {
        //insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = "Đang chờ xử lý";

        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::getTotal();
        $order_data['order_status'] = "Đang chờ xử lý";
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_detail
        $order_detail_data = array();
        $content = Cart::getContent();
        foreach ($content as $v_content) {
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $v_content->id;
            $order_detail_data['product_name'] = $v_content->name;
            $order_detail_data['product_price'] = $v_content->price;
            $order_detail_data['product_sales_quantity'] = $v_content->quantity;
            DB::table('tbl_order_detail')->insert($order_detail_data);
        }
        if($data['payment_method']==1){
            echo "thanh toán bằng ATM";
        }else
            echo "Tiền Mặt";
        
        //return Redirect('/payment');

    }
}
