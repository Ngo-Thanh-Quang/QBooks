<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
Use Illuminate\Support\Facades\Redirect;
Use App\Models\Comment;
Use App\Models\Rating;
session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.id','=','tbl_product.category_id')
        ->orderBy('tbl_product.id','desc')
        ->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return redirect::to('all-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_image',$product_id)->update(['product_status'=>1]);
        Session::put('message','Ẩn sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_image',$product_id)->update(['product_status'=>0]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_image',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return redirect::to('all-product');
        }
    
        DB::table('tbl_product')->where('id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_image',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công!');
        return redirect::to('all-product');
    }
    //End Admin Page
    public function details_product(Request $request,$product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('id','asc')->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.id','=','tbl_product.category_id')
        ->where('tbl_product.product_image',$product_id)
        ->get();


        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
        }

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.id','=','tbl_product.category_id')
        ->where('tbl_category_product.id',$category_id)
        ->whereNotIn('tbl_product.product_image',[$product_id])
        ->get();

        $comment_by_id = DB::table('tbl_comment')
        ->join('tbl_customers','tbl_comment.customer_id','=','tbl_customers.customer_id')
        ->where('tbl_comment.comment_product_id', $product_id)
        ->select('tbl_comment.*','tbl_customers.*')
        ->get();

        $star = DB::table('tbl_comment')
        ->where('tbl_comment.comment_product_id', $product_id)
        ->avg('star');
        $star = round($star);

        return view('pages.sanpham.show_details')->with('category',$cate_product)
        ->with('product_details',$details_product)->with('relate',$related_product)
        ->with('comment_by_id',$comment_by_id)->with('star',$star);
    }
    public function up_comment(Request $request,$product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('id','asc')->get();

        $comment_by_id = DB::table('tbl_comment')
        ->join('tbl_customers','tbl_comment.customer_id','=','tbl_customers.customer_id')
        ->where('tbl_comment.comment_product_id', $product_id)
        ->get();

         
        
        
        $existing = Comment::where('customer_id', $request->customerId)
        ->where('comment_product_id', $product_id)
        ->first();

        if ($existing) {
            return redirect::to('chi-tiet-san-pham/'.$product_id);
        } else {
            $data = array();
            $data['customer_id'] = $request->customerId;
            $data['comment'] = $request->comment;
            $data['comment_product_id'] = $product_id;
            if($request->stars_value == NULL){
                $data['star'] = 5;
            }else{
                $data['star'] = $request->stars_value;
            }
            
    
            DB::table('tbl_comment')->insert($data);
            return redirect::to('chi-tiet-san-pham/'.$product_id);
        }


    }

}
