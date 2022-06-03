<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link rel = "icon" href = 
"https://tuinui.xyz/uploads/logoweb/logotitlenew.png" 
        type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap 5.0.1 CSS -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-icons.css')}}">
    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.js')}}"></script>
    <!-- Jquery 3.6.0 -->
    <script src="{{asset('assets/jquery/jquery-3.6.0.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/css/auth/register.css')}}">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-5 ps-0 pe-0">
            <div class="card"  style="background-image:url({{url('assets/img/login2.png')}});background-repeat: no-repeat;  background-size: 100% 100%;  height:100vh;  width: 100%;border-radius:0px !important;border:none !important;" > </div>
        </div>
            <div class="col-md-7 ps-0 pe-0 ">
                <div class="card" style="border:none !important;border-radius:0px !important;height: 100%;">
                    <div class="card-header"style="background:#D3D3D3"><h5>สมัครสมาชิก</h5> </div>   
                    <div class="card-body " style="background: #F5F5F5">
        
                        <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mt-2">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('โลโก้หรือรูปร้าน') }}</label>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center">
                                        <div class="card" style="max-width:300px;width:100%;padding:10px;height:300px">
                                            <input class="testipfile" accept="image/*" name="product_img" type='file' id="imgInp" style="max-width: 300px;width:100%;height:300px;height:100%"/>
                                            <img id="blah" src="" alt="Drag And Drop" style="max-width: 300px;width:100%;max-height:300px;height:100%" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อร้าน') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('storename') is-invalid @enderror" style="border-radius: 0px" name="storename" value="{{ old('storename') }}" required autocomplete="storename" maxlength="100" autofocus>
                                        @error('storename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="businessowner" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อเจ้าของร้าน') }}</label>
                                    <div class="col-md-6">
                                        <input id="businessowner" type="text" class="form-control @error('businessowner') is-invalid @enderror" style="border-radius: 0px" name="businessowner" value="{{ old('businessowner') }}" required autocomplete="name" maxlength="50" autofocus>
                                        @error('businessowner')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone_number') is-invalid @enderror" style="border-radius: 0px" name="phone_number" value="" required autocomplete="phone" autofocus maxlength="12">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('ที่อยู่ร้าน') }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" style="border-radius: 0px" name="address" value="" required autocomplete="address" autofocus maxlength="100">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('อีเมล์') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" style="border-radius: 0px" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="50">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>
                                <div class="col-md-6">
                                    <div id="myDiv">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="border-radius: 0px" name="password" required autocomplete="new-password">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                            </div>
                            <div class="col-lg-8">
                                <div class="card" style="max-width:400px;background:none;border:none;font-weight:bold">
                                    <div class="row">
                                        <div class="col-lg-auto ms-2 me-2 ps-0 pe-0">
                                            <div id="upper" class="text-center" style="color:red" >1ตัวอักษรตัวพิมพ์ใหญ่</div>
                                        </div>
                                        <div class="col-lg-auto ms-2 me-2 ps-0 pe-0">
                                            <div id="lower" class="text-center "style="color:red" >1ตัวอักษรตัวพิมพ์เล็ก</div>
                                        </div>
                                        <div class="col-lg-auto ms-2 me-2 ps-0 pe-0">
                                            <div id="num" class="text-center"style="color:red">1ตัวเลข</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-auto ms-2 me-2 ps-0 pe-0">
                                            <div id="special" class="text-center"style="color:red">1อักขระพิเศษ</div>
                                        </div>
                                        <div class="col-lg-auto ms-2 me-2 ps-0 pe-0">
                                            <div id="more8" class="text-center"style="color:red">มากกว่า8ตัวอักษร</div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>
                                <div class="col-md-6">
                                    <div id="myDivcfpassword">
                                        <input id="password-confirm" type="password" class="form-control" style="border-radius: 0px" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4"> </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-center">
                                        <div class="btn btn-primary btncheck">
                                            สมัครสมาชิก
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Submitbtn hidden --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btnsubmit" hidden>
                                        {{ __('สมัครสมาชิก') }}
                                    </button>
                                </div>
                            </div>
                            {{-- --}}
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var passwordsubmit = false;
        var passwordchecksubmit = false;
        // submit register
        $(document).on('click', ".btncheck", function() {
            var inputcheck = []
            $('input').each(function() {
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
                    text: 'กรุณากรอกข้อมูลให้ครบถ้วนและอัพโหลดรูปร้านหรือแบรนด์ร้าน',
                })
            }
            if (inputcheck.includes('false') == false && passwordchecksubmit == true && passwordsubmit == true) {
                $('.btnsubmit').click();
            }
        });
        // 

        // inputremovealert
        $(document).on('keyup', "input", function() {
            $(this).removeClass('alertborder');
        });


        var passwordcheck = '';
        var passwordconfirm = '';
        // password check
        $('#password').on("keyup", function(test) {
            var password = $('#password').val();
            passwordcheck = password;
            // percent
            var percent = 0;
            if (password.length >= 8) {
                percent = percent + 20;
                $('#more8').addClass('coloractive');
            } else {
                $('#more8').removeClass('coloractive');
            }

            if (password.match(/[A-Z]/)) {
                percent = percent + 20;
                $('#upper').addClass('coloractive');
            } else {
                $('#upper').removeClass('coloractive');
            }

            if (password.match(/[a-z]/)) {
                percent = percent + 20;
                $('#lower').addClass('coloractive');
            } else {
                $('#lower').removeClass('coloractive');
            }

            if (password.match(/\d/)) {
                percent = percent + 20;
                $('#num').addClass('coloractive');
            } else {
                $('#num').removeClass('coloractive');
            }

            if (password.match(/^[a-zA-Z0-9- ]*$/)) {

                $('#special').removeClass('coloractive');

            } else {
                percent = percent + 19.2;
                $('#special').addClass('coloractive');
            }
            // 
            // colorchange
            if (percent >= 0 && percent <= 20) {
                var color = '#FF0000';
                passwordsubmit = false;

            } else if (percent > 20 && percent < 80) {
                var color = '#FFFF00';
                passwordsubmit = false;
            } else if (percent > 80) {
                var color = '#008000';
                passwordsubmit = true;
            }
            // 
            // confirm passwordcheck
            if (passwordcheck == passwordconfirm && passwordconfirm != '') {
                $('#myDivcfpassword').append('<style> #myDivcfpassword::after {  content: ""; width:99.2%;height:2px;background:#008000;position: absolute;bottom:0px;left: 1;}</style>');
                passwordchecksubmit = true;
            } else if (passwordcheck != passwordconfirm && passwordconfirm != '') {
                $('#myDivcfpassword').append('<style> #myDivcfpassword::after {  content: ""; width:99.2%;height:2px;background:#FF0000;position: absolute;bottom:0px;left: 1;}</style>');
                passwordchecksubmit = false;
            } else if (passwordcheck == '') {
                $('#myDivcfpassword').append('<style> #myDivcfpassword::after {  content: ""; width:0%;height:2px;background:#008000;position: absolute;bottom:0px;left: 1;}</style>');
                passwordchecksubmit = false
            }
            // 
            if (password == '' || password == null) {
                $('#myDiv').append('<style> #myDiv::after {  content: ""; width:0%;height:2px;background:;position: absolute;bottom:0px;left: 1px;}</style>');
            } else {
                $('#myDiv').append('<style> #myDiv::after {  content: ""; width:' + percent + '%;height:2px;background: ' + color + ';position: absolute;bottom:0px;left: 1px;}</style>');
            }


        });
        // 
        $(document).on('keyup', "#password-confirm", function() {
            var passwordcf = $(this).val();
            passwordconfirm = passwordcf;
            if (passwordcheck == passwordcf && passwordcheck != '') {
                $('#myDivcfpassword').append('<style> #myDivcfpassword::after {  content: ""; width:99.2%;height:2px;background:#008000;position: absolute;bottom:0px;left: 1;}</style>');
                passwordchecksubmit = true;
            } else if (passwordcf == '' || passwordcf == null) {
                $('#myDivcfpassword').append('<style> #myDivcfpassword::after {  content: ""; width:0%;height:2px;background:#008000;position: absolute;bottom:0px;left: 1;}</style>');
                passwordchecksubmit = false;
            } else if (passwordcf != passwordcheck && passwordcheck != '') {
                $('#myDivcfpassword').append('<style> #myDivcfpassword::after {  content: ""; width:99.2%;height:2px;background:#FF0000;position: absolute;bottom:0px;left: 1;}</style>');
                passwordchecksubmit = false
            }
        });

        // phone number onlynumber
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
        // 


        // FileIMG
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
                $('#blah').show();
            }
        }
            $('#blah').attr('src', "").hide();
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
        // 
    });
</script>
