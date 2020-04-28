@extends('layout.main2')
@section('content')
<div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route('publishers_create')}}" class="btn btn-sm btn-success"> <i class="fa fa-add"> thêm nhà sản xuất</i></a>
                <div class="ibox ">
                    <div class="ibox-content">
                    <form action="{{route('publishers_delete_all')}}" method="post" accept-charset="utf-8">
                        <button type="submit" class="btn btn-sm btn-primary">xóa all</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checked" name="checked" value=""></th>
                            <th>STT</th>
                            <th>name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($publisher as $k => $pub)
                        <tr>
                            <td><input type="checkbox" class="checkall" name="id[]" value="{{$pub->id}}"></td>
                            <td>{{$k+1}}</td>
                            <td>{{$pub->name}}</td>
                            <td>
                                            <a href="{{route('publishers_edit',['id'=>$pub->id])}}" class="btn btn-xs btn-success"> <i class="fa fa-edit"> sửa</i></a>
                                            <a href="{{route('publishers_delete',['id'=>$pub->id])}}" class="btn btn-xs btn-danger remove-item"> <i class="fa fa-trash"> xóa</i></a>
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
</div>
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            var nut = document.getElementById('checked');
            var nut1 = document.getElementsByClassName('checkall');
            // console.log(x);
            var x = nut.checked = false;
            nut.onclick = function(){ 
                if(!x){
                    for (var i = 0; i < nut1.length; i++) {
                    nut1[i].checked=true;
                    x = true;
                }
            }else{ 
                alert('ac');
                    for (var i = 0; i < nut1.length; i++) {
                    nut1[i].checked=false;
                    x = false;
                }
                
            }
        }
        })

    </script>
@stop()