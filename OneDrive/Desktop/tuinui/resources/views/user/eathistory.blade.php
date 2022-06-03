@extends('layouts.applogin')
@section('content')
<style>
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
    .alertbd {
        border: 1px solid red !important;
    }
</style>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<div class="container d-flex justify-content-center mt-5">
    <div class="card" style="width:600px;">
        <div class="card-body">
            <h1 class="text-center">บันทึกประวัติการรับประทานอาหาร</h5>
                <div class="d-flex justify-content-center">
                    <div class="input-group mb-3" style="width: 280px">
                        <input id="calorie" type="text" class="form-control" placeholder="Calorie" aria-label="Username"
                            aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">Calorie</span>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="col-lg-auto">
                            <button class="btn mt-1 mb-1 ms-2 me-2 btn-primary" data-toggle="modal"
                            data-target="#nutritionModal" style="width: 100%">ปริมาณสารอาหาร</button>
                        </div>
                        <div class="col-lg-auto">
                            <button class="btn mt-1 mb-1 ms-2 me-2" style="background: rgb(80, 131, 5);color:white;width:100%;" data-toggle="modal"
                            data-target="#addmoreModal">เพิ่มเมนูอื่นๆ</button>
                        </div>
                    </div>
                    
                 
                </div>
                <div class="text-center">
                    <div class="row  mt-4" style="">
                        <div class="col-lg-6 ps-0 pe-0 pt-0 pb-"
                            style="height:auto;min-height:50px;border: 0.5px solid black;border-right:none;background:#ccff99">
                            <p class="text-center mb-0 centered" style="font-size:26px;">มื้อเช้า</p>
                        </div>
                        <input class="idbreakfast" type="text" type="text" hidden>
                        <div class="col-lg-6 ps-0 pe-0" style="height:auto;min-height:50px;border: 0.5px solid black">
                            <button data-time="breakfast" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                style="width: 100%;height:100%;background:none;border:none;">
                                <p class="text-center mb-0  text-breakfast" style="color:black"></p>
                            </button>

                        </div>
                        <div class="col-lg-6 mt-2"
                            style="height:auto;min-height:50px;border: 0.5px solid black;border-right:none;background:#ccff99">
                            <p class="text-center mb-0 centered" style="font-size:26px;">มื้อกลางวัน</p>
                        </div>
                        <input class="idlunch" type="text" type="text" hidden>
                        <div class="col-lg-6 ps-0 pe-0 mt-2"
                            style="height:auto;min-height:50px;border: 0.5px solid black">
                            <button data-time="lunch" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                style="width: 100%;height:100%;background:none;border:none;">
                                <p class="text-center mb-0  text-lunch" style="color:black"></p>
                            </button>

                        </div>
                        <div class="col-lg-6 mt-2"
                            style="height:auto;min-height:50px;border: 0.5px solid black;border-right:none;background:#ccff99">
                            <p class="text-center mb-0 centered" style="font-size:26px;">มื้อเย็น</p>
                        </div>
                        <input class="iddinner" type="text" type="text" hidden>
                        <div class="col-lg-6 ps-0 pe-0 mt-2"
                            style="height:auto;min-height:50px;border: 0.5px solid black">
                            <button data-time="dinner" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                style="width: 100%;height:100%;background:none;border:none;">
                                <p class="text-center mb-0  text-dinner" style="color:black"></p>
                            </button>

                        </div>
                    </div>
                    <div class="card mt-4" style="border: none;">
                        <div class="text-center" style="font-size: 24px;">เมนูอื่นๆ</div>
                        <div class="card-body">
                            <div class="">
                                   <div class="row">
                             <div class="col-4 " style="background:rgb(253, 179, 228)">
                                <label for="" class="centered">ชื่อเมนู</label> 
                             </div>
                             <div class="col-3" style="background:rgb(253, 179, 228)">
                                <img src="{{asset('uploads/icon/carbohydrates.png')}}"
                                alt="" style="width: 50px;height:50px;">
                             </div>
                             <div class="col-2" style="background:rgb(253, 179, 228)">
                                <img src="{{asset('uploads/icon/protein.png')}}" alt=""
                                style="width: 50px;height:50px;">
                             </div>
                             <div class="col-2" style="background:rgb(253, 179, 228)">
                                <img src="{{asset('uploads/icon/oil.png')}}" alt=""
                                style="width: 50px;height:50px;">
                             </div>
                         </div>
                         <div class="row copymoremenu" style="display: none;">
                            <div class="col-4  " style="border-bottom:1px solid rgb(253, 179, 228); ">
                             <label for="" class="text-center centered showmorename" style=""></label>
                            </div>
                            <div class="col-3 " style="border-bottom:1px solid rgb(253, 179, 228); ">
                                <label for="" class="text-center centered showmorecarbo"></label>
                            </div>
                            <div class="col-2 " style="border-bottom:1px solid rgb(253, 179, 228); ">
                                <label for="" class="text-center centered showmoreprotien"></label>
                            </div>
                            <div class="col-2" style="border-bottom:1px solid rgb(253, 179, 228); ">
                                <label for="" class="text-center centered  showmorefat"></label>
                            </div>
                            <div class="col-1" style="border-bottom:1px solid rgb(253, 179, 228); ">
                                <button class="btndeletemormenu" style="width: 100%;border:none;background:none;color:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg>
                                </button>
                            </div>
                        </div>
                        <div class="showmoremenu"></div>
                            </div>
                      
                        </div>
                 </div>
                </div>

        </div>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal modalmain fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มประวัติการรับประทานอาหาร<label class="meal"
                        for=""></label> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ชื่อเมนู</span>
                    <input type="text" class="form-control food" placeholder="ชื่อเมนู" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">แคลอรี่</span>
                    <input type="text" class="form-control calorie" placeholder="แคลอรี่" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">คาร์โบไฮเดรต</span>
                    <input type="text" class="form-control mainmodalcarbo" placeholder="คาร์โบไฮเดรต" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">โปรตีน</span>
                    <input type="text" class="form-control mainmodalprotien" placeholder="โปรตีน" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ไขมัน</span>
                    <input type="text" class="form-control mainmodalfat" placeholder="ไขมัน" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-success">บันทึก</button>
            </div>
        </div>
    </div>
