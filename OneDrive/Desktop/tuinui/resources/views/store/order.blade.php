@extends('layouts.app')
<link rel="stylesheet" href="{{asset('assets/css/store/order.css')}}">
@section('content')
<div class="container mt-5">
    <div class="row " style="height: 50px">
        <div class="col-2 col-header">
            <p class="text-center centered" style="color:#006185;font-weight:bolder;font-size:20px;">รหัสออเดอร์</p>
        </div>
        <div class="col-2 col-header">
            <p class="text-center centered" style="color:#006185;font-weight:bolder;font-size:20px;">รายการอาหาร</p>
        </div>
        <div class="col-5 col-header">
            <p class="text-center centered" style="color:#006185;font-weight:bolder;font-size:20px;">ข้อมูลลูกค้า</p>
        </div>
        <div class="col-1 col-header">
            <p class="text-center centered" style="color:#006185;font-weight:bolder;font-size:20px;">ราคา</p>
        </div>
        <div class="col-2 col-header">
            <p class="text-center centered" style="color:#006185;font-weight:bolder;font-size:20px;">สถานะอาหาร</p>
        </div>
    </div>
    <div class="row item" style="display: none;">
        <div class="col-2 ">
            <p class="text-center centered"></p>
        </div>
        <div class="col-2 foodname">
            
        </div>
        <div class="col-5 " style="min-height:100px">
            <div class="row centered" style="border: none !important;">
                <div class="col-4 colnoborder text-end">
                    <label class="" style="color: green;font-weight:bolder;">Status :</label>
                </div>
                <div class="col-8">
                    <p class="text-start centered" style="font-weight:bolder;"></p>
                </div>
                {{-- <div class="col-4 colnoborder text-end">
                    <label class="" style="color: green;font-weight:bolder;disply:none;">Line Name :</label>
                </div>
                <div class="col-8">
                    <p class="text-start centered" style="font-weight:bolder;"></p>
                </div> --}}

                <div class="col-4 colnoborder text-end">
                    <label class="" style="color: green;font-weight:bolder;">ชื่อ-นามสกุล :</label>
                </div>
                <div class="col-8">
                    <p class="text-start centered" style="font-weight:bolder;"></p>
                </div>
                <div class="col-4 colnoborder text-end">
                    <label class="" style="color: green;font-weight:bolder;">เบอร์ติดต่อ :</label>
                </div>
                <div class="col-8">
                    <p class="text-start centered" style="font-weight:bolder;"></p>
                </div>
                <div class="col-4 colnoborder text-end">
                    <label class="" style="color: green;font-weight:bolder;">ที่อยู่จัดส่ง :</label>
                </div>
                <div class="col-8">
                    <p class="text-start centered" style="font-weight:bolder;"></p>
                </div>
                <div class="col-4 colnoborder text-end">
                    <label class="" style="color: green;font-weight:bolder;">ข้อมูลเพิ่มเติม :</label>
                </div>
                <div class="col-auto">
                    <p class="text-start centered" style="font-weight:bolder;"></p>
                </div>
            </div>
        </div>
        <div class="col-1">
            <p class="text-center centered"></p>
        </div>
        <div class="col-2">
            <div class="text-center centered">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary me-1" style="width: 150px;height:60px;font-size:19px">รับออเดอร์</button>
                    <button class="btn btn-danger" style="width: 100px;height:60px;font-size:19px;">ยกเลิก</button>
                </div>
                <button class="btn btn-success" style="width: 200px;height:60px;font-size:19px;">ยืนยันออเดอร์เสร็จสิ้น</button>
            </div>
        </div>
    </div>
    <div class="showitem">
    </div>
