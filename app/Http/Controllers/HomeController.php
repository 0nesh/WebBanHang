<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{

    public function index() {
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	$all_product = DB::table('tbl_product')->orderby('product_id','desc')->limit(4)->get();
    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function search(Request $request) {
    	$keywords = $request->search_product;

    	$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	$search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

    	return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }
}
