<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\orderstatus;;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
class StoreController extends Controller
{
    public function storeedit(Request $request){
        $validator = Validator::make($request->all(), array(
            // 'productname' => [
            //     'required',
            //     Rule::unique('products')->ignore($request->id, 'id')->where('storeid',auth()->user()->id)
            // ],
            'product_img' => 'mimes:jpeg,png,jpg,gif,svg|max:3000',
            'phone_number' => [ 'max:12',
                Rule::unique('users')->ignore(auth()->user()->id, 'id')->where('phone_number',$request->phone_number)
            ],
            'storename' => [ 'max:50',
                Rule::unique('users')->ignore(auth()->user()->id, 'id')->where('storename',$request->storename)
            ],
            'address' => 'max:255'
            // 'productdetail'=> 'required|string',
            // 'promotion' => 'required|string',
            // 'price' => 'required|integer',
        ));
        if ($validator->fails()) {
            $error = [];
            foreach($validator->messages()->get('*') as $key => $value){
                $error[] = $value;
            };
            return back()->with('error', $error);
        }
        $ckarr = [];
        if ($request->hasfile('product_img')) {
            $file = $request->file('product_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $ckarr['store_img'] = $filename;
            $file->move('uploads/storeimg', $filename);
            if(auth()->user()->store_img != null || auth()->user()->store_img != '' ){
                 $file_path = public_path().'/uploads/storeimg/'.auth()->user()->store_img;
            unlink($file_path);
            }
           
        }else{
            $ckarr['store_img']=auth()->user()->store_img;
        }
        foreach($request->all() as $key => $value){
            if($key == 'product_img'){
            }else
                if($key == '_token'){
                }else
                if($value == null || $value == '')
                {
                    $ckarr[$key] = auth()->user()->$key;
                }else{
                  $ckarr[$key] = $value;  
                }
            
        }
        User::where('id','=',auth()->user()->id)
        ->update($ckarr);

        return back()->with('success','success');
    }
    public function ordertotal(Request $request){
        $array =array();
        $cartItems = \Cart::getContent();
        $totalorder = \Cart::getTotal();
        $idproduct = array();
       foreach($cartItems as $product){
        $idproduct['id']=$product->id;
       }
       $storeid = DB::table('products')->select('*')->where('id',$idproduct['id'])->get();
        $datecut =str_replace('-', '', Carbon::now());
        $datecutspace  =str_replace(' ', '', $datecut);
        $datecutdash = str_replace(':', '', $datecutspace );
        $ordersid=  $storeid[0]->storeid.$datecutdash;
    
    
        $orderstatus = new orderstatus();
        $orderstatus->storeid = $storeid[0]->storeid;
        $orderstatus->orderid = $ordersid;
        $orderstatus->status = "waitingfororder";
        $orderstatus->totalprice = $totalorder;
        $orderstatus->note = "-";
        $orderstatus->customername = $request->customername;
        $orderstatus->customerphone = $request->customerphone;
        $orderstatus->customeraddress = $request->customeraddress;
        $orderstatus->customerinformation = "-";
        $orderstatus->deliverytype = 'delivery';
        $orderstatus->save();
        // DB::table('orderstatus')->insert([
        //     'storeid' => $storeid[0]->storeid,
        //     'orderid' =>  $ordersid,
        //     'status' => "waitingfororder",
        //     'totalprice' =>  $totalorder,
        //     'note' => "-",
        //     'customername' => $request->customername,
        //     'customerphone' => $request->customerphone,
        //     'customeraddress' => $request->customeraddress,
        //     'customerinformation' => "-",
        //     'deliverytype' => 'delivery', 
    
        // ]);
        foreach($cartItems as $item){
            DB::table('productsorder')->insert([
                'storeid' => $storeid[0]->storeid,
                'orderid' =>  $ordersid,
                'productname' => $item->name,
                'total' => $item->quantity,
                'price' => $item->price,
            ]);
         }
        $orderid = Crypt::encrypt($ordersid);
        event(new \App\Events\OrderProduct($storeid[0]->storeid));
     
       return redirect()->route('statusorder',['orderid' =>  $orderid]);
    }
}
