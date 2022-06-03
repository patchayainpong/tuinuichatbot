<?php

namespace App\Http\Controllers;
use App\Events\UserOrder;
use App\Models\prodcutsorder;
use App\Models\StoreHistory;
use App\Models\storestatusorder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function store(Request $request)
    {
        //  $request->validate([
        //         'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        //         ]);
        $validator = Validator::make($request->all(), array(
            'productname' => [
                'required',
                'string',
                Rule::unique('products')->where('storeid',auth()->user()->id)
            ],
            'product_img' => 'required|mimes:jpeg,png,jpg,gif,svg|file|max:3000',
            'calorie' => 'required|integer',
            'productdetail'=> 'required|string|max:255',
            'promotion' => 'required|string|max:100',
            'price' => 'required|integer'
        ));
        if ($validator->fails()) {
            $error = [];
            foreach($validator->messages()->get('*') as $key => $value){
                $error[] = $value;
            };
            return redirect()->route('addfood')->with('error', $error);
        }


        $protien = $request->meat*26/100;
        $rice = $request->rice*18;
        $oil = $request->oil*5;
        $products = new Product();
        $products->storeid = auth()->user()->id;
        $products->productname = $request->input('productname');
        $products->calorie = $request->input('calorie');
        $products->productdetail = $request->input('productdetail');
        $products->price = $request->input('price');
        $products->promotion = $request->input('promotion');
        $products->product_img = $request->input('product_img');
        $products->protien = $protien;
        $products->carbohydrate =$rice;
        $products->fat = $oil;
        $products->meat= $request->meat;
        $products->rice=$request->rice;
        $products->oil=$request->oil;
        if ($request->hasfile('product_img')) {
            $file = $request->file('product_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/productimg', $filename);
            $products->product_img = $filename;
        }
        $products->save();
        return redirect()->route('addfood')->with('success', 'upload succes');
    }

    public function storeupdate(Request $request){
        $productsdetail = Product::select('*')
        ->where('storeid','=',auth()->user()->id)
        ->where('id','=',$request->id)
        ->get();
        $validator = Validator::make($request->all(), array(
            'productname' => [
                'required',
                Rule::unique('products')->ignore($request->id, 'id')->where('storeid',auth()->user()->id)
            ],
            'product_img' => 'mimes:jpeg,png,jpg,gif,svg|file|max:3000',
            'calorie' => 'required|integer',
            'productdetail'=> 'required|string|max:255',
            'promotion' => 'required|string|max:100',
            'price' => 'required|integer',
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
            $ckarr['product_img'] = $filename;
            $file->move('uploads/productimg', $filename);
            if($productsdetail[0]['product_img'] != null || $productsdetail[0]['product_img'] != ''){
                $file_path = public_path().'/uploads/productimg/'.$productsdetail[0]['product_img'];
            unlink($file_path);
            }
            
        }else{
            $ckarr['product_img']=$productsdetail[0]['product_img'];
        }
        foreach($request->all() as $key => $value)
        {   if($key == 'product_img'){
        }else
            if($key == '_token'){
            }else
            if($value == null || $value == '')
            {
                $ckarr[$key] = $productsdetail[0][$key];
            }
            else
            {
                $ckarr[$key] = $value;
            }
        } 
        $protien = $request->meat*26/100;
        $rice = $request->rice*18;
        $oil = $request->oil*5;
        $ckarr['protien']=$protien;
        $ckarr['carbohydrate']=$rice;
        $ckarr['fat']=$oil;
        Product::where('id','=',$request->id)
        ->update($ckarr);

        return back()->with('success','success');
    }

public function storedelete(Request $request){
    $productsdetail = Product::select('*')
    ->where('storeid','=',auth()->user()->id)
    ->where('id','=',$request->id)
    ->get();
    $filename = $productsdetail[0]['product_img'];
    $file_path = public_path().'/uploads/productimg/'.$filename;
            unlink($file_path);
    Product::where('id','=',$request->id)
    ->delete();
    return redirect()->route('home')->with('deletesuccess', 'delete succes');
}
    public function productdetail(Request $request){

  $productsdetail = Product::select('*')
  ->where('storeid','=',auth()->user()->id)
  ->where('id','=',$request->productid)
  ->get();
      return view('detailfood',compact('productsdetail'));
     
    }
    public function datastoreorder(Request $request){
      $orderdata =   DB::table('orderstatus')
        ->select('*')
        ->where('storeid',$request->storeid)
        ->get();
        $products = DB::table('productsorder')->select('*')
        ->where('storeid',$request->storeid)
        ->get();

        $order = ["statusorder" => $orderdata,
                  "productname" => $products               
                 ];
    return  $order;
    }

    public function acceptorder(Request $request){
        $statusarr = [];
        $statusarr[]= $request->id;
        $statusarr[]= "acceptorder";  
        storestatusorder::where('orderid','=',$request->id)
        ->update(['status'=>"prepareingfood"]);
        event(new \App\Events\UserOrder($statusarr));
    }
    public function successorder(Request $request){
        $statusarr = [];
        $statusarr[]= $request->id;
        $statusarr[]= "success";  
        storestatusorder::where('orderid','=',$request->id)
        ->update(['status'=>"success"]);
        $orders=  DB::table('productsorder')->select('*')
        ->where('orderid','=',$request->id)
        ->get();
      
        for($i=0 ;$i < count($orders);$i++){
            // DB::table('storeorderhistory')->insert([
            //     'orderid' => $orders[$i]->orderid,
            //     'storeid' => $orders[$i]->storeid,
            //     'productname' =>$orders[$i]->productname,
            //     'price'=>$orders[$i]->price,
            //     'total'=>$orders[$i]->total,
            //     'promotion'=>$orders[$i]->promotion,
            // ]);
        $orderhistory = new StoreHistory();
        $orderhistory->orderid = $orders[$i]->orderid;
        $orderhistory->storeid = $orders[$i]->storeid;
        $orderhistory->productname = $orders[$i]->productname;
        $orderhistory->price = $orders[$i]->price;
        $orderhistory->total= $orders[$i]->total;
        $orderhistory->promotion= $orders[$i]->promotion;
        $orderhistory->save();
       }
       
        event(new \App\Events\UserOrder($statusarr));
    }
    public function cancelorder(Request $request){
        $statusarr = [];
        $statusarr[]= $request->id;
        $statusarr[]= "cancelled";  
        storestatusorder::where('orderid','=',$request->id)
        ->update(['status'=>"cancelled"]);
        event(new \App\Events\UserOrder($statusarr));
    }
 public function dataorderhistory(Request $request){
    $datahistory =  StoreHistory::select('*')
    ->where('storeid',auth()->user()->id)
    ->orderby('created_at','ASC') 
    ->get();
    return $datahistory;
 }
public function historydataselect(Request $request){
    if($request->productname != "เมนูอาหาร" && $request->dmy == 'วว/ดด/ปป'){
        $data = StoreHistory::select('*')
    ->where('productname',$request->productname)
    ->get();
    }else if($request->productname == "เมนูอาหาร" && $request->dmy != 'วว/ดด/ปป'){
        $data = StoreHistory::select('*')
        ->whereDate('created_at','=',$request->dmy)
        ->orderby('created_at','ASC') 
        ->get();
    }else{
        $data = StoreHistory::select('*')
        ->where('productname',$request->productname)
        ->whereDate('created_at','=',$request->dmy)
        ->orderby('created_at','ASC') 
        ->get();
    }


    

    
    return $data;
}
}