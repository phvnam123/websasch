 @extends('layout.main2')
@section('content')
            <div class="col-lg-2">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-success float-none">Số lượng sản phẩm</span>
                    </div>
                    <div class="ibox-content">
                        <h3 class="no-margins">{{$product}}:sản phẩm</h3>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Total views</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                <div class="col-lg-5 ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-none">Đơn hàng mới nhất</span>
                        
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="ibox col-md-6">
                            <div class="ibox-title">
                                <span class="label label-info float-none">order news</span>
                            </div>
                            <div class="ibox-content">
                                <h3 class="no-margins">{{$order_count}}: đơn mới</h3>
                                <div class="stat-percent font-bold text-info">10% <i class="fa fa-level-up"></i></div>
                                <small>New orders</small>
                            </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-5 ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-none">Tổng giá tiền</span>
                        
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="ibox col-md-6">
                            <div class="ibox-title">
                                <span class="label label-info float-none">Tổng thu nhập</span>
                            </div>
                            <div class="ibox-content">
                                <h3 class="no-margins">{{number_format($order_sum)}}: VND</h3>
                                <div class="stat-percent font-bold text-info">50% <i class="fa fa-level-up"></i></div>
                                <small>Thu nhập</small>
                            </div>
                            </div>
                        </div>


                    </div>
                </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <span class="label label-primary float-none">sản phẩm bánh nhiều nhất</span>
                        
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-4">
                                @if(!empty($maxproduct))
                                <img src="{{url('uploads')}}/{{$maxproduct->image}}" width="250">
                                <h3 class="no-margins">{{$maxproduct['name']}}</h3>
                                <p>{{number_format($maxproduct['price'])}} VND</p>
                                @endif()
                            </div>
                        </div>


                    </div>
                </div>
            </div>

@stop()