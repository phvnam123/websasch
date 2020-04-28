@extends('layout.main2')
@section('content')

<div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 namitnoi" id="namitnoi">
                <a href="{{route('pruchases_create')}}" class="btn btn-sm btn-success"> <i class="fa fa-add"> thêm đơn hàng nhập</i></a>
                <div class="ibox danhsach">
                    <div class="ibox-content">
                        
                    <form action="" method="post" accept-charset="utf-8">
                        <button type="submit" class="btn btn-sm btn-danger">xóa all</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checked" name="checked" value=""></th>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>tổng tiền</th>
                            <th>ghi chú</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pruchases as $k => $pruchases)
                        <tr>
                            <td><input type="checkbox" class="checkall" name="id[]" value="{{$pruchases->id}}"></td>
                            <td>{{$k+1}}</td>
                            <td>{{$pruchases->MADH}}</td>
                            <td>{{$pruchases->total_money}}</td>
                            <td>{{$pruchases->notes}}</td>
                            <td>
                                            <a href="{{route('pruchases_edit',['id'=>$pruchases->id])}}" class="btn btn-xs btn-success"> <i class="fa fa-edit"> sửa</i></a>
                                            <a href="{{route('pruchases_delete',['id'=>$pruchases->id])}}" class="btn btn-xs btn-danger remove-item"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                            @endforeach()
                        </tr>
 
    					</tbody>
                        </table>
                    </div>
                    @csrf()
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
    <script>
        $(document).ready(function($){
            $('#checked').click(function(e){
                // e.preventDefault();
                var x = $('#checked').prop('checked');
                if(x){
                    $('.checkall').prop({
                        checked: true
                    })
                }else{
                    $('.checkall').prop({
                        checked: false
                    })
                }
            });
        })


    </script>
@stop()