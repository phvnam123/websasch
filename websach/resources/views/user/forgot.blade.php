@extends('admin.layout_login')
@section('main')

<div class="login-form">
    <form action="" method="get">
        <h2 class="text-center">- Reset password-</h2>       
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="nhập email ..." >
        </div>
         @if($errors->has('email'))
           <div class="help-block">
               {{ $errors->first('email') }}
           </div>
           @endif
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Change Pass</button>
        </div>    
        {{ csrf_field() }}   
    </form>
    <!-- <p class="text-center"><a href="route('')">Create an Account</a></p> -->
</div>
@stop()