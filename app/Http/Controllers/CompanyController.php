<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class CompanyController extends Controller
{
    public function add_company(){
        return view('admin.add_company');
    }
    public function all_company(){

        $all_company= DB::table('company')->get();
        $manager_company=view('admin.all_company')->with('all_company',$all_company);
        return view('admin_layout')->with('admin.all_company',$manager_company);
    }
    public function save_company(Request $request){
        $data=array();
        $data['company_name']=$request->company_name;
        $data['company_address']=$request->company_address;
        $data['company_tel']=$request->company_tel;
        $data['company_fax']=$request->company_fax;
        $data['estimate_No']=$request->estimate_No;

        DB::table('company')->insert($data);
        Session::put('message','Thêm công ty mới thành công!');
        return Redirect::to('add-company');
    }
}
