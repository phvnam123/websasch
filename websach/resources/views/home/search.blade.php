@extends('layout.frontend')
@section('title','search')
@section('content')
    <style type="text/css">
    img.thumbnai {
    object-fit: cover;
}
</style>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Sản phẩm được tìm kiếm </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            @foreach($product as $pro)
            @if($pro->status == 1 && $pro->quantity_now >0)
            <div class="col-md-4">
                <div class="ibox">
                    <div class="ibox-content product-box">

                        <div class="product-imitation">
                            <img class="thumbnai" src="{{ url('uploads') }}/{{ $pro->image }}" width="100%" height="350" alt="">
                        </div>
                        <div class="product-desc">
                            @if(isset($pro->sale_price))
                            <span class="product-price">
                                {{number_format($pro->sale_price)}}đ
                            </span>
                            @else()
                            <span class="product-price">
                                {{number_format($pro->price)}}đ
                            </span>
                            @endif()
                            <small class="text-muted">{{ $pro->cat->name }}</small>
                            <a href="#" class="product-name">{{$pro->name}}</a>



                            <div class="small m-t-xs">
                                {{ $pro->about }}
                            </div>

                            <p class="text-center">
                                <a href="{{route('productV',['slug'=>$pro->slug])}}" class="btn btn-info" title="">xem</a>
                                <a href="{{route('add-cart',['id'=>$pro->id])}}" class="btn btn-success" title="">add cart</a>
                            </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        
        
    </div>
    <div class="clearfix">
        {{ $product->links() }}
    </div>
</div>


@stop