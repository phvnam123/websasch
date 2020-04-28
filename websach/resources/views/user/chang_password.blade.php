@extends('admin.layout_login')
@section('main')

<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">- Thay đổi mật khẩu-</h2>       
        <div class="form-group">
            <input type="password" class="form-control" name="old_password" placeholder="password cũ ..." >
        </div>
         @if($errors->has('old_password'))
           <div class="help-block">
               {{ $errors->first('old_password') }}
           </div>
           @endif
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password mỡi ..." >
        </div>
        <div class="form-group">
            <input type="password" name="confirm_password" class="form-control" placeholder="xác nhận password ..." >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Change Pass</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox" name="remember"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>    
        {{ csrf_field() }}   
    </form>
    <!-- <p class="text-center"><a href="route('')">Create an Account</a></p> -->
</div>
@stop()