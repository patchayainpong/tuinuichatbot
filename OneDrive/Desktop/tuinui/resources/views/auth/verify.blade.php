@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('เราได้ส่งอีเมล์ยืนยันตัวตนไปที่อีเมล์ของท่านกรุณาตรวจสอบอีไมล์ของท่าน.') }}
                        </div>
                    @endif

                    {{ __('กรุณายืนยันตัวตนก่อนที่จะดำเนินการใช้งานต่อไป.') }}
                    {{ __('ถ้าหากท่านไม่ได้รับอีเมล์') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('ส่งอีเมล์ยืนยันตัวตนใหม่อีกครั้ง') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
