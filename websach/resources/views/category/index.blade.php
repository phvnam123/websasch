@extends('layout.main2')
@section('content')

<div class="wrapper wrapper-content">
            <div class="row">
            <div class="col-lg-12 namitnoi" id="namitnoi">
                            <a href="{{route('category_create')}}" class="btn btn-sm btn-success"> <i class="fa fa-add"> thêm danh mục</i></a>
 
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
                    <form action="{{route('category_delete_all')}}" method="post" accept-charset="utf-8">
                        <button type="submit" class="btn btn-sm btn-danger">xóa all</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checked" name="checked" value=""></th>
                            <th>STT</th>
                            <th>name</th>
                            <th>slug</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($cats as $k => $cat)
                        <tr>
                            <td><input type="checkbox" class="checkall" name="id[]" value="{{$cat->id}}"></td>
                            <td>{{$k+1}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->slug}}</td>
                            <td>
                                            <a href="{{route('category_edit',['id'=>$cat->id])}}" class="btn btn-xs btn-success"> <i class="fa fa-edit"> sửa</i></a>
                                            <a href="{{route('category_delete',['id'=>$cat->id])}}" class="btn btn-xs btn-danger remove-item"> <i class="fa fa-trash"> xóa</i></a>
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
        // document.addEventListener("DOMContentLoaded",function(){
        // //     var nut = document.getElementById('checked');
        // //     var nut1 = document.getElementsByClassName('checkall');
        // //     // console.log(x);
        // //     var x = nut.checked = false;
        // //     nut.onclick = function(){ 
        // //         if(!x){
        // //             for (var i = 0; i < nut1.length; i++) {
        // //             nut1[i].checked=true;
        // //             x = true;
        // //         }
        // //     }else{ 
        // //         alert('ac');
        // //             for (var i = 0; i < nut1.length; i++) {
        // //             nut1[i].checked=false;
        // //             x = false;
        // //         }
                
        // //     }

        // // }
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
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

        //     $('#them').click(function(e){
        //         e.preventDefault();
        //         var error = $('.alert-danger');
        //         var ok = $('.alert-success');
        //         error.html("");
        //         ok.html("");

        //         // $('#myModal').hide();
        //         let name = $('#name').val();
        //         let slug = $('#slug').val();
        //         var url = '{{route('category_create')}}';
        //         if (name == "") {
        //             error.html("Tên đăng nhập không được để trống");
        //             return false;
        //         }
        //         // Kiểm tra nếu password rỗng thì báo lỗi
        //         if (slug == "") {
        //             error.html("Mật khẩu không được để trống");
        //             return false;
        //         }
        //         alert(url);
        //         $.ajax({
        //             url:url, 
        //             type:'Post',
        //             data: {
        //                 name: name,
        //                 slug: slug
        //             },
        //             dataType: 'json',
        //             success:function(res){
        //                 console.log(res); 
        //                     $('#myModal').load(location.href + ' #myModal');
        //                     $('.danhsach').load(location.href + ' .danhsach');
        //                     ok.html("thêm thành công danh mục sản phẩm");
        //                     location.reload();
        //             }
        //         });
        //     });


        })


    </script>
@stop()