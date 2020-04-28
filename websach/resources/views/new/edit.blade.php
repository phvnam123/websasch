
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
                                
                                <div class="form-group row @if($errors->has('title')) has-error @endif"><label class="col-sm-2 col-form-label ">Title</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="title" value="{{$new->title}}"></div>
                                    @if($errors->has('title'))
                                                <div class="help-block">
                                                    {{$errors->first('title')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('Img_upload')) has-error @endif">
                                    <label class="col-sm-3 control-label">Ảnh </label>
                
                                        <input type="file" name="Img_upload" placeholder="Images"  >
                                        @if($errors->has('Img_upload'))
                                        <div class="help-block">
                                            {{ $errors->first('Img_upload') }}
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group row @if($errors->has('description')) has-error @endif"><label class="col-sm-2 col-form-label ">Mô tả</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="description" value="{{$new->description}}"></div>
                                    @if($errors->has('description'))
                                                <div class="help-block">
                                                    {{$errors->first('description')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="form-group row @if($errors->has('slug')) has-error @endif"><label class="col-sm-2 col-form-label ">Slug</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="slug" value="{{$new->slug}}"></div>
                                    @if($errors->has('slug'))
                                                <div class="help-block">
                                                    {{$errors->first('slug')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="form-group row @if($errors->has('full')) has-error @endif"><label class="col-sm-2 col-form-label ">Bài viết</label>

                                    <div class="col-sm-10"><textarea   name="full" class="summernote">{{$new->full}}</textarea></div>
                                    @if($errors->has('full'))
                                                <div class="help-block">
                                                    {{$errors->first('full')}}
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