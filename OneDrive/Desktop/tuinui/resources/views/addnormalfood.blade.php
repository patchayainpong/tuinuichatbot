@extends('layouts.applogin')
@section('content')
<div class="container pt-5">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
    <form id="formadd" method="POST" action="{{route('addwebfooddata')}}" enctype="multipart/form-data" style="overflow-y:auto;height:660px;">
        @csrf
    <div class="dataadd">
        <div class="row">
            <div class="col-6">
         
               <div class="card " style="width:300px;height:300px;border:5px solid black;padding:10px">
                   <img class="showimg" id="blah" src="#" alt="your image" style="width:100%;height:100%;">
               </div>
               
 
                <div class="row">
                    <input class="foodimg" type="file" name="foodimg[]" id="imgInp" >
                </div>
                
            </div>
            <div class="col-6">
                <div class="row centered">
                    <div class="col-6">
                        <p>ชื่อเมนู</p>
                    </div>
                    <div class="col-6">
                        <input class="ip" type="text" name="food[foodname][]">
                    </div>
                    <div class="col-6">
                        <p>รายละเอียดอาหาร</p>
                    </div>
                    <div class="col-6">
                        <input class="ip" type="text" name="food[fooddetail][]">
                    </div>
                    <div class="col-6">
                        <p>แคลอรี่</p>
                    </div>
                    <div class="col-6">
                        <input class="ip" type="text" name="food[foodcalorie][]">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="showdata" style="">

    </div>

</form>    
<div class="d-flex justify-content-center mt-3">
         <button class="btn btn-success ms-2 me-2">บันทึก</button>
<a class="btn btn-primary moredata ms-2 me-2">+</a>
</div>

<div class="card mt-5">
    <table id="table_select" data-toggle="table" data-height="460" data-side-pagination="server"
    data-pagination="true" data-page-list="[10, 25, 50, 100, all]"
                data-query-params="searchQueryParams_invsetment" data-url="{{route('querywebfood') }}"
                data-method="get">
                <thead>
                    <tr class="tr_style">
                        <th data-field="foodname" class="th-2 font-table-modal "><label class="modal-header-f justify-content-center d-flex">ชื่อเมนู</th>
                        <th data-field="detailfood" class="th-2 font-table-modal"><label class="modal-header-f justify-content-center d-flex">รายละเอียดอาหาร</th>
                        <th data-field="calorie" class="th-2 font-table-modal"><label class="modal-header-f justify-content-center d-flex">แคลอรี่</th>
                        <th data-field="foodimg" class="th-2 font-table-modal"><label class="modal-header-f justify-content-center d-flex">รูปภาพ</th>
                    </tr>
                </thead>
            </table>
</div>
</div>
<script>
$(document).ready(function(){
// query database
function searchQueryParams_invsetment(params) {
            // console.log(params)
            params.fund_name = 'test_data';
            // console.log(params);
            return params; // body data
        }
// 
        $(document).on('click',".moredata",function(){
            var clone = $('.dataadd:first').clone()
            $(clone).find('input').val('')
            $(clone).find('.showimg').attr('src', '');
            $(clone).appendTo('.showdata')
        })
// src



$(document).on('click',".btn-success",function(){
    $('#formadd').submit()
})

$(document).on('change',".foodimg",function(){
 var showimg =$(this).closest('.dataadd')
  const file = this.files[0];
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $(showimg).find('.showimg').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }




})
        
})
    
</script>
@endsection