</div>


{{-- modal nutrition --}}
<!-- Modal -->
<div class="modal fade" id="nutritionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ปริมาณสารอาหาร</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="">
                    <div class="col-12">
                    </div>
                    {{--  --}}
                    <div class="card mt-5 havedatacal"
                        style="border-radius:20px 20px 20px 20px; height:96%;display:none;border:none;">
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
                                                            <img src="{{asset('uploads/icon/carbohydrates.png')}}"
                                                                alt="" style="width: 50px;height:50px;">
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row " style="position: absolute;z-index: 99;width:100%">
                                                    <div class="col-12 text-end ">
                                                        <label id="textcarbohydrate" class=" textbar centered mt-1"
                                                            for=""></label></div>
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
                                                        <label id="textprotien" class="centered textbar mt-1"
                                                            for=""></label>
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
                                                        <label id="textfat" class="centered textbar mt-1"
                                                            for=""></label>
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
                                                        <label id="textcal" class="centered textbar mt-1" for=""
                                                            style=""></label>
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

                    {{--  --}}
                    <div class="card mt-5 nodatacal"
                        style="border-radius:20px 20px 20px 20px; height:80%;display:none;border:none;">
                        <div class="card-body text-center">
                            <label for="" class=""
                                style="font-size:36px;font-weight:bolder;">กรุณาคำนวณแคลอรี่ที่คุณต้องการในแต่ละวัน</label>
                            <div>
                                <a href="{{route('caloriecalculator')}}" class="btn btn-primary">คำนวณแคลอรี่</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

{{-- modal addmorefood --}}
<!-- Modal -->
<div class="modal fade" id="addmoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มเมนูอื่นๆ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">ชื่อเมนู</span>
                    </div>
                    <input type="text" class="form-control ip addmenuname" placeholder="ชื่อเมนู"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">คาร์โบไฮเดรต</span>
                            </div>
                            <input type="text" class="form-control ip addmenucarbo" placeholder="คาร์โบไฮเดรต"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">โปรตีน</span>
                            </div>
                            <input type="text" class="form-control ip addmenuprotien" placeholder="โปรตีน"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">ไขมัน</span>
                            </div>
                            <input type="text" class="form-control ip addmenufat" placeholder="ไขมัน"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">แคลอรี่</span>
                            </div>
                            <input type="text" class="form-control ip addmenucal" placeholder="แคลอรี่"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-danger btnaddmoremenu"
                        style="background: rgb(95, 95, 226) !important;color:white;border:none;">เพิ่ม</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
{{--  --}}
</div>
<script>
    var userid = []
    liff.init({
        liffId: "1656751167-gYzA3rP8"
    }, () => {
        if (liff.isLoggedIn()) {
            liff.getProfile().then(profile => {
                var userProfile = profile.userId;
                var displayName = profile.displayName;
                var statusMessage = profile.statusMessage;
                var pictureUrl = profile.pictureUrl;
                var email = liff.getDecodedIDToken().email;
                userid.push(profile['userId'])


            }).catch(
                err => console.error(err)
            );
        } else {
            liff.login();
        }
    }, err => console.error(err.code, error.message));



    $(document).ready(function () {



    




            function datamenumore(){
                liff.getProfile().then(
                profile => {
                    $.ajax({ //create an ajax request to display.php
                        type: "get",
                        url: "datamoremenu",
                        async: false,
                        // dataType: 'json',
                        data: {

                            lineid: profile.userId,
                        },
                        success: function (response) {
                            $('.removecp').remove()
                            var data = Object.values(response)
                            for(var i =0;i<data.length;i++){
                                   var cloneshow = $('.copymoremenu:first').clone()
                                   $(cloneshow).addClass('removecp')
                            $(cloneshow).find('.showmorename').append(data[i]['foodname'])
                            $(cloneshow).find('.showmoreprotien').append(data[i]['protien'])
                            $(cloneshow).find('.showmorefat').append(data[i]['fat'])
                            $(cloneshow).find('.showmorecarbo').append(data[i]['carbohydrate'])
                            $(cloneshow).find('.btndeletemormenu').val(data[i]['id'])
                            $(cloneshow).show().appendTo('.showmoremenu')
                            }
                         
        
                        }
                    });
                })
            }

            datamenumore()     



            $(document).on('click',".btndeletemormenu",function(){
    var val = $(this).val()
    $.ajax({ //create an ajax request to display.php
                        type: "get",
                        url: "removemoremenu",
                        async: false,
                        // dataType: 'json',
                        data: {

                            id: val,
                        },
                        success: function (response) {
                            datamenumore()   
                            Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'ลบสำเร็จ',
                })

                        }, error: function (response) {
                            datamenumore()   
                            Swal.fire({
                    icon: 'warning',
                    title: '',
                    text: 'ลบไม่สำเร็จ',
                })

                        }
                    });
})

