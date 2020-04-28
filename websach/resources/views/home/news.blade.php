@extends('layout.frontend')
@section('title','home')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <div class="col-xs-12 col-sm-8 col-md-12 col-lg-12 no-padding">              
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="panel panel-success">
            <div class="panel-body">
              <div class="row">
              <!-- hot new content -->
                <div class="col-lg-12">
                  <h3 class="title-h3"><a href="#" title="{!!$new->title!!}">{!!$new->title!!}</a></h3>
                   <p class="time-views"> <span> Đăng bởi: </span> <strong>admin</strong> <strong> - 106 lượt xem</strong></p>
                                    
                  <p class="summary-content">
                  <div class="panel-body">
                    <p class="text-left" style=" padding-bottom: 0px;">
                        <img class="" src="{{url('uploads')}}/{{$new->image}}"  alt="{!!$new->image!!}" width="300px">
                    </p>
                    <p class="text-left" style=" padding-bottom: 0px;">
                      <strong>
                        {!!$new->description!!}
                      </strong>                  
                    </p>          
                      <div class="accordion-inner">
                        {!!$new->full!!}
                      </div>
                  
                      <p><span style="font-size:10px;color:#bdc3c7;">Sử lần cuối: {!!$new->updated_at!!} </span></p>
                      <p class="text-right"> <span class="glyphicon glyphicon-user" style="color:blue;"></span> <strong> admin </strong></p>
                  </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>   
        </div>
      </div>     
    </div> 
@stop