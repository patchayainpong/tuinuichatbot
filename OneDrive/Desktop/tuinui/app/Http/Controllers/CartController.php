<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {$i =0;
        $cartItems = \Cart::getContent();
        $arrayName = array();
        
        if(count($cartItems) != 0){
            foreach ($cartItems as $key) {
                $arrayName[] = $key->id;
                $i++;
             }
     
             $datalast = DB::table('products')->select('*')->where('id',$arrayName[0])->get();
            $k=2;
                 if($datalast[0]->storeid == $request->storeid){
                     \Cart::add([
                         'id' => $request->id,
                         'name' => $request->name,
                         'price' => $request->price,
                         'quantity' => $request->quantity,
                         'attributes' => array(
                             'image' => $request->image,
                         )
                         ]);
                         return 'success';
                 }else{
                     return 'error';
                 }
        }else{
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->image,
                )
                ]);
                return 'success';
        }
      
       

        
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');
        
        return \Cart::getTotal();
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('selltotal');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
