@extends('layout.frontend')
@section('title','home')
@section('content')
    <div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"> giỏ hàng</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Ảnh</th>
                    <th>Gía</th>
                    <th>quantity </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $k=>$item)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['name']}}</td>
                    <td>
                        <img src="{{url('uploads')}}/{{$item['image']}}" width="100px" alt="">
                    </td>
                    <td>{{$item['price']}}</td>
                    <td>
                        <form action="{{route('update-cart',['id'=>$item['id']])}}" method="get">
                            <input type="number" name="quty" value="{{$item['quantity']}}" size="5">
                            <input type="submit" name="" value="update">
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{route('remove-cart',['id'=>$item['id']])}}" class="btn btn-danger" title="">xóa</a>
                        <!-- <a href="{{route('update-cart',['id'=>$item['id']])}}" class="btn btn-primary" title="">sửa</a> -->
                    </td>
                </tr>
                @endforeach()
            </tbody>
        </table>
        <div class="jumbotron">
            <div class="container">
                <h3>Tổng tiền: {{number_format($cart->total_amount)}}đ</h3>
                <p>
                    <a href="{{route('clear-cart')}}" class="btn btn-danger">clear</a>
                    <a href="{{route('order')}}" class="btn btn-success">Order</a>
                </p>
            </div>
        </div>
    </div>
    <div>
       
        <h1>Có thể bạn sẽ thích</h1>
        <div class="jumbotron">
                <div class="container">
                    
                    <img src="{{url('uploads')}}/{{$pro->image}}" width="250">
                    <p>
                        @if(isset($pro->sale_price))
                            <span class="">
                                {{number_format($pro->sale_price)}}đ
                            </span>
                            @else()
                            <span class="">
                                {{number_format($pro->price)}}đ
                            </span>
                            @endif()
                    </p>
                    <small class="text-muted">{{ $pro->cat->name }}</small>
                    <a href="#" class="product-name">{{$pro->name}}</a>
                    <p class="text-left">
                        <a href="{{route('productV',['slug'=>$pro->slug])}}" class="btn btn-info btn-sm" title="">xem</a>
                        <a href="{{route('add-cart',['id'=>$pro->id])}}" class="btn btn-success btn-sm" title="">add cart</a>
                    </p>
                    

                </div>
                
            </div>
           
    </div>
</div>
@stop