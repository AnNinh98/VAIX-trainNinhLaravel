<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
class ProjectController extends Controller
{
    public function add_project(){
        $company=DB::table('company')->orderby('id','desc')->get();
        return view('admin.add_project')->with('company',$company);
    }
    public function all_project(){
        $all_project=DB::table('project')
        ->join('company','company.id','=','project.company_id')->orderby('project.id','desc')->get();
        $manager_project=view('admin.all_project')->with('all_project',$all_project);
        return view('admin_layout')->with('admin.all_project',$manager_project);
    }
    public function save_project(Request $request){
        $data= array();
        $data['project_name']=$request->project_name;
        $data['company_id']=$request->company;
        DB::table('project')->insert($data);
        Session::put('message','Thêm dự án mới thành công!');
        return Redirect::to('add-project');
    }
    public function update_project($project_id){
        $company=DB::table('company')->orderby('id','desc')->get();
        $edit_project=DB::table('project')->where('id',$project_id)->get();
        $manager_project=view('admin.update_project')->with('edit_project',$edit_project)->with('company',$company);
        return view('admin_layout')->with('admin.update_project',$manager_project);
    }
}
