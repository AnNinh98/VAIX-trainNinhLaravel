@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm hóa đơn 
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
                    <form role="form" action="{{URL::to('/save-bill')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên danh mục</label>
                            <select name="item_name" id="">
                                @foreach($item as $key => $items)
                                <option value="{{$items->id}}">{{$items->item_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày tạo hóa đơn</label>
                            <input class="form-control" id="id1" type="date" name="today" onchange="onChange();"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hạn thanh toán</label>
                            <input class="form-control" id="id2" name="expire_date" />
                        </div>
                        
                        <button type="submit" name="add_bill" class="btn btn-info">Thêm mới</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
<script>
    const formatDate=(date)=>{
        var d= new Date(date),
        month=''+(d.getMonth()+1),
        day=d.getDate(),
        year=d.getFullYear();
        if(month.length<2)
            month='0'+month;
        if(day.length<2)
            day='0'+day;
        return [year,month,day].join('-');
    }
    const onChange=()=>{
        const create_date=new Date(document.getElementById("id1").value);
        const year=create_date.getFullYear();
        const month=create_date.getMonth() + 1;
        const expire_date=new Date(year,month+1,0);
        document.getElementById("id2").value=formatDate(expire_date)
    }
</script>