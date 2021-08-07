@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mới danh mục dự án
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
                    <form role="form" action="{{URL::to('/save-item')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="item_name" placeholder="Nhập tên công ty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá thành danh mục</label>
                            <input type="text" class="form-control" name="amount" placeholder="Nhập tên công ty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Dự án</label>
                            <select name="project" id="">
                                @foreach($project as $key => $pro)
                                <option value="{{$pro->id}}">{{$pro->project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" name="add_project" class="btn btn-info">Thêm mới</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection