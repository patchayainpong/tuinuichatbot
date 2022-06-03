<?php
namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\prodcutsorder;
use App\Models\Product;
use APP\Models\User;
use APP\Models\orderstatus;
use APP\Models\storestatusorder;
use App\Models\food;
use App\Models\lineusercalorie;
use App\Models\lineusereathistory;
use App\Models\netflix;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
public function statusorder(){
    return view('user.statusorder');
}    
public function testjq(){
    return view('testjq');
}


public function sellfood(){
    $allfood = DB::table('products')->select('*')->get();
    return view('user.sellfood',compact('allfood'));
}
public function caloriecalculator(){
    return view('user.caloriecalculator');
}   
public function indexnone(Request $request){
    return view('welcome');
}
public function sellstore(){
    $storelist = DB::table('users')  ->select('*')
    ->get();
    return view('user.sellstore',compact('storelist'));
}
public function eathistory(){
    return view('user.eathistory');
}
public function sellstoreproductlist(Request $request){
    $storeproductlist = DB::table('products')
    ->select('*')
    ->where('storeid','=',$request->store)
    ->get();
    return view('user.sellstoreproductlist',compact('storeproductlist'));
}
public function order(Request $request){
    $date = date('Y-m-d H:i:s');
    $datecut =str_replace('-', '', Carbon::now());
    $datecutspace  =str_replace(' ', '', $datecut);
    $datecutdash = str_replace(':', '', $datecutspace );
    $ordersid= $request->orderdetail[0].$datecutdash;
    DB::table('orderstatus')->insert([
        'storeid' => $request->orderdetail[0],
        'orderid' =>  $ordersid,
        'status' => "waitingfororder",
        'totalprice' => $request->orderdetail[3],
        'note' => $request->orderdetail[4],
        'customername' => $request->orderdetail[5],
        'customerphone' => $request->orderdetail[6],
        'customeraddress' => $request->orderdetail[7],
        'customerinformation' => "-",
        'deliverytype' => $request->ordertype, 
        'created_at' => $date,
        'updated_at' => $date,
    ]);
    // DB::table('productsorder')->insert([
    //     'storeid' => $request->orderdetail[0],
    //     'orderid' =>  $ordersid,
    //     'productname'=> $request->orderdetail[1],
    //     'total' => $request->orderdetail[2],
    //     'price' => $request->orderdetail[3],
    //     'created_at' => $date,
    //     'updated_at' => $date,
    // ]);
    $order = new prodcutsorder();
    $order->storeid = $request->orderdetail[0];
    $order->productname = $request->orderdetail[1];
    $order->total = $request->orderdetail[2];
    $order->price = $request->orderdetail[3];
    // $order->note = $request->orderdetail[4];
    // $order->customername = $request->orderdetail[5];
    // $order->customerphone= $request->orderdetail[6];
    // $order->customeraddress= $request->orderdetail[7];
    // $order->customerinformation= $request->orderdetail[8];
    // $order->deliverytype= $request->ordertype;
    // $order->status = "waitingfororder";
    $order->orderid =  $ordersid;
    $order->save();
    $orderid = Crypt::encrypt($ordersid);

    if (date('H') < 12) {
$meal  = "breakfast";
}else if(date('H') >= 12 && date('H') < 16){
 $meal  = "lunch";
}else if(date('H') > 16 ){
 $meal  = "dinner";
}

$checkdata =DB::table('lineusereathistory')->select('*')->where('lineuserid',$request->lineid)->where("meal",$meal)->whereDate('created_at', '=', date('Y-m-d'))->get();
if(count($checkdata) == 0){
     DB::table('lineusereathistory')->insert([
     'lineuserid' => $request->lineid,
     'foodname' =>$request->orderdetail[1],
     'calorie' => $request->calorie,
     'meal'=> $meal,
     'created_at' => $date,
        'updated_at' => $date,
        'protien' => $request->protien,
        'fat' => $request->fat,
        'carbohydrate' => $request->carbohydrate,
    ]);
}else{
    DB::table('lineusereathistory')->insert([
        'lineuserid' => $request->lineid,
        'foodname' =>$request->orderdetail[1],
        'calorie' => $request->calorie,
        'meal'=> $meal,
        'created_at' => $date,
           'updated_at' => $date,
           'protien' => $request->protien,
           'fat' => $request->fat,
           'carbohydrate' => $request->carbohydrate,
           'type' => "moremenu"
       ]);
}
   

    event(new \App\Events\OrderProduct($request->orderdetail[0]));
 
   return redirect()->route('statusorder',['orderid' =>  $orderid]);
  
}
public function sellorderproduct(Request $reqeust){
$orderdetail = DB::table('products')
->select('*')
->join('users','products.storeid','users.id')
->where('products.storeid',$reqeust->storeid)
->where('products.id',$reqeust->id)
->get();
    return view('user.storeorderproduct',compact('orderdetail'));
}

