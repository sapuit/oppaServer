@extends('main.main')

@section('body_right')

<div class="">
                    <div class="page-title">

                        <div class="title_right">
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<div class="x_panel">
                                <div class="x_title">
                                    <h2>{{ $model->name }} </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                           
                                        </li>
                                        <li><a href="#"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- stop head text       -->
                                <!-- star content -->

                                	<div class="well col-md-5 col-sm-5 col-xs-5">
                                        <p><b>Mã Bệnh nhân:</b> {{$model->maBn}}</p>
                                        <p><b>Số điện thoại:</b> {{$model->phone}}</p>
                                		<p><b>Địa chỉ:</b> {{$model->addr}}</p>
                                	</div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    	<div class="toa-center">
                                    		<img src="{{url('uploads/prescription')}}/{{$model->image}}" alt="..." class="img-responsive center-block" />
                                    		<button type="button" class="btn btn-primary" onclick="location.href='{{url('/don-thuoc-moi/xoa/')}}/{{ $model->id }}';">Yêu cầu lại</button>
                                    		<button type="button" class="btn btn-primary" onclick="location.href='{{url('/don-thuoc-moi/xu-ly/')}}/{{ $model->id }}';">Xử lý toa</button>
                                    	</div>
                                    </div>
                            	<!-- stop content -->
                            </div> 
                        </div>
                    </div>
</div>                        
@stop