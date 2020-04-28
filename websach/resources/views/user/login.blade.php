@extends('admin.layout_login')
@section('main')

<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">- Đăng nhập vào trang quản trị hệ thống-</h2>       
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email ..." >
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox" name="remember"> Remember me</label>
            <a href="" class="pull-right">Forgot Password?</a>
        </div>     
        {{ csrf_field() }}   
    </form>
    <!-- <p class="text-center"><a href="route('')">Create an Account</a></p> -->
</div>
@stop()