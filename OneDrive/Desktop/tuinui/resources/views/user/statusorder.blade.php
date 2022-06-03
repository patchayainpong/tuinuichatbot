@extends('layouts.applogin')
@section('content')
<div class="container">
        <div class="card mt-5 d-flex justify-content-center">
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <img id="delivery" class="iconstatus" src="{{asset('uploads/icon/delivery.png')}}" alt="" style="width:480px;height:240px;display:none;">
                <img id="waiting" class="iconstatus" src="{{asset('uploads/icon/2722110.png')}}" alt="" style="width:240px;height:240px;display:none;">
                <img id="makefood" class="iconstatus" src="{{asset('uploads/icon/570627.png')}}" alt="" style="width:240px;height:240px;display:none;">
                <img id="cancle" class="iconstatus" src="{{asset('uploads/icon/cancle.png')}}" alt="" style="width:240px;height:240px;display:none;">
              </div>             
              <div class="row mt-2 d-flex justify-content-center" style="font-size: 24px;">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-4 text-center">
                      สถานะ
                    </div>
                    <div class="col-lg-8 mt-1">
                      <p class="text-center">กำลังรอร้านรับออเดอร์</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 text-center">รายการอาหาร</div>
                <div class="col-12 menuorder">
                  <div class="row d-flex">
                    <div class="d-flex justify-content-center">
                      <label for="" class="menuname" style="font-size: 20px;"></label>
                  <label for="" class="menutotal" style="font-size: 20px;"></label>
                   
                    </div>
                    
                    
                    {{-- <div class="col-lg-4 menuname " style="">เมนู</div>
                    <div class="col-lg-4 menutotal ">จำนวน</div> --}}
                  </div>
                </div>
                <div class="showmenu">
                </div>
                <div class="col-12 text-center">
                  ราคารวม <label class="totalprice" for=""></label>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() { 
      var price =0;
      var idstore = '<?=Crypt::decrypt($_GET['orderid'])?>';
      function orderdetail(){
        $.ajax({  //create an ajax request to display.php
          type: "get",
          url: "userorderdetail",  
          dataType: 'json',  
          data: {
               id:idstore
              },
          success: function (response) {
           var orderdata= Object.values(response)
           console.log(orderdata)
           var total = 0
           var numItems = $('.menuorder').length
           console.log(numItems)
          
           for(var i=0;i<orderdata.length;i++){
             if(numItems<2){
                var menu = $('.menuorder:first').clone();
               $(menu).find('.menuname').empty().append(orderdata[i]['productname'])
               $(menu).find('.menutotal').empty().append("("+orderdata[i]['total']+")")
               var totalprice = orderdata[i]['total']*orderdata[i]['price']
               price = price + totalprice
               $('.showmenu').append(menu)
             }
            
           }
            // $('p').eq(1).empty().append(orderdata[0]['total']);
            // $('p').eq(2).empty().append(orderdata[0]['productname']);
            // $('p').eq(3).empty().append(orderdata[0]['price']);
            if(orderdata[0]['status'] == 'waitingfororder'){
              $('p').eq(0).empty().append("กำลังรอร้านค้ารับออเดอร์");
              $('.iconstatus').hide()
              $('#waiting').show() 
            }else
            if(orderdata[0]['status'] == 'prepareingfood'){
              $('p').eq(0).empty().append("ร้านค้ากำลังจัดเตรียมอาหารของท่าน");
              $('.iconstatus').hide()
              $('#makefood').show()
            }else
            if(orderdata[0]['status'] == 'success'){
              $('p').eq(0).empty().append("ไรเดอร์กำลังนำส่งอาหาร");
              $('.iconstatus').hide()
              $('#delivery').show()
            }else
            if(orderdata[0]['status'] == 'cancelled'){
              $('p').eq(0).empty().append("ออเดอร์ถูกยกเลิก");
              $('.iconstatus').hide()
              $('#cancle').show()
            }
            $('.totalprice').empty().append(price)
            console.log()
          }
        });
      }
      orderdetail()
        // Pusher.logToConsole = true;
        var pusher = new Pusher('beb29d7a1bf5bfe57fe3', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('orderid'+idstore);
        channel.bind('userorderproduct', function(data) {
          orderdetail()
            // Swal.fire('คุณมีคำสั่งซื้อใหม่ กรุณาตรวจสอบ')
        });


    })
</script>
@endsection