public function sellorderproductweb(Request $reqeust){
    $orderdetail = DB::table('products')
    ->select('products.id','products.productname','products.calorie','products.productdetail','products.price','products.promotion','products.product_img','users.store_img','users.storename','users.id as storeid','products.protien','products.fat','products.carbohydrate')
    ->join('users','products.storeid','users.id')
    ->where('products.storeid',$reqeust->storeid)
    ->where('products.id',$reqeust->id)
    ->get();
        return view('user.storeorderproductweb',compact('orderdetail'));
    }

public function selltotal(){
    $cartItems = \Cart::getContent(); 
    return view('user.selltotal',compact('cartItems'));
}
public function userorderdetail(Request $request){
    $test = DB::table('productsorder')->select('productsorder.productname','productsorder.total','orderstatus.status','productsorder.price')
    ->join('orderstatus','productsorder.orderid','orderstatus.orderid')
    ->where('productsorder.orderid',$request->id)
    ->get();
    return $test;
}
public function addwebfood(){
    return view('addnormalfood');
}





// Admin Addfooddata

public function addwebfooddata(Request $request){
    $validator = Validator::make($request->all(), [
        // 'foodproductname' => [
        //     'required',
        //     'string',
        //     Rule::unique('products')->where('storeid',auth()->user()->id)
        // ],
        'foodimg.*' => 'required|mimes:jpeg,png,jpg,gif,svg|file',
        '*.foodname.*' => 'required|string|max:100',
        // '*.fooddetail.*' => 'required|string',
        '*.foodcalorie.*'=> 'required|integer',
    ]);
    if ($validator->fails()) {
        $error = [];
        foreach($validator->messages()->get('*') as $key => $value){
            $error[] = $value;
        }
        return back()->with('error',$error[0][0]);
    }else{
          $filenamearr = [];
$date = Carbon::now();
    if ($request->hasfile('foodimg')) {
    
            foreach($request->file('foodimg') as $key => $file){
              $extention = $file->getClientOriginalExtension();
        $filename = time().$date.$key .'.' . $extention;
        $filenamearr[] = $filename;
        $file->move('uploads/foodimg', $filename);
            }
   
  
       
    }
    for($i = 0 ;$i < sizeof($request->food['foodname']);$i++){
        $food = new food();
        $food->foodname = $request->food['foodname'][$i];
        $food->detailfood = $request->food['fooddetail'][$i];
        $food->calorie = $request->food['foodcalorie'][$i];
        $food->foodimg = $filenamearr[$i];
        $food->save();
    }
return back();
    }
  
}


