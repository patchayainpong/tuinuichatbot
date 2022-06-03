@extends('layouts.app')

@section('content')
@if ($message = Session::get('deletesuccess'))
<script>
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
        title: 'delete successfully'
    })
</script>
@endif
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
  width: 100%; /* Full width */
  background-color: #ddd; /* Grey background */
}

.skills {
    height:50px;
 /* Right-align text */
  padding-top: 10px; /* Add top padding */
  padding-bottom: 10px; /* Add bottom padding */
  color: white; /* White text color */
}
.textbar{
    font-size: 24px;
    color: black;
    font-weight: bolder;
}
</style>

<div class="container-fluid">
    <div class="row d-flex justify-content-center  mt-3">
        <div class="col-md-12">
            <div class="card" style="border: none;background:none;">
                <div class="d-flex justify-content-center">
                    <div class="cardshowitem" style="width:100%">
                        <div class="row showitem ms-auto me-auto" style="width: 85%;overflow-x:auto;height:90vh;">
                            <div class="item col-lg-3 mt-3 " style=";display: none;">

                                {{-- <div class="text-center">
                                    <img src="" alt="" style="width:100%;max-width:300px;height:300px;border-radius: 78px;">
                                </div> --}}

                                <form method="get" action="{{route('productdetail')}}" enctype="multipart/form-data">
                                    <div class="card" style="width: 19rem;">
                                        <img class="card-img-top" src="..." alt="Card image cap" style="height: 240px">
                                        <div class="card-body">
                                            <div class="row">
                                                <!--<div class="col-auto">
                                                    <h5>ชื่อ</h5>
                                                </div>-->
                                                <div class="col-12 ">
                                                    <p class="card-title" style="font-size: 22px;"></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 ">
                                                    <p class="card-text me-4 ">แคลลอรี่ <label
                                                            class="card-detail"></label></p>

                                                </div>
                                            </div>








                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-primary ps-0 pe-0 btnmodal"
                                                        style="width: 100%" data-bs-toggle="modal"
                                                        data-bs-target="#detailfoodmodal">ดูเพิ่มเติม</button>
                                                </div>
                                                <div class="col-2">
                                                    <button name="productid" class="btn centered">
                                                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="30"
                                                            height="30" fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="col-2">
                                                    <button type="button" class="btn centered deleteproduct"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-trash-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                        </svg></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="text-center">
                                        <div class="row">
                                            <div class="col-6 ps-0 pe-0">
                                                <p class="centered text-end" style="font-size:20px;"></p>
                                            </div>
                                            <div class="col-2 ps-0 pe-0 text-end">
                                                <button name="productid" class="btn centered">
                                                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="col-2 ps-0 pe-0 text-start">
                                               <button type="button" class="btn centered deleteproduct"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg></button> 
                                            </div>
                                        </div>
                                    </div> --}}
                                </form>
                                {{-- <form id="deleteform" method="POST" action="{{route('productdelete')}}">
                                @csrf
                                <button id="deletebtn" type="submit" name="id" value="" hidden>
                                </button>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- moda; --}}
    <div class="modal fade" id="detailfoodmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดอาหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-2 text-end mt-2 mb-2">
                            <img src="{{ asset('uploads/icon/diet(1).png') }}" alt="" style="height: 60px;width:60px;">
                        </div>
                        <div class="col-4 text-start mt-2 mb-2">
                            <label style="font-size: 25px; centered" class="namelabel text-center "></label>
                        </div>
                        {{-- <div class="col-2 text-end mt-2 mb-2">
                            <img src="{{ asset('uploads/icon/smartphone.png') }}" alt=""
                                style="height: 60px;width:60px;">
                        </div> --}}
                        {{-- <div class="col-4 mt-2 mb-2">
                            <label style="font-size: 25px;" class="calorielabel centered"></label>
                        </div> --}}
                        <div class="col-2 text-end mt-2 mb-2">
                            <img src="{{ asset('uploads/icon/price-tag.png') }}" alt=""
                                style="height: 60px;width:60px;">
                        </div>
                        <div class="col-4 mt-2 mb-2">
                            <label style="font-size: 25px;" class="pricelabel centered"></label>
                        </div>
                        <div class="col-2 text-end mt-2 mb-2">
                            <img src="{{ asset('uploads/icon/apple.png') }}" alt="" style="height: 60px;width:60px;">
                        </div>
                        <div class="col-10 mt-2 mb-2">
                            <label style="font-size: 25px;" class="detaillabel centered"></label>
                        </div>
                        <div class="col-2 text-end mt-2 mb-2">
                            <img src="{{ asset('uploads/icon/promote.png') }}" alt="" style="height: 60px;width:60px;">
                        </div>
                        <div class="col-10 mt-2 mb-2">
                            <label style="font-size: 25px;" class="promotionlabel centered"></label>
                        </div>

                        <div class="row" style="">
                            <div class="col-12">
                            </div>
                            {{--  --}}
                            <div class="card mt-5 havedatacal"
                                style="border-radius:20px 20px 20px 20px; height:96%;border:none;">
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

                    {{-- <p class="text1"></p>
              
              <p class="text3"></p> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
</div>
<script>
    $(document).ready(function () {



        var product = <?php echo json_encode($product) ?> ;

        if (product.length != null) {
            for (var i = 0; i < product.length; i++) {
                var cloneitem = $('.item').first().clone();
                
                $(cloneitem).find('img').attr("src", "uploads/productimg/" + product[i]['product_img']);
                $(cloneitem).find('.card-title').empty().append(product[i]['productname']);
                $(cloneitem).find('button').val(product[i]['id']);
                $(cloneitem).fadeIn("slow").appendTo('.showitem');
                $(cloneitem).find('.card-detail').append(product[i]['calorie']);
             
            }
        }

        // uploads/productimg/"+product[i]['product_img


        $('.btnmenu').eq(0).addClass('navactive', 100);

        $(document).on('click', ".btnmodal", function () {
            var id = $(this).val()

            $.ajax({ //create an ajax request to display.php
                type: "POST",
                url: "homepagedetailfood",
                // datatype: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function (response) {
                    console.log(response)
                    $('.calorielabel').empty().append(response[0][0]['calorie'] +
                        " แคลอรี่")
                    $('.pricelabel').empty().append(response[0][0]['price'] + " บาท")
                    $('.namelabel').empty().append(response[0][0]['productname'])
                    $('.detaillabel').empty().append(response[0][0]['productdetail'])
                    $('.promotionlabel').empty().append(response[0][0]['promotion'])
                    var carbohydrate = response[0][0]['carbohydrate']*100/response[1]
                    var protien = response[0][0]['protien']*100/response[2]
                    var fat = response[0][0]['fat']*100/response[3]
                    var cal =response[0][0]['calorie']*100/response[4]
                    console.log(cal)
                    $('#textmaxprotien').empty().append('สูงสุด '+response[2]+" กรัม")
                    $('#textmaxcarbohydrate').empty().append('สูงสุด '+response[1]+" กรัม")
                    $('#textmaxfat').empty().append('สูงสุด '+response[3]+" กรัม")
                    $('#textmaxcal').empty().append('สูงสุด '+response[4]+" แคลอรี่")
                    $(".carbohydrate").css({"width": carbohydrate+"%","background-color": "#FFE194",});
                    $("#textcarbohydrate").empty().append(response[0][0]['carbohydrate']+"กรัม")
                    $(".protien").css({"width": protien+"%","background-color": "#FFE194",});
                    $("#textprotien").empty().append(response[0][0]['protien']+"กรัม")
                    $(".fat").css({"width": fat+"%","background-color": "#FFE194",});
                    $("#textfat").empty().append(response[0][0]['fat']+"กรัม")
                    $(".cal").css({"width": cal+"%","background-color": "#FFE194",});
                    $("#textcal").empty().append(response[0][0]['calorie']+"แคลอรี่")

                }
            });
            //     const detailarray = []
            //  var btnval = $(this).val()
            //  for (var i = 0; i < product.length; i++) {
            //      if(product[i]['id'] == btnval){
            //         detailarray.push(product[i]['productname']);
            //         detailarray.push(product[i]['calorie']);
            //         detailarray.push(product[i]['productdetail']);
            //         break
            //      }

            //   }
            // $('.text1').empty().append(detailarray[0])
            // $('.text2').empty().append(detailarray[1])
            // $('.text3').empty().append(detailarray[2])
        })

        $(document).on('click', ".deleteproduct", function () {
            var id = $(this).val()
            $.ajax({ //create an ajax request to display.php
                type: "POST",
                url: "productdelete",
                // datatype: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function (response) {
                    location.reload();
                }
            });
        })
    });
</script>
@endsection