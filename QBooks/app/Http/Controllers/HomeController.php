<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
Use Illuminate\Support\Facades\Redirect;
Use App\Models\Product;
session_start();

class HomeController extends Controller
{
    public function index(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('id','asc')->get();
        
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.id','=','tbl_product.category_id')
        // ->orderBy('tbl_product.id','desc')
        // ->get();

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('id','asc')->limit(5)->get();

        $van_hoc = DB::table('tbl_product')->where('category_id','1')->where('product_status','0')->orderby('id','asc')->limit(5)->get();

        $kinh_te = DB::table('tbl_product')->where('category_id','4')->where('product_status','0')->orderby('id','asc')->limit(5)->get();

        $tu_dien = DB::table('tbl_product')->where('category_id','5')->where('product_status','0')->orderby('id','asc')->limit(5)->get();

        return view('pages.home')->with('category',$cate_product)->with('all_product',$all_product)->with('van_hoc',$van_hoc)->with('kinh_te',$kinh_te)->with('tu_dien',$tu_dien);
    }
    public function search(request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('id','asc')->get();
        $keywords = $request->keywords_submit;

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->where('product_status', '0')->get();
        
        return view('pages.sanpham.search')->with('category',$cate_product)->with('search_product',$search_product);
    }
    public function autocomplete_ajax(request $request){
        $data = $request->all();

        if($data['query']){
            $product = Product::where('product_status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:absolute; width: 100%; background-color: rgba(0, 0, 0, 0.6);">';
            foreach($product as $key => $val){
                $output .= '
                <div style="white-space: nowrap; margin: 5px;">
                <li class="col-sm-2" style="display: inline-block;">
                <img src="public/uploads/product/'.$val->product_image.'" class="media-object" style="width:50px">
                </li>
                <li class="col-sm-10" style="display: flex; display: inline-block; align-items: center">
                <a href="#" style="text-decoration: none;
                color: white;
                margin: 10px 10px;">'.$val->product_name.'</a></li></div>
                ';
            }
                $output .= '</ul>';
                echo $output;
        }
    }
}
