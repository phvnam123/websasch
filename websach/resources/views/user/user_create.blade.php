@extends('layout.main2')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <a href="{{route('user')}}" class="btn btn-sm   btn-success"> <i class="fa fa-add"> quay lại</i></a>
                        <div class="ibox-title">
                            <h5>Thêm User</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post">
                                <!-- <div class="form-group @if($errors->has('name')) has-error @endif">
                                      <label>name</label>
                                          <input type="text" class="form-control" name="name" id="name">
                                            @if($errors->has('name'))
                                                <div class="help-block">
                                                    {{$errors->first('name')}}
                                                </div>
                                            @endif
                                </div> -->
                                <div class="form-group row @if($errors->has('name')) has-error @endif"><label class="col-sm-2 col-form-label ">Tên User</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="name"></div>
                                    @if($errors->has('name'))
                                                <div class="help-block">
                                                    {{$errors->first('name')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('email')) has-error @endif"><label class="col-sm-2 col-form-label ">email</label>

                                    <div class="col-sm-10"><input type="email" class="form-control" name="email"></div>
                                    @if($errors->has('email'))
                                                <div class="help-block">
                                                    {{$errors->first('email')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('phone')) has-error @endif"><label class="col-sm-2 col-form-label ">phone</label>

                                    <div class="col-sm-10"><input type="number" class="form-control" name="phone"></div>
                                    @if($errors->has('phone'))
                                                <div class="help-block">
                                                    {{$errors->first('phone')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('about')) has-error @endif"><label class="col-sm-2 col-form-label ">about</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="about"></div>
                                    @if($errors->has('about'))
                                                <div class="help-block">
                                                    {{$errors->first('about')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('address')) has-error @endif"><label class="col-sm-2 col-form-label ">address</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="address"></div>
                                    @if($errors->has('address'))
                                                <div class="help-block">
                                                    {{$errors->first('address')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('password')) has-error @endif"><label class="col-sm-2 col-form-label ">password</label>

                                    <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                                    @if($errors->has('password'))
                                                <div class="help-block">
                                                    {{$errors->first('password')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('comfirm_password')) has-error @endif"><label class="col-sm-2 col-form-label ">comfirm_password</label>

                                    <div class="col-sm-10"><input type="password" class="form-control" name="comfirm_password"></div>
                                    @if($errors->has('comfirm_password'))
                                                <div class="help-block">
                                                    {{$errors->first('comfirm_password')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>


@stop()