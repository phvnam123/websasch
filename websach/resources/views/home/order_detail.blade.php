@extends('layout.frontend')
@section('title','home')
@section('content')
 <div class="jumbotron">
     <div class="container">
         <h1>Hàng đã mua</h1>
     </div>
 </div>
 <div class="panel panel-default">
    <div class="panel-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>sản phảm</th>
                <th>ảnh</th>
                <th>giá</th>
                <th>số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $k => $ord)
            <tr>
                <td>{{$k+1}}</td>
                <td>{{$ord->name}}</td>
                <td><img src="{{url('uploads')}}/{{$ord->image}}" alt="" width="100px"></td>
                <td>{{number_format($ord->price)}}VND</td>
                <td>{{$ord->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
        
 </div>
@stop