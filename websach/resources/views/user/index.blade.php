@extends('layout.main2')
@section('content')

<div class="wrapper wrapper-content">
            <div class="row">
            <div class="col-lg-12 namitnoi" id="namitnoi">
                            <a href="{{route('user_create')}}" class="btn btn-sm btn-success"> <i class="fa fa-add"> thêm admin</i></a>
 
            <!-- Modal -->
            <!-- <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">thêm danh mục sản phẩm</h4>
                        </div>
                        <form >
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">name</div>
                                <div class="col-md-8">
                                    <input type="text" id="name" name="name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">slug</div>
                                <div class="col-md-8">
                                    <input type="text" id="slug" name="slug" />
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger hide">
 
                        </div>
                         <div class="alert alert-success hide">
 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="them">Thêm</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div> 
                </div>
            </div> -->
                <div class="ibox danhsach">
                    <div class="ibox-content">
                    <form action="" method="post" accept-charset="utf-8">
                        <!-- <button type="submit" class="btn btn-sm btn-danger">xóa all</button> -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <!-- <th><input type="checkbox" id="checked" name="checked" value=""></th> -->
                            <th>STT</th>
                            <th>name</th>
                            <th>email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($user as $k => $user)
                        <tr>
<!--                             <td><input type="checkbox" class="checkall" name="id[]" value="{{$user->id}}"></td> -->
                            <td>{{$k+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                            <a href="{{route('user_delete',['id'=>$user->id])}}" class="btn btn-xs btn-danger remove-item"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                        </tr>
                            @endforeach()
    					</tbody>
                        </table>
                    </div>
                    @csrf()
                    </form>
                    </div>
                </div>
            </div>
</div>
    <script>
        $(document).ready(function($){
            $('#checked').click(function(e){
                // e.preventDefault();
                var x = $('#checked').prop('checked');
                if(x){
                    $('.checkall').prop({
                        checked: true
                    })
                }else{
                    $('.checkall').prop({
                        checked: false
                    })
                }
            });
        })


    </script>
@stop()