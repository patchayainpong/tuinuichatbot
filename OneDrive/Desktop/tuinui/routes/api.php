<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Dialogflow\WebhookClient;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\lineusercalorie;
use App\Models\lineusereathistory;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
route::post('/testapi',function(Request $request){
    $agent = \Dialogflow\WebhookClient::fromData($request->json()->all());
    $action = $agent->getAction();
    $intent = $agent->getIntent();
    $query = $agent->getQuery();
    $parameters = $agent->getParameters();
    $originalRequest = $agent->getOriginalRequest();
   $userId = $request['originalDetectIntentRequest']['payload']['data']['source']['userId'];
// สั่งอาหาร
    if($intent == 'สั่งอาหาร'){
     $datauser =  DB::table('lineusercalorie')->select('*')->where('lineuserid',$userId)->get();
  
//       $jayParsedAry = [
//    "fulfillmentMessages" => [
//          [
//             "text" => [
//                "text" => [
//                  count($DBFOOD)
//                ] 
//             ] 
//          ] 
//       ] 
// ]; 
// return response()->json($jayParsedAry);

   $arr100 =array();
   $arr90 =array();
   $arr70 =array();
   $arr80 =array();
   $arr70 =array();
   $arr60=array();
   $arr50 =array();
   $arr40 =array();
   $arr30 =array();
   $arr20 =array();
   $arr10 =array();
   $arr0 =array();

   if(count($datauser) == 0){
      $jayParsedAry = [
         "fulfillmentMessages" => [
               [
                  "text" => [
                     "text" => [
                        "กรุณาคำนวณปริมาณแคลอรี่ที่คุณต้องการในแต่ละวันก่อนครับสามารถทำได้ที่เมนูครับ"
                     ] 
                  ] 
               ] 
            ] 
      ]; 
      return response()->json($jayParsedAry);
   }
   else{     
      $protien =  round(($datauser[0]->protien/3)+10);
      $carbo =  round(($datauser[0]->carbohydrate/3)+10);
      $fat = round($datauser[0]->fat/3);
      $calorie = round(($datauser[0]->lineuseridcalorie/3)+10);    
      $DBFOOD = DB::table('products')->select('*')
      ->where('productname','like', '%'.$parameters['foodmenu'].'%')->get();
      if(count($DBFOOD) == 0){
         $jayParsedAry = [
            "fulfillmentMessages" => [
                  [
                     "text" => [
                        "text" => [
                           "ยังไม่มีเมนูนี้ครับ"
                           // $parameters['foodmenu']
                        ] 
                     ] 
                  ] 
               ] 
         ]; 
         return response()->json($jayParsedAry);
      }else{
         for ($i=0; $i < sizeof($DBFOOD) ; $i++) { 
            if($DBFOOD[$i]->carbohydrate <= $carbo){
               if($DBFOOD[$i]->protien <= $protien){
                  if($DBFOOD[$i]->fat <= $fat){
                     if($DBFOOD[$i]->calorie <= $calorie){
                        $arr100[]=$DBFOOD[$i];
                        
                     }else{
                        $arr90[]=$DBFOOD[$i];
                     }
                  }else{
                     if($DBFOOD[$i]->calorie <= $calorie){
                        $arr80[]=$DBFOOD[$i];
                     }else{
                        $arr70[]=$DBFOOD[$i];
                     }
                  }
               }else{
                  if($DBFOOD[$i]->fat <= $fat){
                     if($DBFOOD[$i]->calorie <= $calorie){
                        $arr60[]=$DBFOOD[$i];
                     }else{
                        $arr50[]=$DBFOOD[$i];
                     }
                  }else{
                     if($DBFOOD[$i]->calorie <= $calorie){
                        $arr40[]=$DBFOOD[$i];
                     }else{
                        $arr30[]=$DBFOOD[$i];
                     }
                  }
               }
            }else{
               if($DBFOOD[$i]->protien <= $protien){
                  if($DBFOOD[$i]->fat <= $fat){
                     if($DBFOOD[$i]->calorie <= $calorie){
                        $arr20[]=$DBFOOD[$i];
                     }else{
                        $arr10[]=$DBFOOD[$i];
                     }
                  }else{
                     if($DBFOOD[$i]->calorie <= $calorie){
                        $arr0[]=$DBFOOD[$i];
                     }else{
                        
                     }
                  }
               }else{
                  if($DBFOOD[$i]->fat <= $fat){
                     if($DBFOOD[$i]->calorie <= $calorie){

                     }else{
                        
                     }
                  }else{
                     if($DBFOOD[$i]->calorie <= $calorie){

                     }else{
                        
                     }
                  }
               }
            }
         }
         $datasearch = DB::table('lineusersearch')->select('productid')->where('lineuserid',$userId)->get();
         $dataid = array();
         foreach( $datasearch as $key => $value){
            $dataid[] = $value->productid;
                  }
         // if(count($datasearch) ==0){
         //    $recommand = array_merge( $arr100,  $arr90, $arr80,$arr70,$arr60,$arr50);
         // }else{
            // $recommand =array();
            // $resutl = array_merge( $arr100,  $arr90, $arr80,$arr70,$arr60,$arr50);
            // for($i=0;$i<count($datasearch);$i++){
            //    for($j=0;$j<count($resutl);$j++){
            //       if($datasearch[$i]->productid != $resutl[$j]->id){
            //          $recommand[]=$resutl[$j];
            //       }
            //    }
            // }
            if(count($datasearch) == 0){
               $recommand = array_merge( $arr100,$arr90, $arr80,$arr70,$arr60,$arr50);
            }else{
                       $recommand =array();
            $resutl = array_merge( $arr100,$arr90, $arr80,$arr70,$arr60,$arr50);
            for($i=0;$i<count($resutl);$i++){
               if(in_array($resutl[$i]->id, $dataid)){
               // if(in_array($resutl[$i]->id, get_object_vars($datasearch)){
                        
               }else{
                  $recommand[]=$resutl[$i];
               }
            }
            }

            // }
         
         // }
        
        
         $countresult = count($recommand);
         if($countresult == 0 || $countresult == null){
            $jayParsedAry = [
               "fulfillmentMessages" => [
                     [
                        "text" => [
                           "text" => [
                              "ขณะนี้ไม่มีเมนูที่ผมจะแนะนำได้ครับ"
                           ] 
                        ] 
                     ] 
                  ] 
            ]; 
            return response()->json($jayParsedAry);
         }else{ 
            $values = array('lineuserid' => $userId,'productid' =>  $recommand[0]->id);
DB::table('lineusersearch')->insert($values);
            $jayParsedAry = [
               "fulfillmentMessages" => [
                     [
                        "card" => [
                           "title" => $recommand[0]->productname,
                           "subtitle" => "แคลลอรี่ : ".$recommand[0]->calorie, 
                           "imageUri" => "https://tuinui.xyz/uploads/productimg/".$recommand[0]->product_img, 
                           "buttons" => [
                              [
                                 "text" => "สั่งอาหาร", 
                                 "postback" => "https://tuinui.xyz/sellorderproductweb?storeid=".$recommand[0]->storeid."&id=".$recommand[0]->id
                              ] 
                           ] 
                        ] 
                     ] 
                  ] 
            ]; 
           return response()->json($jayParsedAry);
         }
    
      }
   }

     

    }else
   //  intent addeathistory
    if($intent == 'บันทึกประวัติการรับประทานอาหาร'){
      $calorie = $parameters['calorie'];
      $foodname = $parameters['foodname'];
      $meal = $parameters['meal'];
      $lineid = $originalRequest['payload']['data']['source']['userId'];
      if($meal == 'เช้า'){
$datameal = 'breakfast';
      }else if($meal == 'กลางวัน'){
         $datameal = 'lunch';
      }else if($meal == 'เย็น'){
         $datameal = 'dinner';
      }
      $addeathistory = new lineusereathistory();
      $addeathistory->foodname = $foodname;
      $addeathistory->calorie = $calorie;
      $addeathistory->meal = $datameal;
      $addeathistory->lineuserid = $lineid;
      $addeathistory->save();
      $agent->reply('บันทึกให้เรียบร้อยแล้วครับ');
      return response()->json($agent->render());
    }
    else 
   //  intent eathistory
    if($intent == 'ดูประวัติการทาน'){
      $lineid = $originalRequest['payload']['data']['source']['userId'];
      $meal = $parameters['meal'];
      $showdata = array();
                 if($meal == 'เช้า'){
                  $datameal = 'breakfast';
               }else if($meal == 'กลางวัน'){
                  $datameal = 'lunch';
               }else if($meal == 'เย็น'){
                  $datameal = 'dinner';
               }
               $datenow =  date("Y-m-d")." 00:01:00";
               $datenowtest =  date("Y-m-d")." 23:59:00";
               $showdata = array();
                $dataeat = lineusereathistory::select('*')
                ->where('lineuserid',$lineid)
                ->get();
              

                
                for($i=0;$i<sizeof($dataeat);$i++){
                  if($dataeat[$i]['meal'] == $datameal){
                      $showdata[] = $dataeat[$i];
                  }
              }
              if(count($showdata) == 0){
               $agent->reply("คุณยังไม่มีประวัติการรับประทานอาหารในมื้อนี้ครับ");
               return response()->json($agent->render());
             }   else{
                 $agent->reply( 'มื้อ'.$meal.':'.$showdata[0]['foodname'].'ปริมาณแคลอรี่:'.$showdata[0]['calorie']."\nโปรตีน".$showdata[0]['protien']."\nไขมัน".$showdata[0]['fat']."\nคาร์โบไฮเดรต".$showdata[0]['carbohydrate'] );
      return response()->json($agent->render());
             }
     
 
    }else 
   //  อาหารไม่ควรทานเยอะ
    if($intent == 'อาหารที่ไม่ควรทานเยอะ'){
       $arrnumber = array('1','2','3','4','5','6');
      $arraydata = array("1"=>"กลุ่มนม ควรทาน นมรสจืด นมพร่องมันเนย นมขาดมันเนย นมถั่วเหลือง สูตรไม่มีน้ำตาล ปริมาณที่เหมาะสม 1-2 แก้ว/วัน(ปริมาณ 250 ซี ซี)",
                        "2"=>"กลุ่มข้าว แป้ง และธัญพืช ควรทาน ข้าวกล้อง ธัญพืชไม่ขัดสี ขนมปังโฮลวีท ปริมาณที่ เหมาะสม 8-9 ทัพพี/วัน",
                        "3"=>"กลุ่มเนื้อสัตว์ชนิดต่างๆ ควรทาน เนื้อปลา เนื้อสัตว์ไม่ติดมัน ไม่ติดหนัง ไข่โดยเฉพาะไข่ขาว ปริมาณที่เหมาะสม 12 ช้อนทานข้าว/วัน (ไข่ทั้งฟอง สามารถทานได้ ในผู้มีโคเลสเตอรอลใน เลือดไม่สูง โดยทานได้ 2-3 ฟอง/วัน)",
                        "4"=>"กลุ่มผลไม้ ควรทานผลไม้สด รสไม่หวานจัด เช่น ฝรั่ง มะละกอ แอ๊ปเปิ้ล ส้มเขียวหวาน ส้มโอ ชมพู่ เป็นต้น ปริมาณที่เหมาะสม 3-4 ส่วน/วัน (1 ส่วนผลไม้ เท่ากับ 6-8 ชิ้นคำ)",    
                        "5"=>"กลุ่มไขมัน ควรทาน น้ำมันรำข้าว น้ำมันถั่วเหลือง น้ำมันข้าวโพด หลีกเลี่ยง น้ำมันจากสัตว์ น้ำมันปาล์ม น้ำมันมะพร้าว กะทิ ครีมเทียม ปริมาณที่เหมาะสม 6-7 ช้อนชา/วัน",     
                        "6"=>"กลุ่มน้ำตาล เกลือ เครื่องปรุงรส ควรทาน โดยหลีกเลี่ยงการเติมน้ำตาล เกลือ และเครื่อง ปรุงรสมากเกินความจำเป็น สำหรับผู้ที่ติดหวานอาจใช้น้ำตาลเทียมให้ความหวานแทน น้ำตาลทรายได้"            
   );
   if(in_array($parameters['caneatfoodnumber'], $arrnumber)){
      $agent->reply( $arraydata[$parameters['caneatfoodnumber']]);
      return response()->json($agent->render());
   }else{
      $agent->reply("มี แค่หัวข้อ 1-6 นะครับ");
      return response()->json($agent->render());
   }
      
    }else 
   //  แนะนำอาหาร
    if($intent == 'แนะนำอาหาร'){
      $data = DB::table('productsorder')->select('productsorder.storeid','productsorder.productname','products.id',DB::raw('SUM(total) AS total'),'products.calorie','products.product_img')
      ->Join('products', function($join){
        $join->on('products.storeid', '=', 'productsorder.storeid');
        $join->on('products.productname','=','productsorder.productname');    
    })
      ->groupBy('products.id')
      ->orderBy('total','DESC')
      ->limit(5)
      ->get();
      $numrand = count($data) -1;
    $recommand = $data[rand(0,$numrand)];
      $jayParsedAry = [
         "fulfillmentMessages" => [
               [
                  "card" => [
                     "title" =>$recommand->productname,
                     "subtitle" => "แคลลอรี่ : ".$recommand->calorie, 
                     "imageUri" => "https://tuinui.xyz/uploads/productimg/".$recommand->product_img, 
                     "buttons" => [
                        [
                           "text" => "สั่งอาหาร", 
                           "postback" => "https://tuinui.xyz/sellorderproduct?storeid=".$recommand->storeid."&id=".$recommand->id
                        ] 
                     ] 
                  ] 
               ] 
            ] ,
      ]; 
     return response()->json($jayParsedAry);
    }else
   //  how to use
    if($intent == 'ทำอะไรได้'){
      $agent->reply('test');
      return response()->json($agent->render());

    }
});

route::get('/testapi2',function(Request $request){

   $datauser =  DB::table('lineusercalorie')->select('*')->where('lineuserid',$request->userid)->get();
   $protien =  round($datauser[0]->protien/3);
   $carbo =  round($datauser[0]->carbohydrate/3);
   $fat = round($datauser[0]->fat/3);
   $calorie = round($datauser[0]->lineuseridcalorie/3);
    $DBFOOD = DB::table('products')->select('*')
    ->where('productname','like', '%'.$request->name.'%')->get();
    $datasearch = DB::table('lineusersearch')->selectRaw('productid')->where('lineuserid',$request->userid)->get();
    $dataid= array();
foreach( $datasearch as $key => $value){
   $dataid[] = $value->productid;
         }
dd( $dataid);



});



