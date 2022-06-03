@extends('layouts.applogin')
<link rel="stylesheet" href="{{asset('assets/css/user/storeorder.css')}}">
<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
    .centered {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .containerbar {
        padding: 0px !important;
        width: 100%;
        /* Full width */
        background-color: #ddd;
        /* Grey background */
    }

    .skills {
        height: 50px;
        /* Right-align text */
        padding-top: 10px;
        /* Add top padding */
        padding-bottom: 10px;
        /* Add bottom padding */
        color: white;
        /* White text color */
    }

    .textbar {
        font-size: 18px;
        color: black;
        font-weight: bolder;
    }
    /* img{
        border-radius:50% !important; 
    } */
</style>
@section('content')
<div class="container" style="height: 90vh">
        <!-- Modal butrition-->

  
  {{--  --}}
    <div class="form row justify-content-center" style="">
        <div class="col-lg-5 text-center p-0 mb-2">
            <div class="card px-0  pb-0 " style="background: none;border:none;">
                <form id="msform" method="post" action="{{route('order')}}" enctype="multipart/form-data"> 
                    <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row text-center d-flex justify-content-center">
                                <div class="col-lg-4">
                                    <img class="rounded-corner" src="{{asset('uploads/storeimg/'.$orderdetail[0]->store_img)}}" alt="" style="width: 150px;height:150px;border-radius:50% !important;">
                                </div>
                                <div class="col-lg-6">
                                    <p class="centered" style="font-size: 25px;">{{$orderdetail[0]->storename}}</p>
                                    <input class="storeid" type="text" name="orderdetail[]" value="{{$orderdetail[0]->storeid}}" hidden>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="row">
                                         <div class="col-lg-12 d-flex justify-content-center">
                                    <img class="rounded-corner" src="{{asset('uploads/productimg/'.$orderdetail[0]->product_img)}}" alt="" style="width: 200px;height:200px;border-radius:10px">
                                </div>
                          
                                    </div>
                                </div>
                                {{-- <div class="col-6">
                                    <div class="card" style="border-radius:20px;">
                                        <div class="card-body" style="overflow-y: auto;height:200px;">
                                            <p class="text-center" style="font-weight: bolder;font-size:26px" >รายละเอียด</p>
                                           <p class="text-center">{{$orderdetail[0]->productdetail}}</p> 
                                        </div>
                                    </div>
                                  
                                </div> --}}

                               
                                <div class="col-lg-6 d-flex justify-content-center mt-3">
                                    <p style="font-size: 25px">{{$orderdetail[0]->productname}} </p>
                                  
                                </div>  
                                <div class="col-lg-6 d-flex justify-content-center mt-3">
                                    <p style="font-size: 25px">({{$orderdetail[0]->calorie}} แคลอรี่)</p>
                                  
                                </div> 
                                <input type="text" name="orderdetail[]" value="{{$orderdetail[0]->productname}}" hidden>
                                    <input type="text" name="calorie" value="{{$orderdetail[0]->calorie}}" hidden>
                                <div class="col-lg-12 d-flex justify-content-center mt-3" style="overflow-x: auto;" >
                                    <p style="font-size: 22px"> {{$orderdetail[0]->promotion}} </p>
                                </div>
                                <div class="col-lg-8 d-flex justify-content-center mt-3">
                                    <p style="font-size: 20px">ออเดอร์</p>
                                </div>
                                <div class="col-lg-4 d-flex justify-content-center mt-3">
                                </div>
                                <div class="col-lg-12 d-flex justify-content-center mt-3" style="height: 50px">
                                    <div class="btn minus" style="position: relative;left:40px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </div>
                                    <input class="orderip text-center  iproder  mb-0" type="number" name="orderdetail[]" value="1" max="10" style="font-size:20px;background: none;border:none;border-bottom: 1px solid black;max-width:200px;point-event:none;pointer-events: none;">
                                    <div class="btn plus" style="right:40px;position:relative;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus " viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-center mt-3" style="">
                                    <input id="total" class="orderip text-center  iproder  mb-0" type="text" name="orderdetail[]" value="{{$orderdetail[0]->price}}"   style="font-size:20px;background: none;border:none;max-width:200px;point-event:none;pointer-events: none;">
                                </div>
                                
                            </div>
                        </div>

                        {{-- <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $orderdetail[0]->id }}" name="id">
                            <input type="hidden" value="{{ $orderdetail[0]->productname }}" name="name">
                            <input type="hidden" value="{{ $orderdetail[0]->price }}" name="price">
                            <input type="hidden" value="{{ $orderdetail[0]->product_img }}" name="image">
                            <input type="hidden" value="{{ $orderdetail[0]->promotion }}" name="description">
                            <input type="hidden" value="1" name="quantity">  --}}
                            
                            <div class="d-flex justify-content-center mt-5">
                              
                                <div class="btn btn-primary page1 ms-1 me-1 " style="font-size:20px;">
                                    สั่งอาหาร
                                </div>  
                                <button type="button" class=" ms-1 me-1 add-to-cart-buttonc btn addtocart btn btn-success " name="btnAddToCart" style="font-size:20px;">
                                เพิ่มลงตะกร้า
                            </button>
                            <a class="btn ms-1 me-1 " style="background: rgb(240, 138, 155);color:white;font-size:20px;" data-bs-toggle="modal" data-bs-target="#nutriModal">ดูสารอาหาร</a>
                           
                            </div>
                            <button type="button"  class="next action-button nextpage1" hidden> </button>
                        {{-- </form> --}}
                    
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-lg-7 ">
                                    <h2 class="fs-title text-center">{{$orderdetail[0]->productname}}</h2>
                                </div>
                                <div class="col-lg-5">
                                </div>
                                <div class="row ">
                                    <div class="col-lg-8 d-flex justify-content-center mt-3">
                                        <p style="font-size: 20px">ออเดอร์</p>
                                    </div>
                                    <div class="col-lg-4 d-flex justify-content-center ">
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-center " style="height: 50px">
                                        <input class="orderip text-center  iproder ip1 mb-0" type="text" value="1" max="10" style="font-size:20px;background: none;border:none;border-bottom: 1px solid black;max-width:200px;pointer-events: none;">
                                    </div>
                                    <div class="col-lg-8 d-flex justify-content-center mt-3">
                                        <p style="font-size: 20px">หมายเหตุ</p>
                                    </div>
                                    <div class="col-lg-4 d-flex justify-content-center">
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-center " style="height: 50px">
                                        <input class="orderip text-center  iproder  mb-0" name="orderdetail[]" type="text" value="" style="font-size:20px;max-width:200px;">
                                    </div>
                                    <div class="col-lg-8 d-flex justify-content-center mt-3">
                                        <p style="font-size: 20px">โปรดเลือก</p>
                                    </div>
                                    <div class="col-lg-4 d-flex justify-content-center">
                                    </div>
                                    <div class="col-lg-12 d-inline justify-content-center " style="">
                                        <div class="row ">
                                            {{-- <div class="col-5 text-end">
                                                <input class="orderip" type="radio" name="ordertype" value="pickup" style="margin-top:6px">
                                            </div>
                                            <div class="col-7">
                                                <label>รับอาหารเองที่ร้าน</label>
                                            </div> --}}
                                            <div class="col-5 text-end">
                                                <input class="orderip" type="radio" name="ordertype" value="delivery" style="margin-top:6px" checked>
                                            </div>
                                            <div class="col-7">
                                                <label>ส่งเดลิเวอรี่ <label style="color: red;" >โปรดระบุที่อยู่</label> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-center mt-5" style="">
                                        <div class="btn btn-secondary me-2">ย้อนกลับ</div>
                                        <div class="btn btn-primary ms-2">ถัดไป</div>
                                        <a class="btn ms-2 me-2" style="background: rgb(240, 138, 155);color:white" data-bs-toggle="modal" data-bs-target="#nutriModal">ดูสารอาหาร</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button"  class="next action-button mt-5" hidden></button>
                        <button type="button"  class="previous action-button-previous"  hidden></button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-lg-11 d-flex justify-content-center">
                                    <p style="font-size: 25px">ชื่อ-นามสกุล</p>
                                </div>
                                <div class="col-lg-1">

                                </div>
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <input class=" check" type="text" name="orderdetail[]" required autocomplete="name">
                                </div>
                                <div class="col-lg-11 d-flex justify-content-center">
                                    <p style="font-size: 25px">เบอร์ติดต่อ</p>
                                </div>
                                <div class="col-lg-1">

                                </div>
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <input id="phone" class=" check" type="text" name="orderdetail[]" required autocomplete="phone">
                                </div>
                                <div class="col-lg-11 d-flex justify-content-center">
                                    <p style="font-size: 25px">ที่อยู่ จัดส่ง</p>
                                </div>
                                <div class="col-lg-1">

                                </div>
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <input class=" check" type="text" name="orderdetail[]" required autocomplete="address">
                                </div>
                                {{-- <div class="col-lg-12 d-flex justify-content-center" style="display: none;">
                                    <p style="font-size: 25px">เพิ่มเติม</p>
                                    <textarea class="" name="orderdetail[]" style="max-width:226px;width:100%;">-</textarea>
                                </div> --}}
                                <div class="col-lg-12 d-flex justify-content-center mt-5" style="">
                                    <div class="btn btn-secondary me-2">ย้อนกลับ</div>
                                    <div class="btn btn-primary ms-2">ยืนยัน</div>
                                </div>
                            </div>
                        </div>
                                <input type="text" value="{{$orderdetail[0]->protien}}" name="protien" id="" hidden>
                                <input type="text" value="{{$orderdetail[0]->fat}}" name="fat" id="" hidden>
                                <input type="text" value="{{$orderdetail[0]->carbohydrate}}" name="carbohydrate" id="" hidden>
                        <button type="submit" name="lineid"  id="lineid"  class="next action-button lineid"  hidden></button>
                        <button type="button"  class="previous action-button-previous" hidden></button>
                    </fieldset>
                  
                </form>
            </div>
        </div>
    </div>
    {{--modal  --}}
    <div class="modal fade" id="nutriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="border: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12"> <label for="" style="font-size: 22px;">สารอาหาร เมนู {{$orderdetail[0]->productname}}</label>  </div>
                            <div class="col-6">
                                <img src="{{asset('uploads/icon/carbohydrates.png')}}" alt=""
                                style="width: 50px;height:50px;"><label for="" class="ms-2" style="font-size: 20px;font-weight:bolder;">{{$orderdetail[0]->carbohydrate}} กรัม</label> 
                            </div>
                            <div class="col-6">
                                <img src="{{asset('uploads/icon/protein.png')}}" alt="" style="width: 50px;height:50px;">
                                <label for="" class="ms-2" style="font-size: 20px;font-weight:bolder;">{{$orderdetail[0]->protien}} กรัม</label> 
                            </div>
                            <div class="col-6">
                                <img src="{{asset('uploads/icon/oil.png')}}" alt=""
                                style="width: 50px;height:50px;">
                                <label for="" class="ms-2" style="font-size: 20px;font-weight:bolder;">{{$orderdetail[0]->fat}} กรัม</label> 
                            </div>
                            <div class="col-2">
