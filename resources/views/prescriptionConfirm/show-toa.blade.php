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

                                    <div class="well col-md-6 col-sm-6 col-xs-6">
                                        
                                        <div class="hovereffect col-md-4 col-sm-4 col-xs-4">
                                            <a class="thumbnail" href="#thumb">
                                            <img src="{{url('uploads/prescription')}}/{{$model->image}}" class="thumbnail img-thumbnail" alt="Cinque Terre" width="250" height="350"> 
                                            <span><img src="{{url('uploads/prescription')}}/{{$model->image}}" height="550"/><br />Simply beautiful.</span>
                                            </a>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <p><b>Mã Bệnh nhân:</b> {{$model->maBn}}</p>
                                            <p><b>Số điện thoại:</b> {{$model->phone}}</p>
                                            <p><b>Địa chỉ:</b> {{$model->addr}}</p>
                                        </div>

                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="toa-center2 col-md-10 col-sm-10 col-xs-10">
                                        <table>
                                            <div >
                                                <table class="authors-list table table-striped">
                                                    <thead>
                                                      <tr>
                                                        <th >Stt</th>
                                                        <th>Tên thuốc</th>
                                                        <th>Giá</th>
                                                        <th>Số lượng</th>
                                                        <th class="col-md-2 col-sm-2 col-xs-2">Thành tiền</th>
                                                        <th class="col-md-1 col-sm-1 col-xs-1 text-center"></th>
                                                      </tr>
                                                    </thead>
                                                    
                                                <!--     <input type='text' id='textbox1' name='textbox1' /> -->
                                                    <tbody id='TextBoxesGroup'>
                                                    <?php 
                                                        $i=0;
                                                       foreach ($model->drugs as $value) {
                                                        $i++;
                                                    ?>
                                                      <tr id="TextBoxDiv1">
                                                        <td id="stt1">{{$i}}</td>
                                                        <td>{{$value->name}}</td>
                                                        <td >{{$value->quantity}}.000vnđ</td>
                                                        <td >{{$value->cost}}</td>
                                                        <td id='total1'>{{$value->total}}.000 vnđ</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-danger btn-sm" id="delete1">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                            </button>   
                                                        </td>
                                                      </tr>
                                                      <?php } ?>
                                                    </tbody>
                                                </table>

                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="showPopup"><b>Xuất toa</b></button>

                                                <input type='button' class="btn btn-primary btn-sm" value='Thêm thuốc' id='addButton' />

                                               
                                                
                                            </div>
                                            <!-- <button type="button" class="btn btn-primary" onclick="location.href='{{url('/don-thuoc-moi/xoa/')}}/{{ $model->id }}';">Yêu cầu lại</button>
                                            <button type="button" class="btn btn-primary" onclick="location.href='{{url('/don-thuoc-moi/xu-ly/')}}/{{ $model->id }}';">Xuất toa</button> -->
                                        </div>
                                    </div>
                                <!-- stop content -->
                            </div> 
                        </div>
                        
                    </div>
</div> 

 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form action="{{url('/cho-xu-ly/xu-ly')}}" method="POST">
    {!! csrf_field() !!}
      <div class="modal-header well">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Hẹn lấy thuốc:</b> </h4>
      </div>
      <div class="modal-body">
        <p>
            <label for="place">Địa điểm giao thuốc:</label>
            <input type="text" class="form-control" id="place" name="place">
        </p>
        <p>
            <label for="time">Địa điểm giao thuốc:</label>
            <input type="text" class="form-control" id="time" name="time">

         </p>
         <input type="hidden" name="id" value="{{$model->id}}"/>
         <input type="hidden" name="arrayDrug" id="arrayDrug" value=""/>
         <input type="hidden" name="submitTotal" value="" id="SubmitTotal" />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Quay lại</button>
        <button type="submit" class="btn btn-primary btn-sm" value="" style="margin-bottom: 5px;">
            Xuất toa
        </button>
      </div>
    </form>  
    </div>

  </div>
</div>  
<!-- end modal -->

<div id="script">
    
</div>
<!-- nhap toa -->
<script type="text/javascript">
    var counter = 1;
        jQuery(function(){
            jQuery('#addButton').click(function(event){
                var tong = 0;
                var arrayList = [];
                jsonObj = [];
                for(var i = 1; i<= counter; i++)
                {
                    var nameDrug = $('#nameDrug'+i).val();
                    var price = $('#price'+i).val();
                    var num =  $('#count'+i).val();
                    var total = price*num;
                    if(total>0){
                        $('#total'+i).html(total +".000 vnđ");
                        tong = tong + total;
                    }else{
                        $('#total'+i).html(".000 vnđ");
                        total=0;
                    }
                    
                }
                
                counter++;
                var newRow = jQuery('<tr id="TextBoxDiv'+counter+'">'
                    +'<td id="stt'+counter+'">' + counter + '</td>'
                    +'<td><input type="text" id="nameDrug' +
                    counter + '"/></td><td><input id="price'+
                    counter + '" type="text" name="price' +
                    counter + '"/></td><td><input id="count'+
                    counter + '" style="width:50%" type="text" name="count' +
                    counter + '"/></td><td id="total'+
                    counter + '""><b>Tổng:</b> '+
                    tong    +'.000 vnđ</td>'+
                    '<td class="text-center">'+
                        '<button type="button" class="btn btn-danger btn-sm" id="delete'+counter+'">'+
                        '<span class="glyphicon glyphicon-trash"></span>'+
                        '</button>'+   
                         '</td>'+
                    '</tr>');
                jQuery('table.authors-list').append(newRow);
                $('#SubmitTotal').val(total +".000 vnđ");

                // add xoa row
                var couRow = counter -1;
                var x = document.createElement("SCRIPT");
                var t = document.createTextNode('jQuery("#delete'+couRow+'").click(function(event){'+
                    '$("#TextBoxDiv'+couRow+'").remove();'+
                    'var j=0;'+
                    'for(var i = 1; i<50; i++)'+
                    '{ j++; if ($("#stt"+i).val()==null){j--}$("#stt"+i).html(j);}'+
                    '});');
                x.appendChild(t);
                document.body.appendChild(x);
            });
            // end
        });
//json Drug
    function Drug(name, quantity, cost, total) {
        this.name = name;
        this.quantity = quantity;
        this.cost = cost;
        this.total = total;
    }

    jQuery(function(){
            jQuery('#showPopup').click(function(event){
                var tong = 0;
                var arrayList = [];
                jsonObj = [];
                for(var i = 1; i<= 100; i++)
                {
                    var nameDrug = $('#nameDrug'+i).val();
                    var price = $('#price'+i).val();
                    var num =  $('#count'+i).val();
                    var total = price*num;
                    if(total>0){
                        tong = tong + total;
                        var drug = new Drug(nameDrug,price,num,total);
                        arrayList.push(drug);
                        $("#arrayDrug").val(JSON.stringify(arrayList));
                    }else{
                        total=0;
                    }
                    
                }
        });
    });
    
//lay json array thuoc        

</script>   

    <!-- show anh       -->
    <script type="text/javascript">
        $('["popover"]').popover({
          html: true,
          trigger: 'hover',
          content: function () {
            return '<img src="'+$(this).data('img') + '" />';
          }
        });
    </script>
                     
@stop

@section('import_js')
 <script type="text/javascript" src="{{url('public/js/bootstrap.min.js')}}"></script>
    
@stop