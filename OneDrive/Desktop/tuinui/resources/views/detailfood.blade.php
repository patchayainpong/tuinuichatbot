@extends('layouts.app')
<link rel="stylesheet" href="{{asset('assets/css/store/detailfood.css')}}">
<style>
    .swal2-confirm {
        height: 50px !important;
        background: rgb(192, 54, 54) !important
    }
    .swal2-cancel {
        height: 50px !important;
        width: 100% !important;
    }
</style>
@section('content')
<div class="container">
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
    <form method="POST" action="{{route('updateproduct')}}" enctype="multipart/form-data">
        @csrf
        <div class="row" style="height: 90vh;background:">
            <div class="col-lg-5">
                <div class="text-center centered">
                    <div class="d-flex justify-content-center">
                        <div>
                            <div class="card" style="max-width:300px;width:100%;padding:10px;height:300px">
                                <input class="testipfile" accept="image/*" name="product_img" type='file' id="imgInp" style="max-width: 300px;width:100%;height:100%px" />
                                <img id="blah" src="{{asset('uploads/productimg/'.$productsdetail[0]['product_img'])}}" alt="Drag And Drop" style="max-width: 300px;width:100%;height:100%;" /> 
                            </div>
                            <div class="mb-3">Upload File Type: jpg png gif jpeg size in 3mb</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="filename mt-5">Filename</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="centered">
                    <div class="form-group row mb-0">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('ชื่อเมนู/ชื่อสินค้า') }}</label>
                        <div class="col-lg-7 testcol d-flex">
                            <input id="" type="text" class="form-control  ip" name="productname" value="{{$productsdetail[0]['productname']}}" style="width:100%:max-width:361px;" maxlength="50">
                            <p class=" testedit btn">    
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('เนื้อสัตว์') }}</label>
                    <div class="col-lg-2">
                        <div class="input-group " style="width: 100%;">
                                <input id="meat" type="text" class="form-control  ip ingredients" data-type="meat" name="meat" value="{{$productsdetail[0]['meat']}}" maxlength="3">
                                <span class="input-group-text" id="basic-addon2">กรัม</span>
                            </div>
                    </div>
                    <label for="name" class="col-lg-1 col-form-label text-md-right">{{ __('ข้าว') }}</label>
                    <div class="col-lg-2 mb-3">
                        <div class="input-group " style="width: 100%;">
                                <input id="rice" type="text" class="form-control  ip ingredients" data-type="rice" name="rice" value="{{$productsdetail[0]['rice']}}" maxlength="3">
                                <span class="input-group-text" id="basic-addon2">ทัพพี</span>
                            </div>
                    </div>
                    <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('น้ำมัน') }}</label>
                    <div class="col-lg-3">
                        <div class="input-group " style="width: 100%;">
                                <input id="oil" type="text" class="form-control  ip ingredients" data-type="oil" name="oil" value="{{$productsdetail[0]['oil']}}" maxlength="3">
                                <span class="input-group-text" id="basic-addon2">ช้อนชา</span>
                            </div>
                    </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('แคลอรี่') }}</label>
                        <div class="col-lg-7 d-flex">
                                    <input id="calorie" type="text" class="form-control  ip" name="calorie" value="{{$productsdetail[0]['calorie']}}" maxlength="4" style="">
                                <p class=" testedit btn">
                                  
                                </p>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('รายละเอียดเมนู/สินค้า') }}</label>
                        <div class="col-lg-7 d-flex">
                            <textarea id="" type="text" class="form-control  ip" name="productdetail" value="" style="" maxlength="500">{{$productsdetail[0]['productdetail']}}</textarea>
                             <p class="centered testedit btn"> </p>
                        </div>
                    </div>
                    <div class="form-group row mt-4 mb-0">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('ราคา') }}</label>
                        <div class="col-lg-7 d-flex">
                            <div class="input-group ">
                                <input id="" type="text" class="form-control  ip" name="price" value="{{$productsdetail[0]['price']}}" maxlength="3" style=""><span class="input-group-text" id="basic-addon2">บาท</span> 
                                </div>
                        </div>     
                        
                    </div>
                    <div class="form-group row mb-0">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('โปรโมชั่น') }}</label>
                        <div class="col-lg-7 d-flex">
                            <input id="" type="text" class="form-control  ip" name="promotion" value="{{$productsdetail[0]['promotion']}}" style="" maxlength="255">
                                           <p class="testedit btn"> </p>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="name" class="col-lg-4 col-form-label text-md-right"></label>
                        <div class="col-lg-6">
                            <button class="submitbtn btn btn-primary" name="id" value="{{$productsdetail[0]['id']}}" style="width: 100%">แก้ไข</button>
                        </div>
                    </div>
                    <div class="form-group row mb-0 mt-3">
                        <label for="name" class="col-lg-4 col-form-label text-md-right"></label>
                        <div class="col-lg-6">
                            <div class="deletebtn btn btn-danger" name="id" value="{{$productsdetail[0]['id']}}" style="width: 100%">ลบ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form method="POST" action="{{route('productdelete')}}">
        @csrf
        <button id="deletebtn" type="submit" name="id" value="{{$productsdetail[0]['id']}}" hidden>
        </button>
    </form>
</div>
<script>
    $(document).ready(function() {
        var arrcal = [0,0,0]
        $(document).on('keyup',".ingredients",function(){
            var meat = $('#meat').val();
            var rice = $('#rice').val();
            var oil =$('#oil').val()
              var  meatcal = meat*4
                arrcal[0] = meatcal
             var    ricecal = rice*18*4
                arrcal[1] = ricecal
               var oilcal =oil*5*9
                arrcal[2] = oilcal
            console.log(arrcal)
            $('#calorie').val(arrcal[0]+arrcal[1]+arrcal[2])
          
        })


        $('.btnmenu').eq(0).addClass('navactive', 100);
        $(document).on('click', ".testedit", function() {
            var val = $(this).closest('.form-group').find('.ip').val();
            $(this).closest('.form-group').find('.ip').focus().val('').val(val);
        });
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
            }
        })
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
                $('#blah').show();
            }
        }
        $($('.ip').eq(1)).keyup(function(event) {
            // format number
            function phoneFormat() {
                phone = phone.replace(/[^0-9]/g, '');
                return phone;
            }
            var phone = $(this).val();
            phone = phoneFormat(phone);
            $(this).val(phone);;
        });
        $($('.ip').eq(3)).keyup(function(event) {
            // format number
            function phoneFormat() {
                phone = phone.replace(/[^0-9]/g, '');
                return phone;
            }
            var phone = $(this).val();
            phone = phoneFormat(phone);
            $(this).val(phone);;
        });
        $(document).on('click', ".deletebtn", function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deletebtn').click();
                }
            })
        })
    })
</script>
@endsection