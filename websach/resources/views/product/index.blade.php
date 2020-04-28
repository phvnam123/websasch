@extends('layout.main2')
@section('content')
<div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route('product_create')}}" class="btn btn-sm btn-success create-ajax"> <i class="fa fa-add"> thêm sản phẩm</i></a>
                <div class="ibox ">
                    <div class="ibox-content">
                    <form action="{{route('product_delete_all')}}" method="post" accept-charset="utf-8">
                        <button type="submit" class="btn btn-sm btn-primary">xóa all</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checked" name="checked" value=""></th>
                            <th>STT</th>
                            <th>name</th>
                            <th>ảnh</th>
                            <th>tên tác giả</th>
                            <th>số lượng sản phẩm</th>
                            <th>Gía tiền</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($prod as $k => $pro)
                        <tr>
                            <td><input type="checkbox" class="checkall" name="id[]" value="{{$pro->id}}"></td>
                            <td>{{$k+1}}</td>
                            <td>{{$pro->name}}</td>
                            <td><img src="{{ url('uploads') }}/{{$pro->image}}" alt="anh" width="100px"></td>
                            <td>{{$pro->writer_name}}</td>
                            <td @if($pro->quantity_now <= 0) style="background-color: red" @endif>{{ $pro->quantity_now }}/{{ $pro->quantity }}</td>
                            <td>{{ number_format($pro->price)  }} VND</td>
                            <td>
                                <a href="{{route('product_edit',['id'=>$pro->id])}}" class="btn btn-xs btn-success"> <i class="fa fa-edit"> sửa</i></a>
                                <a href="{{route('product_delete',['id'=>$pro->id])}}" class="btn btn-xs btn-danger"> <i class="fa fa-edit"> xóa</i></a>
                                
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
    <div class="clearfix">
        {{ $prod->links() }}
    </div>
</div>
<div class="modal fade" id="modal-create">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="" method="POST" class="form-inline col-12" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group col-12">
                                <input type="hidden" class="form-control col-8" id="id" placeholder="Input field">
                            </div>
                            <div class="form-group col-12">
                                <label class="col-4" for="">tên</label>
                                <input type="text" class="form-control col-8" id="ten" name="name" placeholder="Input field">
                            </div>
                            <!-- <div class="form-group col-12 ">
                                <label class="col-4" for=""></label>
                                <label class="col-8 has-error">has-error</label>
                            </div> -->
                            <div class="form-group col-12">
                                <label class="col-4" for="">ảnh</label>
                                <input id="new_picture" type="file" class="form-control col-8" name="upload">
                            </div>
                            <div class="form-group col-12">
                                <label class="col-4" for="">ảnh cũ</label>
                               <img src="" id="anh" class="col-8" width="250px">
                            </div>
                            <div class="form-group col-12">
                                <label class="col-4" for="">tác giả</label>
                                <input type="" class="form-control col-8" id="write_name" placeholder="">
                            </div>
                            <div class="form-group col-12">
                                <label class="col-4" for="">thể loại</label>
                                <select class="c-select col-8">
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-4" for="">mã đơn hàng nhập</label>
                                <select class="d-select col-8">
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-4" for="">nhà xuất bản</label>
                                <select class="a-select col-8">
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-4" for="">số lượng</label>
                                <input type="number" class="form-control col-8" id="number" placeholder="">
                            </div>
                            <div class="form-group col-12">
                                <label class="col-4" for="">giá</label>
                                <input type="number" class="form-control col-8" id="price" placeholder="">
                            </div>
                        </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary Create_product">Create</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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


        $('.create-ajax').click(function(e){
            e.preventDefault();
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $('#modal-create').modal('show');
            $.ajax({
                url: 'create_getproduct',
                type: 'get',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                        // $('.c-select').find('option:not(:first)').remove();

                    $.each(data['cat'],function(index, value) {
                        // console.log(data['cat'][1]);
                        $('.c-select').append('<option id="category" value="'+value.id+'">'+value.name+'</option>');
                    });
                    $.each(data['publisher'],function(index, value) {
                        // console.log(data['cat'][1]);
                        $('.a-select').append('<option id="publishers" value="'+value.id+'">'+value.name+'</option>');
                    });
                    $.each(data['pruchases'],function(index, value) {
                        // console.log(data['cat'][1]);
                        $('.d-select').append('<option id="pruchases" value="'+value.id+'">'+value.MADH+'</option>');
                    });
                }
            })


            $('.Create_product').click(function(){
             $("#modal-create").modal("hide");
            $.ajax({
                url: 'create_post_getproduct',
                type: 'post',
                dataType: 'json',
                data: { 
                    image: $('#new_picture').val(),
                    name: $('#ten').val(),
                    quantity_now: $('#number').val(),
                    price: $('#price').val(),
                    writer_name: $('#write_name').val(),
                    category_id: $('#category').val(),
                    publishers_id: $('#publishers').val(),
                    pruchases_id: $('#pruchases').val(),
                },
                success: function(data){
                    console.log(data);
                    if (data.errors) {
                    $("#modal-create").modal("hide");
                    $( ".has-error" ).show();
                    $('.has-error').text(data.errors[0]);
                }else {
                    $("#modal-create").modal("hide");
                    location.reload();
                }

                }
            });
            
        });
            
        });
        


    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
@stop()