<img src="{{asset('uploads/icon/smartphone.png')}}" alt=""
                                style="width: 50px;height:50px;">
                            </div>
                            <div class="col-4">
                                
                                <label for="" class="ms-2" style="font-size: 20px;font-weight:bolder;">{{$orderdetail[0]->calorie}} แคล</label> 
                            </div>
                        </div>
                    </div>
                  
                </div>
               
                <div class="row" style="overflow-y: auto">
                    <div class="col-12">
                        <div class="card mt-2 havedatacal" style="border-radius:20px 20px 20px 20px; height:96%;display:none;">
                            <div class="card-body">
            
                         
                            <div class="row" style="">
                                <div class="col-12">
                                    <label for="" style="font-size:30px;">สารอาหารที่คุณต้องการต่อวัน</label>
                                </div>
                                {{--  --}}
                                <div class="row pe-0" style="font-size: 18px !important">
                                    <div class="col-12 pe-0">
                                        <div class="row">
                                            <div class="col-6 text-start">
                                                <label class="centered">คาร์โบไฮเดรต</label>
                                            </div>
                                            <div class="col-6 text-end">
                                                <label id="textmaxcarbohydrate" class="centered "></label>
                                            </div>
                                        </div>
                                        <div class="containerbar">
                                            <div class="d-flex">
            
                                            
                                            <div class="skills carbohydrate" style="z-index: 0">
                                                <div class="row centered">
                                                    <div class="col-4">
                                                        <img src="{{asset('uploads/icon/carbohydrates.png')}}" alt=""
                                                            style="width: 50px;height:50px;">
                                                    </div>
                                                  
                                            </div>
                                           
                                            </div> 
                                            <div class="row " style="position: absolute;z-index: 99;width:100%">
                                                <div class="col-12 text-end ">
                                                    <label id="textcarbohydrate" class=" textbar centered mt-1" for=""></label></div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-start">
                                                <label class="centered">โปรตีน</label>
                                            </div>
                                            <div class="col-6 text-end">
                                                <label id="textmaxprotien" class="centered "></label>
                                            </div>
                                        </div>
            
            
                                        <div class="containerbar">
                                            <div class="d-flex">
            
                                          
                                            <div class="skills protien" style="z-index: 0">
                                                <div class="row centered">
                                                    <div class="col-4">
                                                        <img src="{{asset('uploads/icon/protein.png')}}" alt=""
                                                            style="width: 50px;height:50px;">
                                                    </div>
                                                  
                                            </div>   
                                        </div>
                                            <div class="row" style="position: absolute;z-index: 99;width:100%">
                                                 <div class="col-12 text-end" style="">
                                                        <label id="textprotien" class="centered textbar mt-1" for=""></label>
                                                    </div>
                                                </div>
                                           
            
                                             </div>     
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-start">
                                                <label class="centered">ไขมัน</label>
                                            </div>
                                            <div class="col-6 text-end">
                                                <label id="textmaxfat" class="centered "></label>
                                            </div>
                                        </div>
                                        <div class="containerbar">
                                            <div class="d-flex">
                                                <div class="skills fat" style="z-index: 0">
                                                    <div class="row centered">
                                                        <div class="col-4">
                                                            <img src="{{asset('uploads/icon/oil.png')}}" alt=""
                                                                style="width: 50px;height:50px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="position: absolute;z-index: 99;width:100%">
                                                      <div class="col-12 text-end">
                                                    <label id="textfat" class="centered textbar mt-1" for=""></label>
                                                </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-start">
                                                <label class="centered">แคลอรี่</label>
                                            </div>
                                            <div class="col-6 text-end">
                                                <label id="textmaxcal" class="centered "></label>
                                            </div>
                                        </div>
                                        <div class="containerbar">
                                            <div class="d-flex">
            
            
                                                <div class="skills cal" style="z-index: 0">
                                                    <div class="row centered">
                                                        <div class="col-4">
                                                        <img src="{{asset('uploads/icon/smartphone.png')}}" alt=""
                                                            style="width: 50px;height:50px;">
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row" style="position: absolute;z-index:99;width:100%">
                                                    <div class="col-12 text-end ">
                                                        <label id="textcal" class="centered textbar mt-1" for="" style=""></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                {{--  --}}
                            </div>
                        </div>
               
                        </div>
                        <div class="card mt-5 nodatacal" style="border-radius:20px 20px 20px 20px; height:80%;display:none;">
                            <div class="card-body text-center">
                               <label for="" class="" style="font-size:36px;font-weight:bolder;">กรุณาคำนวณแคลอรี่ที่คุณต้องการในแต่ละวัน</label> 
                               <div>
                                   <a href="{{route('caloriecalculator')}}" class="btn btn-primary">คำนวณแคลอรี่</a>
                               </div>
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          
            </div>
          </div>
        </div>
      </div>
