@extends('layouts.app')

<link rel="stylesheet" href="{{asset('assets/css/store/historyorder.css')}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>

<style>
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
.menubtnat{
background: rgb(154, 154, 211) !important;
}
</style>
@section('content')

<div class="container mt-5">
   {{-- <div class="card pt-3" style="position:absolute;left:85%;height:44%;top:30.5%;width:260px;">
    <div class="row">
        <div class="col-12">
        </label><label for="" class="text-center" style="font-size: 20px;"><img src="{{ asset('uploads/icon/hot-deal.png') }}" alt="" style="height: 40px;width:40px;"> 10 อันดับเมนูขายดี <img src="{{ asset('uploads/icon/hot-deal.png') }}" alt="" style="height: 40px;width:40px;"></label>
       <div class="row mt-3">
        @foreach ($topten as $item)
            <div class="col-9 d-flex justify-content-center">
                <label for="">
                    {{$item->productname}}
                </label>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <label for="">
                    {{$item->total}}
                </label>
            </div>
        
        @endforeach
    </div>
        </div>
    </div>
       
   </div> --}}
 
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <label class="centered text-center" style="font-size:30px; "> สถิติยอดขายร้าน : {{auth()->user()->storename}}</label>
            </div>
        </div>
        
        <div class="col-12">
            <div class="row">
                <div class="col-auto d-flex justify-content-center ms-1 me-1 " style="padding:0px;"><button class="btn menubar menubtnat" style="border: 1px solid black; width:100%;max-width:100px;background:white;" data-menu="history">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16">
                        <path d="M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                      </svg>
                </button>
            </div>
                <div class="col-auto d-flex justify-content-center ms-1 me-1 " style="padding:0px;" >
                    <button class="btn menubar" style="border: 1px solid black; width:100%;max-width:100px;background:white;" data-menu="graph">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                    <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                  </svg></button>
                </div>
            </div>
        </div>
 <div class="history mt-4">


        <div class="col-12">
            <p class="centered text-center"> ชื่อเมนูอาหาร :</p>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <select class="form-select centered" data-select="productname" aria-label="Default select example" style="width:25%">
                <option selected>เมนูอาหาร</option>
            </select>
        </div>
    

    <div class="card-body pb-0">
        <div class="row text-center " style="border:1px solid black;background-image: linear-gradient(rgba(18, 197, 146, 0.4) 0%, rgba(33, 87, 194, 0.4) 100%  );">
            <div class="col-3 colheader ">
                <div class="text-center centered " >

                    <select class="form-select text-center dropdown1" size="1" aria-label="Default select example" style="color:#006185;"  >
                        <option selected>วว/ดด/ปป</option>
                    </select>
                </div>
            </div>
            <div class="col-3 colheader">
                <p class="text-center centered fc" style="color: black">ชื่อเมนู</p>
            </div>
            <div class="col-3 colheader">
                <p class="text-center centered fc" style="color: black">จำนวนที่ขายได้</p>
            </div>
            <div class="col-3 colheader">
                <p class="text-center centered fc" style="color: black">ราคา</p>
            </div>
        </div>
    </div>
    <div class="row text-center item" style="display:none;border:1px solid black">
        <div class="col-3 colitem ">
            <p class="text-center fc centered "></p>
        </div>
        <div class="col-3 colitem">
            <p class="text-center fc mt-2"></p>
            <p class="text-center fc " style="margin: 0px"></p>
        </div>
        <div class="col-3 colitem">
            <p class="text-center fc centered"></p>
        </div>
        <div class="col-3 colitem">
            <p class="text-center fc centered"></p>
        </div>
    </div>
<div class="showitem card-body pt-0" style="overflow-y:auto;height:600px">
    </div>
</div> 
    <div class="graphmenu" style="display:none;">
         <div class="row mt-3">
  
         
            <canvas id="myChart1" style="width: 100%;height:100%;"></canvas>
       
      
    </div>
    </div>
   </div>
