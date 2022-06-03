@extends('layouts.applogin')
@section('content')
{{-- {{$cartItems}} --}}
<div class="container mt-5">
    <div class="card cardtotal">
        <div class="card-body" style="overflow-y: auto;height:600px;">
            @if(count($cartItems) == 0)
            <div class="d-flex justify-content-center">
                <h1>คุณยังไม่ได้เพิ่มรายการอาหาร</h1>
            </div>
            @else
            @foreach ($cartItems as $item)
            <div class="row mt-1 mb-1" style="border: 1px solid black">
                <div class="col-lg-3">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('uploads/productimg/'.$item['attributes']->image)}}" class="rounded"
                            style="height:100px;">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class=" centered">
                        <div class="d-flex justify-content-center">
                            <h3 class="">{{$item->name}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="centered">
                        <div class="d-flex justify-content-center">
                              <input class="iditem" type="hidden" name="id" value="{{ $item->id}}">
                        <button type="submit" class="qty-count qty-count--minus minus" data-action="minus" type="button"
                            style="background: none;border:none;">ลด</button>
                        <input class="product-qty mt-2.5 " type="number" name="quantity" value="{{ $item->quantity }}"
                            min="0" value="" style="pointer-events: none; text-align: center;">
                        <button type="submit" class="qty-count qty-count--add plus" data-action="add" type="button"
                            style="background: none;border:none;">เพิ่ม</button>
                        </div>
                    </div>
                    {{-- <form class=" " action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <input class="product-qty mt-2.5 " type="number" name="quantity" value="{{ $item->quantity }}"
                        min="0" value="" style="pointer-events: none; text-align: center;">
                    </form> --}}
                </div>
                <div class="col-lg-3">
                    <div class="centered ">
                        <div class="d-flex justify-content-center">
                              <h5 class="ms-2 me-2">ราคาจานละ : {{ $item->price }} บาท </h5>
                        <form class="ms-2 me-2" action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button style="background: none;border:none;" class="px-1.5"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg></button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>   
        @if(count($cartItems) != 0)
         <div class="row mt-3" style="padding-right:12px;">
            <div class="col-6">
                <div class="centered">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success orderfood">สั่งอาหาร</button>
                    </div>
                </div>
            </div>
        <div class="col-6 d-flex justify-content-end">
            <h3 class="centered">ราคาอาหารทั้งหมด <label class="total">{{ Cart::getTotal() }}</label> บาท</h3>
        </div>
    </div>
    @endif
    </div>
    <div class="d-flex justify-content-center">
    <div class="card orderform" style="display:none;width:500px;height:100%;background:none;border:none;">
        <form method="post" action="{{route('ordertotal')}}" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                </div>
               <label class="text-center" id="basic-addon1" style="font-size: 25px;font-weight:bolder">ชื่อ-นามสกุล</label>
               <div class="col-12 d-flex justify-content-center">
                   <div class="input-group mb-3 d-flex justify-content-center" style="max-width: 230px;">
                    <input name="customername" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" maxlength="50">
                  </div>
               </div>
                
                  <label class="text-center " id="basic-addon1" style="font-size: 25px;font-weight:bolder">เบอร์ติดต่อ</label>
                  <div class="col-12 d-flex justify-content-center">
                    <div class="input-group mb-3" style="max-width: 230px;">
                    <input name="customerphone" type="text" class="form-control numip" placeholder="" aria-label="" aria-describedby="basic-addon1" maxlength="12">
                  </div>   
                  </div>
                 
                  <label class="text-center" id="basic-addon1" style="font-size: 25px;font-weight:bolder">ที่อยู่จัดส่ง</label>
                  <div class="col-12 d-flex justify-content-center">
                      <div class="input-group mb-3" style="max-width: 230px;">
                    <textarea name="customeraddress" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" maxlength="100"></textarea>
                  </div>
                  </div>
                  
            </div>
        </div>
        <div class="d-flex justify-content-center">
                @csrf
            <button type="submit" class="btn btn-success mb-3" style="width: 200px">สั่งอาหาร</button>
        </div> 
     </form>
        
    </div>
</div>
</div>
<script>
    function updatequantity(id, quantity, div) {
        $.ajax({ //create an ajax request to display.php
            type: "post",
            url: "update-cart",
            //   async: false, 
            //   dataType: 'json',  
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "quantity": quantity,
            },
            success: function (response) {
                //   var total = "{{Cart::getTotal()}}"
                $('.total').empty().append(response)

            }
        });
    }
    $(document).ready(function () {

$(document).on('keyup',".numip",function(){
    function phoneFormat() {
                phone = phone.replace(/[^0-9]/g, '');
                return phone;
            }
            var phone = $(this).val();
            phone = phoneFormat(phone);
            $(this).val(phone);;
})
        // $($('.numip')).keyup(function(event) {
        //     // format number
        //     function phoneFormat() {
        //         phone = phone.replace(/[^0-9]/g, '');
        //         return phone;
        //     }
        //     var phone = $(this).val();
        //     phone = phoneFormat(phone);
        //     $(this).val(phone);;
        // });



$(document).on('click',".orderfood",function(){
    $('.cardtotal').hide()
    $('.orderform').fadeIn()
})




        $(document).on('click', ".minus", function () {
            var quantity = parseInt($(this).closest('.centered').find('.product-qty').val())
            var quantityminus = quantity - 1
            var id = $(this).closest('.centered').find('.iditem').val()
            if (quantity > 1) {
                $(this).closest('.centered').find('.product-qty').val(quantityminus)
                updatequantity(id, quantityminus)
            } else {
                alert('ต้องการลบเมนูออกใช่หรือไม่')
            }

        })
        $(document).on('click', ".plus", function () {
            var div = $(this)
            var quantity = parseInt($(this).closest('.centered').find('.product-qty').val())
            var quantityplus = quantity + 1
            var id = $(this).closest('.centered').find('.iditem').val()
            if (quantity < 10) {
                $(this).closest('.centered').find('.product-qty').val(quantityplus)
                updatequantity(id, quantityplus)
            } else {
                alert('สั่งได้ไม่เกิน10ออเดอร์ครับ')
            }

        })
    })
</script>
@endsection