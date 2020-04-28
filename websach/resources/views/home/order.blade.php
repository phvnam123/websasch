@extends('layout.frontend')
@section('title','ordershopping')
@section('content')
 <div class="jumbotron">
     <div class="container">
         <h1>shopping cart</h1>
         <p>
             <strong>Tổng Tiền :  </strong> {{number_format($cart->total_amount)}}
         </p>
     </div>
 </div>
 <div class="panel panel-default">
     <div class="panel-body">
         @if(Auth::guard('cus')->check())
         @if($cart->total_quantity > 0)
            <form action="" method="POST" class="" role="form">
            
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label  for="">Full name</label>
                    <input type="text" name="name" value="{{ Auth::guard('cus')->user()->name }}" class="form-control" id="" placeholder="Input field">
                    @if($errors->has('name'))
                    <div class="help-block">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>

                <div class="form-group @if($errors->has('email')) has-error @endif">
                    <label  for="">Email</label>
                    <input type="email" name="email" value="{{ Auth::guard('cus')->user()->email }}" class="form-control" id="" placeholder="Input field">
                    @if($errors->has('email'))
                    <div class="help-block">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>


                <div class="form-group @if($errors->has('address')) has-error @endif">
                    <label  for="">Địa chỉ giao hàng</label>
                    <input type="text" name="address">
                    @if($errors->has('address'))
                    <div class="help-block">
                        {{ $errors->first('address') }}
                    </div>
                    @endif
                </div>
                
                <div class="form-group @if($errors->has('about')) has-error @endif">
                    <label  for="">Ghi chú</label>
                    <textarea name="about"></textarea>
                    @if($errors->has('about'))
                    <div class="help-block">
                        {{ $errors->first('about') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label  for="">Phương thức thanh toán</label>
                    <select name="shipping" id="input" class="form-control" required="required">
                        <option value="thanh toán khi nhận hàng">thanh toán khi nhận hàng</option>
                        <option value="ngan-luong">thanh toán Ngân lượng</option>
                       
                    </select>
                </div>
                @csrf            
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
            @else
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Lỗi!</strong> Bạn phải đặt hàng trước
                </div>
            @endif
         @else
         <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <strong>Error!</strong> Đăng nhập trước khi mua hàng..
         </div>
         @endif
     </div>
 </div>
@stop