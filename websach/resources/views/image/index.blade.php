@extends('layout.main2')
@section('content')

<div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 namitnoi" id="namitnoi">
                <a href="{{route('create_image')}}" class="btn btn-sm btn-success"> <i class="fa fa-add"> thêm ảnh</i></a>
                <div class="ibox danhsach">
                    <div class="ibox-content">
                        
                    <form action="" method="post" accept-charset="utf-8">  
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>name</th>
                            <th>ảnh</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($imge as $k => $imge)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$imge->name}}</td>
                            <td><img src="{{ url('uploads') }}/{{$imge->image}}" alt="anh" width="100px"></td>
                            <td>
                                <a href="{{route('edit_image',['id'=>$imge->id])}}" class="btn btn-sm btn-success" title="">sửa</a>
                                <a href="{{route('image_delete',['id'=>$imge->id])}}" class="btn btn-sm btn-danger" title="">xóa</a>
                                            
                            </td>
                            @endforeach()
                        </tr>
 
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