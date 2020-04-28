@extends('layout.frontend')
@section('title','orders_history')
@section('content')
 <div class="jumbotron">
     <div class="container">
         <h1>order history</h1>
     </div>
 </div>
 <div class="panel panel-default">
    <div class="panel-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Created at</th>
                <th>status</th>
                <th>Total amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $k => $ord)
            <tr>
                <td>{{$k+1}}</td>
                <td>{{$ord->created_at}}</td>
                <td>
                    @if($ord->status==0)
                    <span>đang xử lý...</span>
                    @else
                    <span>đã xử lý...</span>
                    @endif
                </td>
                <td>{{$ord->total_amount()}}</td>
                <td>
                    <a href="{{route('order-detail',['id'=>$ord->id])}}" class="btn btn-success" title="">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
        
 </div>
@stop