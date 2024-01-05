<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
Use Illuminate\Support\Facades\Redirect;

session_start();


class CartController extends Controller
{
    public function save_cart(request $request){
        
        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_image',$productId)->first();
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('id','asc')->get();

        
        $data['id'] = $product_info->product_image; 
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        \Gloudemans\Shoppingcart\Facades\Cart::add($data);
        return Redirect::to('/show-cart');
        
    }
    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('id','asc')->get();

        return view('pages.cart.show_cart')->with('category',$cate_product);
    }
    public function delete_to_cart($rowId){
        \Gloudemans\Shoppingcart\Facades\Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        \Gloudemans\Shoppingcart\Facades\Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
