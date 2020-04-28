@extends('layout.main2')
@section('content')
@if($errors->has('name'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ $errors->first('name') }}
    </div>
@endif

    <form action="" method="POST" role="form">
    
        <div class="form-group @if($errors->has('MADH')) has-error @endif">
            <label class="sr-only" for="">Mã đơn hàng</label>
            <input type="text" name="MADH" class="form-control"  id="" placeholder=" Nhập mã đơn hàng">
             @if($errors->has('MADH'))
           <div class="help-block">
               {{ $errors->first('MADH') }}
           </div>
           @endif
        </div>
        <div class="form-group @if($errors->has('order_date')) has-error @endif">
            <label class="sr-only" for="">Ngày giao hàng</label>
            <input type="date" name="order_date" class="form-control"  id="" placeholder=" Nhập tên danh mục">
             @if($errors->has('order_date'))
           <div class="help-block">
               {{ $errors->first('order_date') }}
           </div>
           @endif
        </div>
        <div class="form-group @if($errors->has('delivery_date')) has-error @endif">
            <label class="sr-only" for="">Ngày nhập hàng</label>
            <input type="Date" name="delivery_date" class="form-control"  id="" placeholder=" Nhập tên danh mục">
             @if($errors->has('delivery_date'))
           <div class="help-block">
               {{ $errors->first('delivery_date') }}
           </div>
           @endif
        </div>
        <div class="form-group @if($errors->has('total_money')) has-error @endif">
            <label class="sr-only" for="">Tổng tiền</label>
            <input type="text" name="total_money" class="form-control"  id="" placeholder=" Nhập giá tiền">
             @if($errors->has('total_money'))
           <div class="help-block">
               {{ $errors->first('total_money') }}
           </div>
           @endif
        </div>
        <div class="form-group @if($errors->has('notes')) has-error @endif">
            <label class="sr-only" for="">Ghi chú</label>
            <input type="text" name="notes" class="form-control"  id="" placeholder=" Lưu ghi chú">
             @if($errors->has('notes'))
           <div class="help-block">
               {{ $errors->first('notes') }}
           </div>
           @endif
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        @csrf
    </form>
@stop()