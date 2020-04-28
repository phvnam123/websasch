@extends('layout.main2')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <a href="{{route('product')}}" class="btn btn-sm   btn-success"> <i class="fa fa-add"> quay lại</i></a>
                        <div class="ibox-title">
                            <h5>Thêm danh mục</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" role="form" enctype="multipart/form-data">
                                <div class="form-group row @if($errors->has('name')) has-error @endif"><label class="col-sm-2 col-form-label ">Tên sản phẩm</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{$pro->name}}"></div>
                                    @if($errors->has('name'))
                                                <div class="help-block">
                                                    {{$errors->first('name')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                                    <div class="col-sm-10">
                                    <select name="category_id" id="input" class="form-control">
                                        <option value="{{$pro->category_id}}">{{$pro->cat->name}}</option>
                                        @foreach($cat as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    @if($errors->has('category_id'))
                                    <div class="help-block">
                                        {{ $errors->first('category_id') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label">Nhà sản xuất</label>
                                    <div class="col-sm-10">
                                    <select name="publishers_id" id="input" class="form-control">
                                        <option value="{{$pro->publishers_id}}">{{$pro->publishers->name}}</option>
                                        @foreach($pub as $pub)
                                        <option value="{{$pub->id}}">{{$pub->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    @if($errors->has('publishers_id'))
                                    <div class="help-block">
                                        {{ $errors->first('publishers_id') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label ">Slug</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="slug" value="{{$pro->slug}}"></div>
                                    @if($errors->has('slug'))
                                                <div class="help-block">
                                                    {{$errors->first('slug')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label ">Số lượng nhập</label>

                                    <div class="col-sm-10"><input type="number" class="form-control" name="quantity" value="{{$pro->quantity}}"></div>
                                    @if($errors->has('quantity'))
                                                <div class="help-block">
                                                    {{$errors->first('quantity')}}
                                                </div>
                                    @endif
                                </div>
                                <!-- <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label ">Số lượng hiện tại</label>

                                    <div class="col-sm-10"><input type="number" class="form-control" name="quantity_now"></div>
                                    @if($errors->has('quantity_now'))
                                                <div class="help-block">
                                                    {{$errors->first('quantity_now')}}
                                                </div>
                                    @endif
                                </div> -->
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label ">Tác giả</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="writer_name" value="{{$pro->writer_name}}"></div>
                                    @if($errors->has('writer_name'))
                                                <div class="help-block">
                                                    {{$errors->first('writer_name')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label ">Mô tả</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="about" value="{{$pro->about}}"></div>
                                    @if($errors->has('about'))
                                                <div class="help-block">
                                                    {{$errors->first('about')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('Img_upload')) has-error @endif">
                                    <label class="col-sm-3 control-label">Ảnh </label>
                                        <img src="{{ url('uploads') }}/{{$pro->image}}" alt="200" width="200px">
                                        <input type="file" name="Img_upload" placeholder="Images" value="" >
                                        @if($errors->has('Img_upload'))
                                        <div class="help-block">
                                            {{ $errors->first('Img_upload') }}
                                        </div>
                                        @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label ">Gía</label>

                                    <div class="col-sm-10"><input type="number" class="form-control" name="price" value="{{$pro->price}}"></div>
                                    @if($errors->has('price'))
                                                <div class="help-block">
                                                    {{$errors->first('price')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
                                    <label class="col-sm-2 col-form-label ">Gía sale</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="sale_price" value="{{$pro->sale_price}}"></div>
                                    @if($errors->has('slug'))
                                                <div class="help-block">
                                                    {{$errors->first('slug')}}
                                                </div>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row @if($errors->has('name')) has-error @endif">
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