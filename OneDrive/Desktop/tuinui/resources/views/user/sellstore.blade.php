@extends('layouts.applogin')
@section('content')
<style>
    .centered {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<div class="container">

    <h5 class="text-center mt-4" style="font-size: 30px;">ร้านอาหารเพื่อสุขภาพ</h5>
    <div class="row mt-5" style="overflow-y:auto;height:780px">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 80%;background:none;border:none;">
                @foreach ($storelist as $item)
                <form method="get" action="{{route('sellstoreproductlist')}}" enctype="multipart/form-data" style="">
                    
                        <button class="mt-1 mb-1"  name="store" value="{{$item->id}}"style="width: 100%;background:none;border-radius:30px;height:150px;background:white;">
<div class="card-body">
                    <div class="row" style="background: none;">
                        <div class="col-6 ">
                            <img src="{{asset('uploads/storeimg/'.$item->store_img)}}" alt="" style="width: 100px;height:100px;border-radius:20px;">
                        </div>
                        <div class="col-6">
                            <p class="centered">{{$item->storename}}</p>
                        </div>
                    </div>
                    </div>
                </button> 
                    
               
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

    });
</script>
@endsection