public function querywebfood(){
$fodddata=  DB::table('food')->select('*')->get();   
        $data = array();
        for($i = 0; $i < sizeof($fodddata); $i++){

            $col_arr["foodname"] = '<div class="tdblue justify-content-center d-flex" >'.$fodddata[$i]->foodname.' </div>';
            $col_arr["detailfood"] = '<div class="tdblue justify-content-center d-flex">'.$fodddata[$i]->detailfood.' </div>';
            $col_arr["calorie"] = '<div class="tdblue justify-content-center d-flex">'.$fodddata[$i]->calorie .'</div>';
            // $col_arr["foodimg"] = '<div class="tdblue justify-content-center d-flex">'.$fodddata[$i]->foodimg .'</div>';
            $col_arr["foodimg"] = '<img src="uploads/foodimg/'.$fodddata[$i]->foodimg.'" alt="" width="150" height="150">';
            array_push($data, $col_arr);
        }
        $data_array = array('total' => sizeof($data), 'rows' => $data );
        return response()->json($data_array);
 }



 public function ordertotalcart(){
   $cartproduct =  \Cart::getContent();
   $idproduct = array();
   foreach($cartproduct as $product){
    $idproduct['id']=$product->id;
   }
   $storeid = DB::table('products')->select('*')->where('id',$idproduct['id'])->get();
    foreach($cartproduct as $product){
         $order = new prodcutsorder();
    $order->storeid = $storeid[0]->storeid;
    $order->productname = $product->name;
    $order->total = $product->quantity;
    $order->price = $product->price;
    // $order->note = $request->orderdetail[4];
    // $order->customername = $request->orderdetail[5];
    // $order->customerphone= $request->orderdetail[6];
    // $order->customeraddress= $request->orderdetail[7];
    // $order->customerinformation= $request->orderdetail[8];
    // $order->deliverytype= $request->ordertype;
    // $order->status = "waitingfororder";
    $order->orderid =  $ordersid;
    $order->save();
    $orderid = Crypt::encrypt($ordersid);
       }
  
    event(new \App\Events\OrderProduct($request->orderdetail[0]));

    return redirect()->route('statusorder');
     
 }


// 













//  netflix
public function netflixmilk(){
    return view('netflix.netflix');
}
public function querynetflix(){
    $netflix = DB::table('netflix')
    ->select('*')
    ->orderBy('created_at','DESC')
    ->get();
    $dataarr = [];
    for($i=0; $i< sizeof($netflix);$i++){
        $col_arr["name"] = '<div class="justify-content-center d-flex" >' . $netflix[$i]->name . ' </div>';
        $col_arr["detail"] = '<div class="justify-content-center d-flex" >' . $netflix[$i]->detail . ' </div>';
        $col_arr["type"] = '<div class="justify-content-center d-flex" >' . $netflix[$i]->type . ' </div>';
        $col_arr["img"] = '<div class="justify-content-center d-flex" ><img src="uploads/nfytslip/'.$netflix[$i]->slipimg.'" style="width:200px;height:200px;"></div>';
        $col_arr["date"] = '<div class="justify-content-center d-flex" >' . $netflix[$i]->created_at . ' </div>';
        array_push($dataarr,$col_arr);
    }
     return response()->json($dataarr);
}
public function youtube(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:50',
        'slipimg' => 'required|mimes:jpeg,png,jpg,gif,svg|file',
    ]);
    if ($validator->fails()) {
        return back()->with('error','error');
    }
    if ($request->hasfile('slipimg')) {
        $file = $request->file('slipimg');
          $extention = $file->getClientOriginalExtension();
    $filename =  time() . '.' . $extention;
    $file->move('uploads/nfytslip', $filename);
        }
$uploadyoutube = new netflix();
$uploadyoutube->name = $request->name;
$uploadyoutube->detail = $request->detail;
$uploadyoutube->slipimg = $filename;
$uploadyoutube->type = 'youtube';
$uploadyoutube->save();
return back()->with('success','Youtube Slip Upload Success');
}
public function netflix(Request $request){

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:50',
        'slipimg' => 'required|mimes:jpeg,png,jpg,gif,svg|file',
    ]);
    if ($validator->fails()) {
        return back()->with('error','error');
    }
    if ($request->hasfile('slipimg')) {
        $file = $request->file('slipimg');
          $extention = $file->getClientOriginalExtension();
    $filename =  time() . '.' . $extention;
    $file->move('uploads/nfytslip', $filename);
        }

$uploadyoutube = new netflix();
$uploadyoutube->name = $request->name;
$uploadyoutube->slipimg = $filename;
$uploadyoutube->detail = $request->detail;
$uploadyoutube->type = 'netflix';
$uploadyoutube->save();
return back()->with('success','Netflix Slip Upload Success');
        }
