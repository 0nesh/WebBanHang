<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }
        else{
            return redirect('admin')->send();
        }
    }
    public function add_category() {
        $this->AuthLogin();
    	return view('admin.add_category_product');
    }

    public function all_category() {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category = view('admin.all_category_product')->with('all_category_product', $all_category_product);
    	return view('admin_layout')->with('admin.all_category_product',$manager_category);
    }

    public function save_category(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect::to('Add-Category');
    }

    public function edit_category($category_product_id) {
        $this->AuthLogin();
    	$edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category);
    }
    public function update_category(Request $request, $category_product_id) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('All-Category');
    }

    public function del_category($category_product_id) {
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('All-Category');
    }
    //End function admin page

    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $category_by_id = DB::table('tbl_product')->
        join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        return view('category.showCategory')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }

    
}