</div>
<script>




var pricetotal1 =  parseInt($('#total').val());

$('#phone').keyup(function(event) {
            // format number
            function phoneFormat() {
                phone = phone.replace(/[^0-9]/g, '');
                phone = phone.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
                return phone;
            }
            var phone = $(this).val();
            phone = phoneFormat(phone);
            $(this).val(phone);;
        });


        var userid = []
var test
  liff.init({ liffId: "1656751167-7jN0ZVbG" }, () => {
    if (liff.isLoggedIn()) {
liff.getProfile().then(profile => {
  const userProfile = profile.userId;
  const displayName = profile.displayName;
  const statusMessage = profile.statusMessage;
  const pictureUrl = profile.pictureUrl;
  const email = liff.getDecodedIDToken().email;
  $.ajax({ //create an ajax request to display.php
                    type: "get",
                    url: "userdata",
                    dataType: 'json',
                    data: {
                        lineid: userProfile,
                    },
                    success: function (response) {
                        console.log(response[1][0])
                        if(response[0] != null && response[0] != ""){
                            
                        $('#textmaxprotien').empty().append(response[0][0]['protien'] +
                            " กรัม")
                        $('#textmaxcarbohydrate').empty().append(response[0][0][
                            'carbohydrate'
                        ] + " กรัม")
                        $('#textmaxfat').empty().append(response[0][0]['fat'] + " กรัม")
                        $('#textmaxcal').empty().append(response[0][0][
                            'lineuseridcalorie'] + " แคลอรี่")

                        var carbohydrate = response[1][0]['carbohydrate'] * 100 / response[
                            0][0]['carbohydrate']
                        var protien = response[1][0]['protien'] * 100 / response[0][0][
                            'protien'
                        ]
                        var fat = response[1][0]['fat'] * 100 / response[0][0]['fat']
                        var cal = response[1][0]['calorie'] * 100 / response[0][0]['lineuseridcalorie'] 
                        if(response[1][0]['fat'] == null &&response[1][0]['protien'] == null && response[1][0]['carbohydrate'] == null){
                             var showcarbo = 0; 
                        var showprotien = response[1][0]['protien']+0; 
                        var showfat = response[1][0]['fat']+0; 
                        if(response[1][0]['calorie'] == null || response[1][0]['calorie'] == ""){
                                var showcalorie = response[1][0]['calorie']+0; 
                        }else{
                            var showcalorie = response[1][0]['calorie']; 
                        }
                        
                        }else
                        {
                            var showcarbo = response[1][0]['carbohydrate']; 
                        var showprotien = response[1][0]['protien']; 
                        var showfat = response[1][0]['fat']; 
                        var showcalorie = response[1][0]['calorie']; 
                        }
                       
                        $(".carbohydrate").css({
                            "width": Math.round(carbohydrate) + "%",
                            "background-color": "#FFE194",
                        });
                        $("#textcarbohydrate").empty().append(showcarbo + "กรัม")
                        $(".protien").css({
                            "width": Math.round(protien) + "%",
                            "background-color": "#FFE194",
                        });
                        $("#textprotien").empty().append(showprotien + "กรัม")
                        $(".fat").css({
                            "width": Math.round(fat) + "%",
                            "background-color": "#FFE194",
                        });
                        $("#textfat").empty().append(showfat + "กรัม")
                        $(".cal").css({
                            "width": Math.round(cal) + "%",
                            "background-color": "#FFE194",
                        });
                        $("#textcal").empty().append(showcalorie + "แคลอรี่")
                        userid.push(response)
                        $('.havedatacal').show()
                       }  else{
                            $('.nodatacal').show()
                       }
                    }
                });
  $('.lineid').val(userProfile)
}).catch(
  err => console.error(err)
);
    } else {
        liff.login()
        // liff.login({ redirectUri: "https://xxxxx.myapp.com/?key1=abc" })
        // liff.login({ redirectUri: "https://xxxxx.myapp.com/index.html?key1=abc" })
    }
  }, err => console.error(err.code, error.message));

    //jQuery time
    $(document).ready(function() {

    




        $(document).on('click', ".minus", function() {
            var total = $('.form').find('.iproder').eq(0).val();
            var pricetotal = $('.form').find('.iproder').eq(1).val();
            var myInt = parseInt(total)
            if (myInt > 1) {
                var myInt = parseInt(total) - 1;
                var pricetotalcal = parseInt(pricetotal) - pricetotal1;
                $('.form').find('.iproder').eq(0).val(myInt);
                $('.ip1').val(myInt);
                $('#total').val(pricetotalcal)
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ขั้นต่ำคือ 1 ออเดอร์',
                })
            }
            // $('.form').find('.iproder').eq(0).val(totaltest );
        });

        $(document).on('click', ".plus", function() {
            var total = $('.form').find('.iproder').eq(0).val();
            var pricetotal = $('.form').find('.iproder').eq(1).val();
            var myInt = parseInt(total)
            if (myInt < 10) {
                var pricetotalcal = parseInt(pricetotal) + pricetotal1;
                var myInt = parseInt(total) + 1;
                $('.form').find('.iproder').eq(0).val(myInt);
                $('.ip1').val(myInt);
                $('#total').val(pricetotalcal)
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'สามารถสั่งได้สูงสุด 10 ออเดอร์',
                })
            }
            // $('.form').find('.iproder').eq(0).val(totaltest );
        });




        $(document).on('click',".addtocart",function(){
            var productname = "{{$orderdetail[0]->productname}}"
            var productid = "{{$orderdetail[0]->id}}"
            var productprice = "{{$orderdetail[0]->price}}"
            var productimg = "{{$orderdetail[0]->product_img}}"
            var productpromotion = "{{$orderdetail[0]->promotion}}"
            var productquantity = $('.orderip').val()
            var storeid = $('.storeid').val()
            $.ajax({  //create an ajax request to display.php
          type: "post",
          url: "cartadd",  
        //   async: false, 
        //   dataType: 'json',  
          data: {
                "_token": "{{ csrf_token() }}",
               "id":productid,
               "name":productname,
               "price":productprice,
               "image":productimg,
               "quantity":productquantity,
               "description":productpromotion,
                "storeid":storeid,
              },
          success: function (response) {
              if(response == 'success'){
                const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'เพิ่มลงตะกร้าเรียบร้อย'
})
              }else{
                const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'ต้องเป็นสินค้าจากร้านค้าเดียวกันเท่านั้น'
})
              }
              console.log(response)
 
          }
        });
           
        })
        $(document).on('click', ".btn-secondary", function() {
            $(this).closest('fieldset').find('.previous').click();
        });

        $(document).on('click', ".btn-primary", function() {
            var input =  $(this).closest('fieldset').find('.orderip')
            var input1 =  $(this).closest('fieldset').find('.check')
            $(input).each(function() {
                var val = $(this).val();
                if (val == '' || val == null) {
                    $(this).val('-');
                }
            })
            var inputcheck = []
            $(input1).each(function() {
                var val = $(this).val();
                if (val == '' || val == null) {
                    inputcheck.push('false');
                }
            })
            if (inputcheck.includes('false') == true) {

Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
})

}else
if(inputcheck.includes('false') == false){
    $(this).closest('fieldset').find('.next').click();
}
console.log(inputcheck);
        });
        // multistep form
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function() {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function() {
            return false;
        })

    });
</script>
@endsection