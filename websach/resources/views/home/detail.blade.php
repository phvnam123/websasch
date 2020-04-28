@extends('layout.frontend')
@section('title','home')
@section('content')
<div class="panel panel-info
">
    <div class="panel-heading">
        <h3 class="panel-title">Thông tin sản phẩm {{$pro->name}}</h3>
    </div>
    <div class="panel-body">
        <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="product-imitation">
                                        <img class="thumbnai" src="{{ url('uploads') }}/{{ $pro->image }}" width="100%" height="450" alt="">
                                    </div>

                                </div>
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">
                                        {{ $pro->name }}
                                    </h2>
                                    <small></small>
                                    <div class="m-t-md">
                                        <h2 class="product-main-price">{{ number_format($pro->price) }} <small class="text-muted">VNĐ</small> </h2>
                                    </div>
                                    <hr>

                                    

                                    <div class="small text-muted">
                                        <p>{{$pro->title}}</p>
                                    </div>
                                    <dl class="small m-t-md">
                                       <h4>{{$pro->about}}</h4>
                                    <hr>

                                    <div>
                                        <div class="btn-group">
                                            <a class="add-cart" href="{{ route('add-cart',['id'=>$pro->id]) }}"> <button class="btn btn-primary btn-sm "><i class="fa fa-cart-plus"></i> Add to cart</button></a>
                                            
                                        </div>
                                    </div>

                                    </dl>
                                </div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="ibox-footer">
                            <span class="float-right">
                                Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                            </span>
                            The generated Lorem Ipsum is therefore always free
                        </div>
                    </div>

        </div>
            @if(Auth::guard('cus')->check())
    <div class="well">
        <h4>Viết bình luận ... <span class="glyphicon glyphicon-pencil"></span></h4>
        <form action="comment/{{$pro->id}}/{{$pro->slug}}" method="POST" role="form">
            <div class="form-group">
                <textarea name="comment" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" onclick="return confirm('Bạn có chắc muốn hiển thị bình luận với tên của bạn')" class="btn btn-primary">Gửi</button>
            @csrf
        </form>
    </div>
    @endif

@foreach($pro->comment as $comt)
    <div>
        <p><b>{{ $comt->customer->name }}:</b></p>
        <p class="label label-success">{{ $comt->comment }}</p>
    </div>
      
@endforeach
    </div>

</div>


@stop