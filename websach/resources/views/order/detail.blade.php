@extends('layout.main2')
@section('content')

<div class="wrapper wrapper-content">
            <div class="row">
            <div class="col-lg-12 namitnoi" id="namitnoi">
                <div class="ibox danhsach">
                    <div class="ibox-content">
                    <form action="" method="post" accept-charset="utf-8">
               
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>tên sản phẩm</th>
                            <th>ảnh sản phẩm </th>
                            <th>giá tiền</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($deta as $k => $ord)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$ord->name}}</td>
                            <td><img src="{{url('uploads')}}/{{$ord->image}}" alt="" width="100px"></td>
                            <td>{{number_format($ord->price)}}VND</td>    
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