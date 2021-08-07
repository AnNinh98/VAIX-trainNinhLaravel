@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách hóa đơn
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
            <a href="{{URL::to('export-excel')}}" class="btn btn-success">Xuất file Excel</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Giá danh mục</th>
                        <th>Tên dự án</th>
                        <th>Tên công ty</th>
                        <th>Địa chỉ công ty</th>
                        <th>Số điện thoại</th>
                        <th>Số FAX</th>
                        <th>Số Estimaste</th>
                        <th>Ngày tạo hóa đơn</th>
                        <th>Thời hạn thanh toán</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_bill as $key => $bill)
                    <tr>
                        <td>{{$bill->item_name}}</td>
                        <td>{{$bill->amount}}</td>
                        <td>{{$bill->project_name}}</td>
                        <td>{{$bill->company_name}}</td>
                        <td>{{$bill->company_address}}</td>
                        <td>{{$bill->company_tel}}</td>
                        <td>{{$bill->company_fax}}</td>
                        <td>{{$bill->estimate_No}}</td>
                        <td>{{$bill->today}}</td>
                        <td>{{$bill->expire_date}}</td>
                        <td><a href="{{URL::to('/export-invoice/'.$bill->id)}}">Export invoice</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection