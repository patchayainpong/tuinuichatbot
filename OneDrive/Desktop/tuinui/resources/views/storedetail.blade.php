@extends('layouts.app')
<link rel="stylesheet" href="{{asset('assets/css/store/storedetail.css')}}">
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
            title: 'Edit Successfully'
        })
    </script>
    @endif
    @if ($message = Session::get('error'))
    <script>
        var error = < ? php echo json_encode($message[0][0]) ? > ;
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

    <form method="POST" action="{{route('storeupdate')}}" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5" style="height: 90vh;background:">
            <div class="col-lg-5">
                <div class="text-center centered">
                    <div class="d-flex justify-content-center">
                        <div>
                            
                            <div class="card" style="max-width:300px;width:100%;padding:10px;height:300px;">
                                <input class="testipfile" accept="image/*" name="product_img" type='file' id="imgInp" style="max-width: 300px;width:100%;height:100%" />
                                <img id="blah" src="{{asset('uploads/storeimg/'.auth()->user()->store_img)}}" alt="" style="max-width: 300px;width:100%;height:100%" />
                            </div><br>
                            <div class="mb-3">Upload File Type: jpg png gif jpeg size in 3mb</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="filename mt-5"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="centered">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('StoreName') }}</label>
                        <div class="col-md-7 d-flex testcol">

                            <input id="" type="text" class="form-control  ip" name="storename" value="{{auth()->user()->storename}}" style="" maxlength="100">
                           
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phonenumber') }}</label>
                        <div class="col-md-7">
                            <div class="input-group ">
                                <input id="calorie" type="text" class="form-control  ip" name="phone_number" value="{{auth()->user()->phone_number}}" maxlength="12" style="">
                                
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-7 d-flex">
                            <textarea id="" type="text" class="form-control  ip" name="address" value="" style="" maxlength="100">{{auth()->user()->address}}</textarea>
                            
                            </div>

                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <button type="submit" class="submitbtn btn btn-primary" value="" style="width: 100%">อัพเดท</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('.btnmenu').eq(3).addClass('navactive', 100);
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
    });
</script>
@endsection