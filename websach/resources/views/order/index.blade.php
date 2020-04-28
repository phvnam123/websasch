@extends('layout.main2')
@section('content')

<div class="wrapper wrapper-content">
            <div class="row">
            <div class="col-lg-12 namitnoi" id="namitnoi">
                <div class="ibox danhsach">
                    <div class="ibox-content">
                    <form action="{{route('order_delete_all')}}" method="post" accept-charset="utf-8">
                        <button type="submit" class="btn btn-sm btn-danger">xóa all</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checked" name="checked" value=""></th>
                            <th>STT</th>
                            <th>tên khác hàng</th>
                            <th>trạng thái đơn hàng</th>
                            <td>Hình thức thanh toán</td>
                            <th>giá tiền</th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($ord as $k => $or)
                        <tr>
                            <td><input type="checkbox" class="checkall" name="id[]" value="{{$or->id}}"></td>
                            <td>{{$k+1}}</td>
                            <td>{{$or->cus->name}}</td>
                            @if($or->status==1)
                            <td>
                                <p>đang xử lý <a href="{{route('order-pendding',['id'=>$or->id])}}" class="btn btn-info btn-xs" title="">pendding</a> </p>
                            </td>
                            @elseif($or->status==2)
                            <td> <p> đã xử lý  </p></td>
                            @endif
                            <td>{{$or->shipping}}</td>
                            <td>{{number_format($or->total_amount())}} VDN</td>
                            <td>
                                <a href="{{route('order-admin-detail',['id'=>$or->id])}}"  class="btn btn-success btn-xs" title="">Detail</a>
                                
                            </td>
                        </tr>
                            @endforeach()
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
<div class="clearfix">
    {{$ord->links()}}
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