</div>
<script>
   
    var product = <?php echo json_encode($graph) ?> ;
    var foodprice = []
    var foorname = []
    for (let i = 0; i < product.length; i++) {
        foodprice.push(product[i]['total']);
        foorname.push(product[i]['productname']);
}
// --------------------------------------------------------------------------------------------------------------
 //Chart-1
 const ctx1 = document.getElementById('myChart1').getContext('2d'); 
    const myChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: foorname,
            datasets: [{
                label: 'ชื่อเมนู',
                data: foodprice,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    $('.btnmenu').eq(2).addClass('navactive', 100);
    $(document).ready(function() {
        $(document).on('click',".menubar",function(){
      var datatype= $(this).data('menu');
        $('.menubar').removeClass('menubtnat')
        $(this).addClass('menubtnat')
        if(datatype == "history"){
            $('.history').show()
            $('.graphmenu').hide()
        }else{
            $('.history').hide()
            $('.graphmenu').show()
        }
    })



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
let productnamearr = []
let dmyarr = []
        function datahistory() {
            $.ajax({ //create an ajax request to display.php
                type: "POST",
                url: "dataorderhistory",
                datatype: 'json',
                // data: {
                //     storeid: idstore
                // },
                success: function(response) {
                    var datahistory = Object.values(response)
                    $('.showitem').empty();
                    if (datahistory.length != "0") {
                        for (var k = 0; k < datahistory.length; k++) {
                            var clone = $('.item').first().clone();
                            var date = datahistory[k]['created_at'];
                            var test = date.match(/.{1,10}/g)
                            $(clone).find('p').eq(0).empty().append(test[0]);
                            $(clone).find('p').eq(1).empty().append(datahistory[k]['productname']);
                            if (datahistory[k]['promotion'] == null || datahistory == "") {
                                $(clone).find('p').eq(2).empty().append('-');
                            } else {
                                $(clone).find('p').eq(2).empty().append('+' + datahistory[k]['promotion']);
                            }
                            $(clone).find('p').eq(3).empty().append(datahistory[k]['total'] + ' ' + 'รายการ');
                            $(clone).find('p').eq(4).empty().append(datahistory[k]['price']);
                            $(clone).appendTo('.showitem').show();
                            
                            if (productnamearr.includes(datahistory[k]["productname"]) == false) {
                                productnamearr.push(datahistory[k]["productname"])
                                $(".form-select").eq(0).append(new Option(datahistory[k]["productname"], datahistory[k]["productname"]));
                            }
                            if(dmyarr.includes(test[0]) == false){
                                dmyarr.push(test[0])
                                $(".form-select").eq(1).append(new Option(test[0], test[0]));
                            }
                            
                        }
                        // for (var i = 0; i < datahistory.length; i++) {
                            
                        //     if ()
                        // }
                    }
                }
            });
        }
        datahistory() 
        $(document).on('change', ".form-select", function() {
            var data = $(this).attr('data-select');
            var productname =$('.form-select').eq(0).val();
            var dmy =$('.form-select').eq(1).val();
        if(productname == "เมนูอาหาร" && dmy == "วว/ดด/ปป"){
            $('.item').not('.item:first').fadeIn()
        }else{
            $('.item').hide()
            $('.item').each(function( i ) {
                if(productname != "" && dmy == "วว/ดด/ปป"){

                      if($(this).find('p').eq(1).text() != productname){
                    $(this).fadeOut()
                }else{
                    $(this).fadeIn()
                }

                }else 
                
                if(productname == "เมนูอาหาร" && dmy != "วว/ดด/ปป"){

                    if($(this).find('p').eq(0).text() != dmy){
                    $(this).fadeOut()
                }else{
                    $(this).fadeIn()
                }

                }else if(productname != "เมนูอาหาร" && dmy != "วว/ดด/ปป"){

                    if($(this).find('p').eq(0).text() != dmy || $(this).find('p').eq(1).text() != productname){
                    $(this).fadeOut()
                }else{
                    $(this).fadeIn()
                }
                } 
              
            });
        }
                // if(productname == "เมนูอาหาร" && dmy == "วว/ดด/ปป"){
                //     datahistory() 
                // }else{
                //     $('.showitem').empty();
                //     $.ajax({ 
                //         type: "POST",
                //         url: "historydata",
                //         datatype: 'json',
                //         data: {
                //             productname: productname,
                //             dmy:  dmy
                //         },
                //         success: function(response) {
                //             var datahistory = Object.values(response)
                            
                //             if (datahistory.length != "0") {
                //                 for (var k = 0; k < datahistory.length; k++) {
                //                     var clone = $('.item').first().clone();
                //                     var date = datahistory[k]['created_at'];
                //                     var test = date.match(/.{1,10}/g)
                //                     $(clone).find('p').eq(0).empty().append(test[0]);
                //                     $(clone).find('p').eq(1).empty().append(datahistory[k]['productname']);
                //                     if (datahistory[k]['promotion'] == null || datahistory == "") {
                //                         $(clone).find('p').eq(2).empty().append('-');
                //                     } else {
                //                         $(clone).find('p').eq(2).empty().append('+' + datahistory[k]['promotion']);
                //                     }
                //                     $(clone).find('p').eq(3).empty().append(datahistory[k]['total'] + ' ' + 'รายการ');
                //                     $(clone).find('p').eq(4).empty().append(datahistory[k]['price']);
                //                     $(clone).appendTo('.showitem').show();
                //                 }
                //             }
                //         }
                //     }); 
                // }
                   
        })
    })
</script>
@endsection