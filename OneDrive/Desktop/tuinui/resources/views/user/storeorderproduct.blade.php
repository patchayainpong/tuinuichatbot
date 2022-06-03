@extends('layouts.applogin')
<link rel="stylesheet" href="{{asset('assets/css/user/storeorder.css')}}">
<style>
    .centered {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    /* img{
        border-radius:50% !important; 
    } */
</style>
@section('content')

<div class="container" style="height: 90vh">
    <div class="form row justify-content-center" style="">
        <div class="col-lg-5 text-center p-0 mb-2">
            <div class="card px-0  pb-0 " style="background: none;border:none;">
                <form id="msform" method="post" action="{{route('order')}}"> 
                    <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row text-center d-flex justify-content-center">
                                <div class="col-lg-4">
                                    <img class="rounded-corner" src="{{asset('uploads/storeimg/'.$orderdetail[0]->store_img)}}" alt="" style="width: 150px;height:150px;border-radius:50% !important;">
                                </div>
                                <div class="col-lg-6">
                                    <p class="centered" style="font-size: 25px;">{{$orderdetail[0]->storename}}</p>
                                    <input type="text" name="orderdetail[]" value="{{$orderdetail[0]->storeid}}" hidden>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="row">
                                         <div class="col-lg-12 d-flex justify-content-center">
                                    <img class="rounded-corner" src="{{asset('uploads/productimg/'.$orderdetail[0]->product_img)}}" alt="" style="width: 200px;height:200px;border-radius:10px">
                                </div>
                          
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body" style="overflow-y: auto;height:200px;">
                                            <p class="text-center" style="font-weight: bolder;font-size:26px" >รายละเอียด</p>
                                           <p class="text-center">{{$orderdetail[0]->productdetail}}</p> 
                                        </div>
                                    </div>
                                  
                                </div>
                               
                                <div class="col-lg-12 d-flex justify-content-center mt-3">
                                    <p style="font-size: 25px">{{$orderdetail[0]->productname}} ({{$orderdetail[0]->calorie}} แคลอรี่)</p>
                                    <input type="text" name="orderdetail[]" value="{{$orderdetail[0]->productname}}" hidden>
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




                        <div class="d-flex justify-content-center mt-5">
                            <div class="btn btn-primary page1">
                                ถัดไป
                            </div>
                        </div>
                        <button type="button"  class="next action-button nextpage1" hidden> </button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row ">
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
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <textarea class="" name="orderdetail[]" style="max-width:226px;width:100%;"> </textarea>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-center mt-5" style="">
                                    <div class="btn btn-secondary me-2">ย้อนกลับ</div>
                                    <div class="btn btn-primary ms-2">ยืนยัน</div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit"  class="next action-button"  hidden></button>
                        <button type="button"  class="previous action-button-previous" hidden></button>
                    </fieldset>
                    {{--
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset> --}}

                </form>
            </div>
        </div>
    </div>
</div>
{{-- @php
dd($orderdetail[0]->store_img)    
@endphp --}}
{{-- <div class="container">
    <div class="card" style="background: none;border:none;">
        <div class="card-body">

            <div class="row text-center d-flex justify-content-center">
                <div class="col-4">
                        <img class="rounded-corner" src="{{asset('uploads/storeimg/'.$orderdetail[0]->store_img)}}" alt="" style="width: 150px;height:150px;border-radius:50% !important">
</div>
<div class="col-6">
    <p class="centered">{{$orderdetail[0]->storename}}</p>
</div>
</div>
<div class="row mt-5">
    <div class="col-lg-12 d-flex justify-content-center">
        <img class="rounded-corner" src="{{asset('uploads/productimg/'.$orderdetail[0]->product_img)}}" alt="" style="width: 200px;height:200px;">
    </div>
    <div class="col-lg-12 d-flex justify-content-center mt-3">
        <p style="font-size: 25px">{{$orderdetail[0]->productname}}</p>
    </div>
</div>
</div>
</div>


</div> --}}
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