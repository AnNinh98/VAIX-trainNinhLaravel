<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Bill;
use App\Models\Item;
use App\Models\Project;
use App\Models\Company;
use DB;
use Session;

class BillController extends Controller
{
    public function add_bill(){
        $item=DB::table('items')->orderby('id','desc')->get();
        return view('admin.add_bill')->with('item',$item);
    }
    public function all_bill(){
        $all_bill=DB::table('bills')
        ->join('items','items.id','=','bills.item_id')
        ->join('project','project.id','=','items.project_id')
        ->join('company','company.id','=','project.company_id')
        ->orderby('bills.id','desc')->get();
        $manager_bill=view('admin.all_bill')->with('all_bill',$all_bill);
        return view('admin_layout')->with('admin.all_bill',$manager_bill);
    }
    public function save_bill(Request $request){
        $data= array();
        $data['item_id']=$request->item_name;
        $data['today']=$request->today;
        $data['expire_date']=$request->expire_date;
        DB::table('bills')->insert($data);
        Session::put('message','Thêm dự án mới thành công!');
        return Redirect::to('add-bill');
    }
    
    public function export_invoice($bill_id){
        if(Bill::where('id',$bill_id)->exists()){
            $bill=Bill::find($bill_id);
            return view('admin.invoice', compact('bill'));
        }
        else{
            return redirect()->back()->with('status', 'Không tìm thấy hóa đơn');
        }
    }
}
