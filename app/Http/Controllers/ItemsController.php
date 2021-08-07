<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function add_item(){
        $project=DB::table('project')->orderby('id','desc')->get();
        return view('admin.add_item')->with('project',$project);
    }
    public function all_item(){
        $all_item=DB::table('items')
        ->join('project','project.id','=','items.project_id')->orderby('items.id','desc')->get();
        $manager_item=view('admin.all_item')->with('all_item',$all_item);
        return view('admin_layout')->with('admin.all_item',$manager_item);
    }
    public function save_item(Request $request){
        $data= array();
        $data['item_name']=$request->item_name;
        $data['amount']=$request->amount;
        $data['project_id']=$request->project;
        DB::table('items')->insert($data);
        Session::put('message','Thêm danh mục dự án mới thành công!');
        return Redirect::to('add-item');
    }
}
