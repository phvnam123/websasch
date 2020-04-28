@extends('layout.main2')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <a href="{{route('category')}}" class="btn btn-sm   btn-success"> <i class="fa fa-add"> quay lại</i></a>
                        <div class="ibox-title">
                            <h5>Thêm image</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" enctype="multipart/form-data">
                                
                                <div class="form-group row @if($errors->has('name')) has-error @endif"><label class="col-sm-2 col-form-label ">Tên sản phẩm</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="name"></div>
                                    @if($errors->has('name'))
                                                <div class="help-block">
                                                    {{$errors->first('name')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-3 control-label">Ảnh </label>
                
                                        <input type="file" name="Img_upload" placeholder="Images"  >
                                        @if($errors->has('Img_upload'))
                                        <div class="help-block">
                                            {{ $errors->first('Img_upload') }}
                                        </div>
                                        @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('status')) has-error @endif">
                                    <label class="col-sm-2 col-form-label ">status</label>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status"  value="1">
                                            Hiển thị
                                        </label>
                                        <label>
                                            <input type="radio" name="status"  value="0" >
                                            Ẩn
                                        </label>
                                    </div>
                                        @if($errors->has('status'))
                                        <div class="help-block">
                                            {{ $errors->first('status') }}
                                        </div>
                                        @endif
                                </div>
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