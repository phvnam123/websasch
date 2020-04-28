@extends('layout.frontend')
@section('title','home')
@section('content')
    <div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            

            
            <div class="form-group @if($errors->has('old_password')) has-error @endif">
                <label for="">password cũ</label>
                <input type="password"
                name="old_password" class="form-control" id="" placeholder="Input field">
                @if($errors->has('old_password'))
                <div class="help-block">
                    {{ $errors->first('old_password') }}
                </div>
                @endif
            </div>
            <div class="form-group @if($errors->has('password')) has-error @endif">
                <label for="">Password mới</label>
                <input type="password"
                name="password" class="form-control" id="" placeholder="Input field">
                @if($errors->has('password'))
                <div class="help-block">
                    {{ $errors->first('password') }}
                </div>
                @endif
            </div>
            <div class="form-group @if($errors->has('confirm_password')) has-error @endif">
                <label for="">confirm password</label>
                <input type="password"
                name="confirm_password" class="form-control" id="" placeholder="Input field">
                @if($errors->has('confirm_password'))
                <div class="help-block">
                    {{ $errors->first('confirm_password') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" value="1">
                        Remember
                    </label>
                </div>
            </div>
            @csrf
            

            <button type="submit" class="btn btn-primary">change pass</button>
        </form>
    </div>
</div>
@stop