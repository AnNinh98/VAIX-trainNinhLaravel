@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mới công ty
            </header>
            <div class="panel-body">
                <?php
                    $message=Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-company')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên công ty</label>
                            <input type="text" class="form-control" name="company_name" placeholder="Nhập tên công ty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ công ty</label>
                            <input type="text" class="form-control" name="company_address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" class="form-control" name="company_tel">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số Fax</label>
                            <input type="text" class="form-control" name="company_fax">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Estimate ID</label>
                            <input type="text" class="form-control" name="estimate_No">
                        </div>
                        <button type="submit" name="add_company" class="btn btn-info">Thêm mới</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection