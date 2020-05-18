<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
	// public function add_cart() {
	// 	return view('');
	// }
    public function save_cart(Request $request) {


    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
    	$product_infor = DB::table('tbl_product')->where('product_id',$productId)->first();
    	        
        $data['id'] = $product_infor->product_id;
        $data['quantity'] = $quantity;
        $data['name'] = $product_infor->product_name;
        $data['price'] = $product_infor->product_price;
        $data['attributes']['image'] = $product_infor->product_image;
        Cart::add($data);
     //    $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

    	// $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();

    	// return view('pages.cart.showcart')->with('category', $cate_product)->with('brand', $brand_product);
        return Redirect::to('Show-Cart');
    	
    }

    public function show_cart() {
    	$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();

    	return view('pages.cart.showcart')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function del_cart($id) {
        Cart::remove($id);
        return Redirect::to('/Show-Cart');
    }

    public function quantity_update(Request $request) {
        $id_cart = $request->productid;
        $quantity = $request->cart_quantity;
        $up = $request->quantity_up;
        $down = $request->quantity_down;
        if($up){
        Cart::update($id_cart, array(
            'quantity' => 1,
        ));
        }
        if($down){
        Cart::update($id_cart, array(
            'quantity' => -1,
        ));
        }
        return Redirect::to('/Show-Cart');
    }
}
