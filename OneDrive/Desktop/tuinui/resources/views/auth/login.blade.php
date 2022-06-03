<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- Bootstrap 5.0.1 CSS -->
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-icons.css')}}">
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
{{-- Sweet Alert --}}
<link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
<script src="{{asset('assets/sweetalert2/dist/sweetalert2.js')}}"></script>
<!-- Jquery 3.6.0 -->
<script src="{{asset('assets/jquery/jquery-3.6.0.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/css/store/login.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        height: 100%;
        margin: 0px
    }
    html{height:100%}
    .bgbody{
    background: rgb(192,216,192);
background: linear-gradient(139deg, rgba(192,216,192,0.5) 0%, rgba(245,238,220,0.5) 35%, rgba(221,74,72,0.5) 65%, rgba(236,179,144,0.5) 100%);

}
.bgpicture{
    background-image:url("assets/img/login2.png") ;
    background-repeat: no-repeat;
    background-size: 100% 100%;  
    /* height:100vh;  
    width: 100%; */
    /* background-image:url({{url('assets/img/login2.png')}});background-repeat: no-repeat;   */
}
@media screen and (max-height: 1000px) /* height >= 820 px */
{
   /* .itemhide{
       display: none;
   } */
   .colright{
       padding-right:10px !important; 
       padding-left:10px !important; 
   }
   .colleft{
       padding-left:10px !important; 
       padding-right:10px !important; 
   }

}
</style>
<body class="bgbody" style="padding: 5%">
    <div class="card cardmobile" style="height: 100%;box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
        <div class="row " style="height: 100%">
            <div class="col-lg-5 colleft pe-0 itemhide" >
                <div class="card bgpicture" style="height:100%; border:none;">
                
                </div>
            </div>
            <div class="col-lg-7 colright ps-0" >
                <div class="card" style="height:100%; border:none;background:
                rgb(245, 238, 220,0.5)"">
                    <div class="card-body">
                         <form class="centered mobileview" method="POST" action="{{ route('login') }}">
                        @csrf
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <h1 class="text-center">เข้าสู่ระบบ</h1>
                        <div class="d-flex justify-content-center">
                
                            <div class="form-group row ip">
                                <h5 class="ps-0 pe-0">อีเมล์</h5>
                               
                                <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus maxlength="50">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-group row ip">
                                <h5 class="ps-0 pe-0">รหัสผ่าน</h5>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" maxlength="255">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}

                                    {{-- <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label> --}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row  text-center">
                            <div class="col">
                                <button type="submit" class="btn btn-primary loginbtn" style="">
                                    {{ __('เข้าสู่ระบบ') }}
                                </button>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-6 d-flex justify-content-end">
                                <div class="text-center mt-1" > 
                                    <a class="btn btn-link"style="text-decoration: none;"  href="{{ route('register') }}">
                                    <font color="#ce0000" size=4> {{ __('สมัครสมาชิก !!') }}</font></a> 
                                </div>   
                            </div>
                            <div class="col-6 d-flex justify-content-start">
                                <div class="text-center mt-1" > @if (Route::has('password.request'))
                                    <a class="btn" style="border:none;text-decoration:none;background:none;" data-bs-toggle="modal" data-bs-target="#modalforgetpassword">
                                        <font color="#ce0000" size=4> {{ __('ลืมรหัสผ่าน') }}</font>
                                    </a>
                           
                                    @endif
                                </div>
                            </div>    
                        </div>
                    </form>
                    </div>
                   
                </div>
            </div>
        </div>

        {{-- <div class="row" style="height: 100%;">
            <div class="col-lg-5 itemhide  pe-0 "> 
                <div class="card bgpicture" style="height:100%;border-radius:0px;border:none;">
                    <div class="card borderleft" style="height:100%;border-radius:0px;background:none;">
                        <h1 style="color: red"></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 ps-0 ">
                <div class="card" style="height:100%;border-radius:0px;border:none;background:
                rgb(245, 238, 220,0.5)">
                    <div class="card borderright" style="height:100%;border-radius:0px;background:none;">
                        <form class="centered mobileview" method="POST" action="{{ route('login') }}">
                            @csrf
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
    
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <h1 class="text-center">Login</h1>
                            <div class="d-flex justify-content-center">
                                <div class="form-group row ip">
                                    <h5 class="ps-0 pe-0">Email</h5>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror ip" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
    
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-group row ip">
                                    <h5 class="ps-0 pe-0">Password</h5>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror ip" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row  text-center">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary loginbtn" style="">
                                        {{ __('เข้าสู่ระบบ') }}
                                    </button>
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="text-center mt-1" > 
                                        <a class="btn btn-link"style="text-decoration: none;"  href="{{ route('register') }}">
                                        <font color="#ce0000" size=4> {{ __('สมัครสมาชิก !!') }}</font></a> 
                                    </div>   
                                </div>
                                <div class="col-6 d-flex justify-content-start">
                                    <div class="text-center mt-1" > @if (Route::has('password.request'))
                                        <a class="btn" style="border:none;text-decoration:none;background:none;" data-bs-toggle="modal" data-bs-target="#modalforgetpassword">
                                            <font color="#ce0000" size=4> {{ __('ลืมรหัสผ่าน') }}</font>
                                        </a>
                               
                                        @endif
                                    </div>
                                </div>    
                            </div>
                        </form>
             
                    </div>
                </div>
            </div>
        </div> --}}
    </div> 
    {{-- modalforget password --}}
    <div class="modal fade" id="modalforgetpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ลืมรหัสผ่าน</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form id="forgetpassword" method="POST" action="{{ route('password.email') }}">
                    @csrf --}}

                    <div class="form-group row d-flex justify-content-center">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="emailforget" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            {{-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                    </div>
                    <label for="email" class="col-md-12 col-form-label text-center" style="color:red">*กรุณากรอกอีเมล์ของท่านโดยระบบจะทำการส่งลิงค์สำหรับเปลี่ยนรหัสผ่านไปยังอีเมล์ของท่าน</label>
                    {{-- <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div> --}}
                {{-- </form> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
              <button type="button" class="btn btn-primary btn-forget">ตกลง</button>
            </div>
          </div>
        </div>
      </div>
    {{--  --}}
</body>
</html>
<script>
    $(document).ready(function(){
      
        $(document).on('click',".btn-forget",function(){
            var email = $('#emailforget').val() 
            // $('#forgetpassword').submit()
            $.ajax({
                type: "POST",
                url: "password/email",
                data: {
                    "_token": "{{ csrf_token() }}",
                    email: email
                },
                // datatype: 'json',
                success: function (data) { 
                    console.log(data)
                    Swal.fire({
  icon: 'success',
  title: 'ลิงค์เปลี่ยนรหัสผ่านได้ถูกส่งไปยังอีเมล์ของคุณ',
  text: 'กรุณาตรวจสอบกล่องอีเมล์',
})
                },
                error: function(data) {
                    Swal.fire({
  icon: 'error',
  title: 'มีบางอย่างผิดพลาด',
  text: 'กรุณาตรวจสอบอีเมล์ที่กรอกอีกครั้ง',
})
    }
                
            });
        })
    })
</script>