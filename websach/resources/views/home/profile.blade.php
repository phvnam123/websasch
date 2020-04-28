@extends('layout.frontend')
@section('title','profile')
@section('content')
    <div class="panel panel-info">
    
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <legend>Thông tin cá nhân</legend>
        
            <div class="form-group @if($errors->has('name')) has-error @endif">
                <label for="">Name</label>
                <input type="text"
                name="name" value="{{ Auth::guard('cus')->user()->name }}" class="form-control" id="" placeholder="Input field">
                @if($errors->has('name'))
                    <div class="help-block">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group @if($errors->has('email')) has-error @endif">
                <label for="">Email</label>
                <input type="text"
                name="email" value="{{ Auth::guard('cus')->user()->email }}" class="form-control" id="" placeholder="Input field">
                @if($errors->has('email'))
                    <div class="help-block">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <div class="form-group @if($errors->has('phone')) has-error @endif">
                <label for="">Phone</label>
                <input type="text"
                name="phone" value="{{ Auth::guard('cus')->user()->phone }}" class="form-control" id="" placeholder="Input field">
                @if($errors->has('phone'))
                    <div class="help-block">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>
            <div class="form-group @if($errors->has('address')) has-error @endif">
                <label for="">Address</label>
                <input type="text"
                name="address" value="{{ Auth::guard('cus')->user()->address }}" class="form-control" id="" placeholder="Input field">
                @if($errors->has('address'))
                    <div class="help-block">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>
            <div class="form-group @if($errors->has('about')) has-error @endif">
                <label for="">Nói về bạn</label>
                <input type="text"
                name="about" value="{{ Auth::guard('cus')->user()->about }}" class="form-control" id="" placeholder="Input field">
                @if($errors->has('about'))
                    <div class="help-block">
                        {{ $errors->first('about') }}
                    </div>
                @endif
            </div>
        
        @csrf
            
        
            <button type="submit" class="btn btn-primary">Sửa</button>
            <a href="{{route('home')}}" class="btn btn-success" title="">cancel</a>
        </form>
    </div>
</div>
@stop