@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật dự án
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
                    @foreach($edit_project as $key => $edit)
                    <form role="form" action="{{URL::to('/update-project')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên dự án</label>
                            <input type="text" class="form-control" name="project_name" placeholder="Nhập tên công ty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Công ty tham gia</label>
                            <select name="company" id="">
                                @foreach($company as $key => $com)
                                <option value="{{$com->id}}">{{$com->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" name="add_project" class="btn btn-info">Cập nhật dự án</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
</div>
@endsection