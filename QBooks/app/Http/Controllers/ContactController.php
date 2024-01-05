<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
Use Illuminate\Support\Facades\Redirect;
Use App\Models\Contact;
session_start();

class ContactController extends Controller
{
    public function lien_he(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('id','asc')->get();
        return view('pages.lienhe.contact')->with('category',$cate_product);
    }
    public function add_contact(request $request){

        $data = array();
        $data['contact_name'] = $request->name_contact;
        $data['contact_email'] = $request->email_contact;
        $data['message'] = $request->message_contact;

        DB::table('tbl_contact')->insert($data);
        Session::put('message','Gửi góp ý thành công!');
        return Redirect::to('lien-he');
    }
    public function all_contact(request $request){

        $all_contact = DB::table('tbl_contact')->get();
        $manager_contact = view('admin.all_contact')->with('all_contact',$all_contact);
        return view('admin_layout')->with('admin.all_contact',$manager_contact);
    }
}