</div>
<script>
    $(document).ready(function() {
        var idstore = '<?=auth()->user()->id?>';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function order() {

            $.ajax({ //create an ajax request to display.php
                type: "POST",
                url: "datastoreorder",
                datatype: 'json',
                data: {
                    storeid: idstore
                },
                success: function(response) {
                    
                    var dataorder = Object.values(response)
                    console.log(dataorder[0])
                    $('.showitem').empty();
                    for (var i = 0; i < dataorder[0].length; i++) {
                        if (dataorder[0][i]['status'] != "success" && dataorder[0][i]['status'] != "cancelled") {
                           var dataid = dataorder[0][i]['orderid']
                            var clone = $('.item').first().clone();
                            $(clone).find('p').eq(0).empty().append("000" + dataorder[0][i]['id']);
                            // $(clone).find('p').eq(1).empty().append(dataorder[0][i]['productname']);
                            $(clone).attr('data-order', dataorder[0][i]['orderid'])
                            if (dataorder[0][i]['deliverytype'] == "delivery") {
                                for(var j=0; j < dataorder[1].length; j++){
                                    // if(dataorder[1][j]['orderid'] == dataid){
                                    //    console.log('test'+dataorder[1][j]['orderid'])
                                    // }
                                    if(dataorder[0][i]['orderid'] == dataorder[1][j]['orderid'] ){
                                        console.log('test'+dataorder[1][j]['productname'])
                                        $(clone).find('.foodname').append("<div class='text-center'>"+dataorder[1][j]['productname']+"<label>จำนวน("+dataorder[1][j]['total']+")</label></div>")
                                    }
                                }
                                $(clone).find('p').eq(1).empty().append("ส่งเดลิเวอร์รี่");
                                $(clone).find('p').eq(2).empty().append(dataorder[0][i]['customername']);
                                $(clone).find('p').eq(3).empty().append(dataorder[0][i]['customerphone']);
                                $(clone).find('p').eq(4).empty().append(dataorder[0][i]['customeraddress']);
                                if (dataorder[0][i]['customerinformation'] == null || dataorder[0][i]['customerinformation'] == "") {
                                    $(clone).find('p').eq(5).empty().append('-')
                                } else {
                                    $(clone).find('p').eq(5).empty().append(dataorder[0][i]['customerinformation']);
                                }
                                $(clone).find('p').eq(6).empty().append(dataorder[0][i]['totalprice']);
                            } 
                    else {
                                $(clone).find('p').eq(2).empty().append("รับอาหารเองที่ร้าน");
                                $(clone).find('p').eq(3).empty().append(dataorder[0][i]['customername']);
                                $(clone).find('.col-3:eq(2), .col-3:eq(3), .col-3:eq(4),.col-3:eq(5)').remove();
                                if (dataorder[0][i]['customerinformation'] == null || dataorder[0][i]['customerinformation'] == "") {
                                    $(clone).find('p').eq(7).empty().append('-')
                                } else {
                                    $(clone).find('p').eq(7).empty().append(dataorder[0][i]['customerinformation']);
                                }
                                $(clone).find('p').eq(8).empty().append(dataorder[0][i]['totalprice']);
                            }
                            if (dataorder[0][i]['status'] == "waitingfororder") {
                                $(clone).find('.btn-primary').val(dataorder[0][i]['orderid']).show();
                                $(clone).find('.btn-primary').attr('databutton', 'accept');
                                $(clone).find('.btn-danger').val(dataorder[0][i]['orderid']).show();
                                $(clone).find('.btn-danger').attr('databutton', 'delete');
                                $(clone).find('.btn-success').val(dataorder[0][i]['orderid']).hide()
                                $(clone).find('.btn-success').attr('databutton', 'success');
                            } else {
                                $(clone).find('.btn-primary').remove();
                                $(clone).find('.btn-danger').remove();
                                $(clone).find('.btn-success').val(dataorder[0][i]['orderid']).show();
                                $(clone).find('.btn-success').attr('databutton', 'success');
                            }
                            $(clone).show().appendTo('.showitem');
                        }

                    }
                    console.log(dataid)
                }
            });
        }
        order()

        function alertborder() {
            $.ajax({ //create an ajax request to display.php
                type: "POST",
                url: "datastoreorder",
                datatype: 'json',
                data: {
                    storeid: idstore
                },
                success: function(response) {
                    var dataorder = Object.values(response)
                    var alertorder = 0;

                    if (dataorder[0].length == 0) {
                        $('label').eq(0).empty().append(0)
                    } else {
                        for (var i = 0; i < dataorder[0].length; i++) {

                            if (dataorder[0][i]['status'] != "success" && dataorder[0][i]['status'] != "cancelled") {
                                alertorder++
                            }
                        }
                        $('label').eq(0).empty().append(alertorder)
                    }

                }
            });
        }
        alertborder()
        $('.btnmenu').eq(4).addClass('navactive', 100);
        // Pusher.logToConsole = true;
        var pusher = new Pusher('beb29d7a1bf5bfe57fe3', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('store' + idstore);
        channel.bind('orderproduct', function(data) {
            order()
        });

        $(document).on('click', ".btn", function() {
            var btntype = $(this).attr('databutton');
            var btnval = $(this).val();

            if (btntype == "accept") {
                $(this).closest('.col-2').find('.btn-success').show();
                $(this).closest('.d-flex').remove();

                $.ajax({ //create an ajax request to display.php
                    type: "POST",
                    url: "acceptorder",
                    // datatype: 'json',
                    data: {
                        id: btnval
                    },
                    success: function(response) {}
                })
            } else
            if (btntype == "success") {
                $.ajax({ //create an ajax request to display.php
                    type: "get",
                    url: "successorder",
                    // datatype: 'json',
                    data: {
                        id: btnval
                    },
                    success: function(response) {
                        order()
                        alertborder()
                    }
                })
            } else
            if (btntype == "delete") {
                $.ajax({ //create an ajax request to display.php
                    type: "POST",
                    url: "cancelorder",
                    // datatype: 'json',
                    data: {
                        id: btnval
                    },
                    success: function(response) {
                        order()
                        alertborder()
                    }
                })
            }

        });
    });
</script>
@endsection