$(document).on('keyup',".ip",function(){
    $(this).removeClass('alertbd')
})
    



        //   addmoremenu
        $(document).on('click', ".btnaddmoremenu", function () {
            var arrcheck = []
            $(".ip").each(function () {
                var val = $(this).val()
                if (val == "" || val == null) {
                    arrcheck.push(false)
                    $(this).addClass('alertbd')
                    
                } else {
                    arrcheck.push(true)
                }

            });
            if(arrcheck.includes(false)){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                })
            }else{
                var foodname = $('.addmenuname').val()
            var carbo = $('.addmenucarbo').val()
            var fat = $('.addmenufat').val()
            var protien = $('.addmenuprotien').val()
            var cal = $('.addmenucal').val()
            liff.getProfile().then(
                profile => {
                    $.ajax({ //create an ajax request to display.php
                        type: "get",
                        url: "addmoremenu",
                        async: false,
                        // dataType: 'json',
                        data: {

                            lineid: profile.userId,
                            carbo:carbo,
                            fat:fat,
                            protien:protien,
                            cal:cal,
                            type:"moremenu",
                            foodname:foodname
                        },
                        success: function (response) {
                            var data = Object.values(response)
                            Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'เพิ่มสำเร็จ',
                })
                datamenumore()
                        }
                    });
                })
            }
        })
        // 
        function getdata() {

            liff.getProfile().then(
                profile => {
                    $.ajax({ //create an ajax request to display.php
                        type: "get",
                        async: false,
                        url: "usereathistorydata",
                        //   dataType: 'json',  
                        data: {

                            lineid: profile.userId,
                        },
                        success: function (response) {
                            var data = Object.values(response)
                     
                            for (var i = 0; i < data.length; i++) {

                                if (data[i]['meal'] == 'breakfast') {
                                    $('.idbreakfast').val(data[i]['id'])
                                    $('.text-breakfast').empty().append(data[i]['foodname'] +
                                        "(" + data[i]['calorie'] + ")")
                                } else
                                if (data[i]['meal'] == 'lunch') {
                                    $('.text-lunch').empty().append(data[i]['foodname'] + "(" +
                                        data[i]['calorie'] + ")")
                                    $('.idlunch').val(data[i]['id'])
                                } else
                                if (data[i]['meal'] == 'dinner') {
                                    $('.text-dinner').empty().append(data[i]['foodname'] + "(" +
                                        data[i]['calorie'] + ")")
                                    $('.iddinner').val(data[i]['id'])
                                }
                            }
                        }
                    });



                    $.ajax({ //create an ajax request to display.php
                        type: "get",
                        url: "userdata",
                        dataType: 'json',
                        data: {
                            lineid: profile.userId,
                        },
                        success: function (response) {

                            if (response[0] != null && response[0] != "") {

                                $('#textmaxprotien').empty().append(response[0][0]['protien'] +
                                    " กรัม")
                                $('#textmaxcarbohydrate').empty().append(response[0][0][
                                    'carbohydrate'
                                ] + " กรัม")
                                $('#textmaxfat').empty().append(response[0][0]['fat'] + " กรัม")
                                $('#textmaxcal').empty().append(response[0][0][
                                    'lineuseridcalorie'
                                ] + " แคลอรี่")

                                var carbohydrate = response[1][0]['carbohydrate'] * 100 /
                                    response[
                                        0][0]['carbohydrate']
                                var protien = response[1][0]['protien'] * 100 / response[0][0][
                                    'protien'
                                ]
                                var fat = response[1][0]['fat'] * 100 / response[0][0]['fat']
                                var cal = response[1][0]['calorie'] * 100 / response[0][0][
                                    'lineuseridcalorie'
                                ]
                                if (response[1][0]['fat'] == null && response[1][0][
                                    'protien'] == null && response[1][0]['carbohydrate'] == null
                                    ) {
                                    var showcarbo = 0;
                                    var showprotien = response[1][0]['protien'] + 0;
                                    var showfat = response[1][0]['fat'] + 0;
                                    if (response[1][0]['calorie'] == null || response[1][0][
                                            'calorie'
                                        ] == "") {
                                        var showcalorie = response[1][0]['calorie'] + 0;
                                    } else {
                                        var showcalorie = response[1][0]['calorie'];
                                    }

                                } else {
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
                            } else {
                                $('.nodatacal').show()
                            }
                        }
                    });
                })
        }

        getdata()
        liff.getProfile().then(
            profile => {
                $.ajax({ //create an ajax request to display.php
                    type: "get",
                    url: "datausercalorie",
                    async: false,
                    dataType: 'json',
                    data: {

                        lineid: profile.userId,
                    },
                    success: function (response) {
                        var data = Object.values(response)
                        $('#calorie').val(data[0]['lineuseridcalorie'])
                    }
                });
            })


        $(document).on('click', ".btn-primary", function () {
             $('.modalmain').find('.food').val("")
            $('.modalmain').find('.calorie').val("")
           $('.mainmodalcarbo').val("")
            $('.mainmodalprotien').val("")
           $('.mainmodalfat').val("")

            var val = $(this).data("time");
            var text1 = $('.text-breakfast').text()
            var text2 = $('.text-lunch').text()
            var text3 = $('.text-dinner').text()
            var test

            if (val == 'breakfast' && text1 == "") {
                $('.modal').find('.btn-success').val(val)
            } else if (val == 'breakfast' && text1 != "") {
                var id = $('.idbreakfast').val()
                $('.modal').find('.btn-success').val(id)
            } else
            if (val == 'lunch' && text2 == "") {
                $('.modal').find('.btn-success').val(val)
            } else if (val == 'lunch' && text2 != "") {
                var id = $('.idlunch').val()
                $('.modal').find('.btn-success').val(id)
            } else
            if (val == 'dinner' && text3 == "") {
                $('.modal').find('.btn-success').val(val)
            } else if (val == 'dinner' && text3 != "") {
                var id = $('.iddinner').val()
                $('.modal').find('.btn-success').val(id)
            }
            //   if(text1 != "" || text1 != null){
            //       var id = $('.idbreakfast').val()
            //     $('.modal').find('.btn-success').val(id)
            //   }else if(text2 != "" || text1 != null){
            //     var id =$('.idlunch').val()
            //     $('.modal').find('.btn-success').val(id)
            //   }else if(text3 != "" || text1 != null){
            //     var id = $('.iddinner').val()
            //     $('.modal').find('.btn-success').val(id)
            //   }else{
            //     $('.modal').find('.btn-success').val(val)
            //   }
            if (val == 'breakfast') {
                $('.modal').find('.meal').empty().append('มื้อเช้า')
            } else if (val == 'lunch') {
                $('.modal').find('.meal').empty().append('มื้อกลางวัน')
            } else if (val == 'noon') {
                $('.modal').find('.meal').empty().append('มื้อเย็น')
            }
        })





        $(document).on('click', ".btn-success", function () {
            var foodname = $('.modalmain').find('.food').val()
            var calorie = $('.modalmain').find('.calorie').val()
            var carbo =$('.mainmodalcarbo').val()
            var protien = $('.mainmodalprotien').val()
            var fat = $('.mainmodalfat').val()
            console.log(carbo)
            var meal = $(this).val()
            $.ajax({ //create an ajax request to display.php
                type: "get",
                url: "usereathistoryadd",
                data: {
                    lineid: userid[0],
                    foodname: foodname,
                    calorie: calorie,
                    meal: meal,
                    fat:fat,
                    protien:protien,
                    carbo:carbo,
                },
                success: function (response) {
                    getdata()
                    Swal.fire({
                        icon: 'success',
                        title: 'บันทึกสำเร็จ',
                    })
                    $('.modalmain').modal('toggle')
                },
                error: function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    })
                }
            });
        })
    })
</script>
@endsection