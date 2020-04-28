@extends('layout.frontend')
@section('title','home')
@section('content')
    <div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            

            
            <div class="form-group @if($errors->has('email')) has-error @endif">
                <label for="">Email</label>
                <input type="text"
                name="email" class="form-control" id="" placeholder="Input field">
                @if($errors->has('email'))
                <div class="help-block">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>
            <div class="form-group @if($errors->has('password')) has-error @endif">
                <label for="">Password</label>
                <input type="password"
                name="password" class="form-control" id="" placeholder="Input field">
                @if($errors->has('password'))
                <div class="help-block">
                    {{ $errors->first('password') }}
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
            

            <button type="submit" class="btn btn-primary">Login now</button>
        </form>
    </div>
</div>
@stop