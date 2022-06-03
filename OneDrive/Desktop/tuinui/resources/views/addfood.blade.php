@extends('layouts.app')
<link rel="stylesheet" href="{{asset('assets/css/store/addfood.css')}}">
<style>
    .testipfile {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
    }

    .centered {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
@section('content')
<div class="container">
    <div class="mt-5">
        @if ($message = Session::get('success'))
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
                title: 'Upload successfully'
            })
        </script>
        @endif
        @if ($message = Session::get('error'))
        <script>
            var error = <?php echo json_encode($message[0][0]) ?> ;
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
                title: 'Upload failed Because' + error
            })
        </script>
        @endif
    </div>
    <form method="POST" action="{{route('addproduct')}}" enctype="multipart/form-data">
        @csrf
        <div class="row" style="max-height: 500px;height:94vh">
            <div class="col-lg-5 mt-5" style="">
                <div class="text-center centered">
                    <div class="d-flex justify-content-center">
                        <div>
                            <div class="card" style="max-width:300px;width:100%;padding:10px;height:300px">
                                <input class="testipfile" accept="image/*" name="product_img" type='file' id="imgInp" style="max-width: 300px;width:100%;height:300px" />
                                <img id="blah" src="" alt="Drag And Drop" style="max-width: 300px;width:100%;height:100%;display:none;" />
                            </div><br>
                            <div class="mb-3" >ประเภทไฟล์ : jpg png gif jpeg  ขนาดไม่เกิน 3mb</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="filename mt-2">ชื่อไฟล์</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 mt-4" style="">
                <div class="centered">
                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('ชื่อเมนู/ชื่อสินค้า') }}</label>
                        <div class="col-lg-6">
                            <input id="" type="text" class="form-control  ip" name="productname" value="" maxlength="50">
                        </div>
                    </div>
              
                    <div class="row mb-3">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('เนื้อสัตว์') }}</label>
                    <div class="col-lg-2">
                        <div class="input-group " style="width:100%">
                                <input id="meat" type="text" class="form-control  ip ingredients" data-type="meat" name="meat" value="" maxlength="3">
                                <span class="input-group-text" id="basic-addon2">กรัม</span>
                            </div>
                    </div>
                    <label for="name" class="col-lg-1 col-form-label text-md-right">{{ __('ข้าว') }}</label>
                    <div class="col-lg-2 mb-3" style="">
                        <div class="input-group " style="width:100%">
                                <input id="rice" type="text" class="form-control  ip ingredients" data-type="rice" name="rice" value="" maxlength="3">
                                <span class="input-group-text" id="basic-addon2">ทัพพี</span>
                            </div>
                    </div>
                    <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('น้ำมัน') }}</label>
                    <div class="col-lg-3">
                        <div class="input-group " style="width:100%">
                                <input id="oil" type="text" class="form-control  ip ingredients" data-type="oil" name="oil" value="" maxlength="3">
                                <span class="input-group-text" id="basic-addon2">ช้อนชา</span>
                            </div>
                    </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('แคลอรี่') }}</label>
                        <div class="col-lg-6">
                            <div class="input-group ">
                                <input id="calorie" type="text" class="form-control  ip" name="calorie" value="" maxlength="4" style="pointer-events: none;">
                                <span class="input-group-text" id="basic-addon2">แคลอรี่</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('รายละเอียดเมนู/สินค้า') }}</label>
                        <div class="col-lg-6">
                            <textarea id="" type="text" class="form-control  ip" name="productdetail" value="" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('ราคา') }}</label>
                        <div class="col-lg-6">
                            <div class="input-group ">
                                <input id="" type="text" class="form-control  ip price" name="price" value="" maxlength="3">
                                <span class="input-group-text" id="basic-addon2">บาท</span>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('โปรโมชั่น') }}</label>
                        <div class="col-lg-6">
                            <input id="" type="text" class="form-control  ip promotion" name="promotion" value="" maxlength="255">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label text-md-right"></label>
                        <div class="col-lg-6">
                            <div class="submitbtn btn btn-primary" style="width: 100%">เพิ่ม</div>
                        </div>
                    </div>
                    <button class="btnsubmit" type="submit" hidden></button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {

        var arrcal = [0,0,0]
        $(document).on('keyup',".ingredients",function(){
            var datatype = $(this).data('type')
            var val = $(this).val()
            console.log(datatype)
            if(datatype == "meat"){
                meatcal = val*4
                arrcal[0] = meatcal
            }else 
            if(datatype == "rice"){
                ricecal = val*18*4
                arrcal[1] = ricecal
            }else if(datatype == "oil") {
                oilcal = val*5*9
                arrcal[2] = oilcal
            }
            $('#calorie').val(arrcal[0]+arrcal[1]+arrcal[2])
          
        })
        var picturecheck = false;
        $(window).keydown(function(event) {
            var inputcheck = []
            $('.ip').each(function() {
                var val = $(this).val();
                if (val == '' || val == null) {
                    inputcheck.push('false');
                    // $('.ip').addClass('alertborder');
                }
            })
            if (event.keyCode == 13 && inputcheck.includes('false')) {
                $('.ip').each(function() {
                    var val = $(this).val();
                    if (val == '' || val == null) {
                        $('.ip').addClass('alertborder');
                    }
                })
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                })
                event.preventDefault();
                return false;
            }
            if (event.keyCode == 13 && picturecheck == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาอัพโหลดรูปภาพ',
                })
                event.preventDefault();
                return false;
            }
            if (event.keyCode == 13 && inputcheck.includes('false') != true && picturecheck != false) {
                $('.btnsubmit').click();
            }
        });
        $('.btnmenu').eq(1).addClass('navactive', 100);
        $(document).on('click', ".submitbtn", function() {
            var inputcheck = []
            $('.ip').each(function() {
                var val = $(this).val();
                if (val == '' || val == null) {
                    $(this).addClass('alertborder');
                    inputcheck.push('false');
                }
            })
            if (inputcheck.includes('false') == true) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                })
            } else
            if (picturecheck == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาอัพโหลดรูปภาพ',
                })
            } else if (inputcheck.includes('false') != true && picturecheck != false) {
                $('.btnsubmit').click();
            }
        });
        $(document).on('keyup', ".ip", function() {
            $(this).removeClass('alertborder');
        });
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        $(document).on('change', ".testipfile", function() {
            var filesize = this.files[0].size;
            var filename = $(this).val().split('\\').pop();
            var fielnamecheck = filename.split('.').pop();
            var type = ['jpg', 'png', 'gif', 'jpeg'];
            if (type.includes(fielnamecheck) != true && filesize > 3000000) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาเลือกไฟล์ใหม่อีกครั้ง ประเภทไฟล์ไม่ถูกต้องและขนาดของไฟล์ใหญ่เกินไป',
                })
                $(this).val('');
                $('.filename').empty().append('กรุณาเลือกไฟล์ใหม่อีกครั้ง ประเภทไฟล์ไม่ถูกต้องและขนาดของไฟล์ใหญ่เกินไป');
                $('#blah').attr('src', "").hide();
                picturecheck = false;
            } else if (type.includes(fielnamecheck) != true) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาเลือกไฟล์ใหม่อีกครั้ง ประเภทไฟล์ของไฟล์ไม่ถูกต้อง',
                })
                $(this).val('');
                $('.filename').empty().append('กรุณาเลือกไฟล์ใหม่อีกครั้ง ประเภทไฟล์ของไฟล์ไม่ถูกต้อง');
                $('#blah').attr('src', "").hide();
                picturecheck = false;
            } else if (filesize > 3000000) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาเลือกไฟล์ใหม่อีกครั้ง ขนาดของไฟล์ใหญ่เกินไป',
                })
                $(this).val('');
                $('.filename').empty().append('กรุณาเลือกไฟล์ใหม่อีกครั้ง ขนาดของไฟล์ใหญ่เกินไป');
                $('#blah').attr('src', "").hide();
                picturecheck = false;
            } else {
                picturecheck = true;
                $('.filename').empty().append(filename);
                $('#blah').show()
            }
        })
        $($('.ingredients')).keyup(function(event) {
            // format number
            function phoneFormat() {
                phone = phone.replace(/[^0-9]/g, '');
                return phone;
            }
            var phone = $(this).val();
            phone = phoneFormat(phone);
            $(this).val(phone);;
        });
        $($('.price')).keyup(function(event) {
            // format number
            function phoneFormat() {
                phone = phone.replace(/[^0-9]/g, '');
                return phone;
            }
            var phone = $(this).val();
            phone = phoneFormat(phone);
            $(this).val(phone);;
        });
    });
</script>
@endsection