public function usercalorie(Request $request){

    $delete = lineusercalorie::where('lineuserid', $request->lineid)->delete();
    // $user->delete();

    $datacalorie = new lineusercalorie();
    $datacalorie->lineuseridcalorie = $request->calorie;
    $datacalorie->lineuserid = $request->lineid;
    $datacalorie->carbohydrate = $request->carbohydrate;
    $datacalorie->protien = $request->protien;
    $datacalorie->fat =$request->fat;
    $datacalorie->save();
    return 'success';
}
public function datausercalorie(Request $request){
  $datacal =   lineusercalorie::select('lineuseridcalorie')->where('lineuserid',$request->lineid)->get();
    return $datacal;
}
public function usereathistoryadd(Request $request){
    if($request->meal != 'breakfast'&& $request->meal != 'lunch' && $request->meal != 'dinner'){
        $olddata =  lineusereathistory::select('*')->where('id','=', $request->meal)->get();
        $dataupdate = array('foodname' => $request->foodname, 'calorie' => $request->calorie,'protien' => $request->protien,'carbohydrate'=> $request->carbo,'fat'=>$request->fat);
        lineusereathistory::where('id','=', $request->meal)
        ->update($dataupdate);
        return 'success';
}else{
    $eathistory =  new lineusereathistory();
  $eathistory->foodname = $request->foodname;
  $eathistory->calorie = $request->calorie;
  $eathistory->meal = $request->meal;
  $eathistory->lineuserid = $request->lineid;
  $eathistory->carbohydrate = $request->carbo;
  $eathistory->protien = $request->protien;
  $eathistory->fat = $request->fat;
  $eathistory->save();
}
  return 'success';
}
public function usereathistorydata(Request $request){
   $datenow =  date("Y-m-d")." 00:01:00";
   $datenowtest =  date("Y-m-d")." 23:59:00";
$datepass = $datenow.'19:40:21';
    $dataeat = lineusereathistory::select('*')
    ->where('lineuserid',$request->lineid)
    ->whereBetween('created_at',[$datenow,$datenowtest])
    ->get();
    return $dataeat;
}
// 
public function homepagedetailfood(Request $reqeust){
    $arrdata = [];
    $productdata = DB::table('products')->select('*')->where('id',$reqeust->id)->get();
    $carbohydrate = Product::max('carbohydrate');
    $protien = Product::max('protien');
    $fat = Product::max('fat');
    $cal = Product::max('calorie');
    $arrdata[0] = $productdata;
    $arrdata[1]=$carbohydrate;
    $arrdata[2]=$protien;
    $arrdata[3]=$fat;
    $arrdata[4]=$cal; 
    return  $arrdata;
}



public function userdata(Request $request){
    $date = date('Y-m-d');
    $datauser = DB::table('lineusercalorie')->select('*')->where('lineuserid',$request->lineid)->get();
    $dataeat = DB::table('lineusereathistory')
    ->select(DB::raw('SUM(protien) AS protien'),DB::raw('SUM(fat) AS fat'),DB::raw('SUM(carbohydrate) AS carbohydrate'),DB::raw('SUM(calorie) AS calorie'))
    ->where('lineuserid',$request->lineid)
    ->where('created_at','>=',$date)
    ->get();
    $arr = array($datauser,$dataeat);
    return  $arr;
}
public function addmoremenu(Request $request){
    $date = date('Y-m-d H:i:s');
    DB::table('lineusereathistory')->insert([
        'lineuserid' => $request->lineid,
        'foodname' =>$request->foodname,
        'calorie' => $request->cal,
        'meal'=> 'no',
        'created_at' => $date,
           'updated_at' => $date,
           'protien' => $request->protien,
           'fat' => $request->fat,
           'carbohydrate' => $request->carbo,
           'type' => $request->type,
       ]);
       return "success";
}

public function datamoremenu(Request $request){
    $date = date('Y-m-d');
   $data = DB::table('lineusereathistory')
    ->select('*')
    ->where('lineuserid',$request->lineid)
    ->where('type','moremenu')
    ->where('created_at','>=',$date)
    ->get();
    return  $data;
}

public function removemoremenu(Request $request){
    DB::table('lineusereathistory')->where('id', $request->id)->delete();
return "success";
}
public function test(){
$loop =10;
    for($i=0;$i<$loop;$i++){
    }
    return "wow";
}
}