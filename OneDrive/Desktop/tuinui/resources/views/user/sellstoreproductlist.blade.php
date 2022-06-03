@extends('layouts.applogin')
@section('content')
<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
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
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5 havedatacal" style="border-radius:20px 20px 20px 20px; height:96%;display:none;">
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

    <div class="row mt-5" style="overflow-y:auto;max-height:780px;">
        <div class="d-flex justify-content-center">

            <div class="card" style="background:none;border:none;width:100%">
                @foreach ($storeproductlist as $item)
                <div class="col-12">
                    <form method="get" action="{{route('sellorderproductweb')}}">
                        <button class="ms-1 mb-1" name="storeid" value="{{$item->storeid}}"
                            style="width: 100%;background:white;border:none;;border-radius:20px;">
                            <div class="row mt-1">
                                <div class="col-lg-3 ">
                                    <img class="centered" src="{{asset('uploads/productimg/'.$item->product_img)}}" alt=""
                                        style="width: 150px;height:150px;border-radius:20px;">
                                </div>
                                <div class="col-lg-3">
                                    <p class="centered" style="font-size:20px">{{$item->productname}}</p>
                                </div>
                                <div class="col-lg-2">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-auto">
                                            <p class="centered" style="font-size: 20px"><img
                                                    src="{{asset('uploads/icon/protein.png')}}" alt=""
                                                    style="width: 50px;height:50px;"> {{$item->carbohydrate}} กรัม</p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="centered" style="font-size: 20px"> <img
                                                    src="{{asset('uploads/icon/carbohydrates.png')}}" alt=""
                                                    style="width: 50px;height:50px;"> {{$item->protien}} กรัม</p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="centered" style="font-size: 20px"><img
                                                    src="{{asset('uploads/icon/oil.png')}}" alt=""
                                                    style="width: 50px;height:50px;"> {{$item->fat}} กรัม</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="centered" style="font-size: 20px"><img
                                                    src="{{asset('uploads/icon/smartphone.png')}}" alt=""
                                                    style="width: 50px;height:50px;">{{$item->calorie}} แคลอรี่</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <p class="centered" style="font-size:20px">{{$item->promotion}}</p>
                                </div>
                                <div class="col-lg-1">
                                    <p class="centered" style="font-size: 20px">{{$item->price}} บาท</p>
                                </div>
                                <input type="text" name="id" value="{{$item->id}}" hidden>
                            </div>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    var userid = []
    liff.init({
        liffId: "1656751167-7jN0ZVbG"
    }, () => {
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
            }).catch(
                err => console.error(err)
            );
        } else {
            liff.login();
            
        }
    }, err => console.error(err.code, error.message));
    $(document).ready(function () {
        // $(".carbohydrate").css({"width": carbohydrate+"%","background-color": "#FFE194",});
        //             $("#textcarbohydrate").empty().append(response[0][0]['carbohydrate']+"กรัม")
        //             $(".protien").css({"width": protien+"%","background-color": "#FFE194",});
        //             $("#textprotien").empty().append(response[0][0]['protien']+"กรัม")
        //             $(".fat").css({"width": fat+"%","background-color": "#FFE194",});
        //             $("#textfat").empty().append(response[0][0]['fat']+"กรัม")
        //             $(".cal").css({"width": cal+"%","background-color": "#FFE194",});
        //             $("#textcal").empty().append(response[0][0]['calorie']+"แคลอรี่")
    });
</script>
@endsection