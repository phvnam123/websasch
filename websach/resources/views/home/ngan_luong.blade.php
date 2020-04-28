@extends('layout.frontend')
@section('title','thanht toán ngân lượng')
@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1>Thanh toán ngân lượng</h1>
        <p>Contents ...</p>
        <p>
         <!--  <a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=phamvannamnd1998@gmail.com&product_name={{$order_id}}&price={{$price}}&return_url={{ route('order-success') }}&comments=chi la test vui long ko lien he"><img src="https://sandbox.nganluong.vn:8088/nl35/css/newhome/img/button/safe-pay-3.png"border="0" /></a> -->
         <p>
          <a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=phamvannamnd1998@gmail.com&product_name={{ $order_id }}&price={{ $price }}&return_url={{ route('order-success') }}&comments=chi la test vui long ko lien he"><img src="https://sandbox.nganluong.vn:8088/nl35/css/newhome/img/button/safe-pay-3.png"border="0" /></a>
        </p>
        </p>
      </div>
    </div>
@stop