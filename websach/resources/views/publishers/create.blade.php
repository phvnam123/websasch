@extends('layout.main2')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Thêm nhà xuất bản</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post">
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên nhà xuất bản</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="name"></div>
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