@extends('layouts.applogin')
@section('content')
<div class="containe-fluid">
    <div class="row showitem ms-auto me-auto mt-5" style="width: 85%;overflow-x:auto;height:90vh;">
        <div class="d-flex justify-content-center">
            <input type="text" class="form-control " id="search-bar" placeholder="Search Manu"  style="width: 700px"/>
        </div>
@foreach ($allfood as $key => $value)      
        <div class="item col-lg-3 mt-3 " style="">
         <form method="get" action="{{route('sellorderproductweb')}}">
            @csrf
                <div class="card" style="width: 19rem;height:450px">
                    <img class="card-img-top" src="uploads/productimg/{{$value->product_img}}" alt="Card image cap" style="height: 240px">
                    <div class="card-body">
                        <div class="searchdata">
                        <div class="row">
                            <div class="col-11 ">
                                <h4 class="card-title foodname">{{$value->productname}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                <p class="card-text me-4 ">แคลลอรี่ <label class="card-detail">{{$value->calorie}}</label></p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button name="id" type="submit" value="{{$value->id}}" class="btn btn-primary ps-0 pe-0 btnmodal" style="width: 100%" data-bs-toggle="modal" data-bs-target="#detailfoodmodal">สั่งอาหาร</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input name="storeid" type="text" value="{{$value->storeid}}" hidden>
            </form>
        </div>
@endforeach
    </div> 
</div>
<script>
    $(document).ready(function(){
        $(document).on('keyup',"#search-bar",function(){
            var searchvalue = $(this).val()
            if(searchvalue != null){
              $('.item').hide()
            $( ".searchdata:contains("+searchvalue+")" ).closest('.item').show()  
            }else{
                $('.item').show()
            }
        })
    })
</script>
@endsection