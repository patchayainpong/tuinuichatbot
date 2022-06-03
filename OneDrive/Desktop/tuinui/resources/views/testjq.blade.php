<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--  --}}
    <title>Document</title>
</head>
<style>
    .cfsuccess {
        border-bottom: 10px solid green
    }
    .cferror {
        border-bottom: 10px solid red
    }
    #myDiv {
    background: none;
    position: relative;
padding-left: 1px;
padding-right: 1px;
  z-index : 1;
}
@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
     }
}
</style>
<body>
        {{-- <div class="col-12 card1">
            <div class="card card1" style="background: white">
                <div class="card-body">
                    <div class="datafirst">
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ชื่อ</span>
                        <input type="text" class="form-control ip1" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">นามสกุล</span>
                        <input type="text" class="form-control ip2" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-danger">ลบ</button>
                    </div>
                    <div class="copyinsert">
                    </div>
                    <div class="d-flex justify-content-end"><button class="btn btn-primary adddata">เพิ่ม</button></div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-12 card2" >
        <div class="card" style="background: blue">
            <div class="card-body" >
 <h1>card2</h1>
            </div>
        </div>
    </div> --}}
<div class="container">
    <div class="row">
        <div class="d-flex" >
            <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">รหัสผ่าน</span>
        <div id="myDiv">

        
        <input type="text" class="form-control psw">
    </div>
    </div>  
        </div>
          
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">ยืนยันรหัสผ่าน</span>
        <input type="text" class="form-control ckpsw">
    </div> 
    <div class="statuspsw" style="font-size: 24px;"></div>
    <div class="lenghtpsw" style="font-size: 24px;"></div>
    </div>
    <button class="btn btn-primary btnsubmit">ยืนยัน</button>
   
</div>
</body>

<script>
    $(document).ready(function () {
//         $(function () {
//   $('[data-toggle="tooltip"]').tooltip()
// })
// $('.test').tooltip('toggle')
var pswstatus = false
var pswlengthstatus= false
$(document).on('keyup',".psw,.ckpsw",function(){
 var psw = $('.psw').val()
 var ckpsw = $('.ckpsw').val()
 var lengthpsw = $('.psw').val().length
 if(psw == "" || ckpsw == ""){
    $('.statuspsw').empty()
    pswstatus = false
 }else if(psw == ckpsw){
    $('#myDiv').append('<style> #myDiv::after {  content: ""; width: 10.2%;height: 38px;background:green;position: absolute;bottom:0px;left: 89.1%;border-radius: 5px;display: inline-block;animation: fadeInAnimation ease 0.3s;}</style>')
    pswstatus = true
 }else if (psw != ckpsw){
    $('.statuspsw').empty()
    pswstatus = false
 } 
 psw == ckpsw
 if(lengthpsw >= 8){
    $('.lenghtpsw').empty().append('เกิน8ตัวอักษร')
    pswlengthstatus= true
 }else if(lengthpsw < 8){
    $('.lenghtpsw').empty()
    pswlengthstatus= false
 }
})


$(document).on('click',".btnsubmit",function(){

    if(pswstatus == true && pswlengthstatus == true){
        Swal.fire({
  icon: 'success',
  title: 'สมัครสมาชิกสำเร็จ',
  text: 'กรูณาตรวจสอบอรเมล์และกดยืนยัน',
})
    }else if(pswstatus == false){
        Swal.fire({
  icon: 'error',
  title: 'รหัสผ่านไม่ตรงกัน',
  text: 'กรุณาตรวจสอบรหัสผ่านของท่าน',
})
    }else if (pswlengthstatus == false){
        Swal.fire({
  icon: 'error',
  title: 'รหัสผ่านต้องมากกว่า8ตัวอักษร',
  text: 'กรุณาตรวจสอบรหัสผ่านของท่าน',
})
    }
})
        // $(document).on('click',".adddata",function(){

        //     var copyinsertdata = $('.datafirst:first').clone()
        //     $(copyinsertdata).find('input').val('')
        //     $(copyinsertdata).appendTo('.copyinsert')
        // })
        // $('.card2').hide()








        // $('.t1,.t2').empty().append('Milk')


        // var text1 = $('.t1').text()
        // var text2 = $('.t2').text()

        // console.log(text2)



        // $(document).on('keyup',".ip2",function(){
        //         var  valip1  = $('.ip1').val()
        //         var  valip2  = $('.ip2').val()

        //         if(valip1 == valip2){   
        //             console.log('confirmpsw')
        //             $('.ip2').addClass('cfsuccess')
        //             $('.ip2').removeClass('cferror')
        //         }else if(valip2 == null || valip2 == ''){
        //             $('.ip2').removeClass('cfsuccess')
        //             $('.ip2').removeClass('cferror')
        //         }else{
        //             $('.ip2').addClass('cferror')
        //             $('.ip2').removeClass('cfsuccess')
        //         }

        // })
    })
</script>

</html>