<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::where('storeid', '=', auth()->user()->id)->get();
        return view('home', compact('product'))->with('none');
    }
    public function addfood()
    {
        return view('addfood');
    }
    public function detailstore()
    {
        return view('storedetail');
    }
    public function storeorder(){
        return view('store.order');
    }
    public function historyorder(){

        $graph= DB::table('storeorderhistory')
        ->selectRaw('sum(total) as total')
        ->selectRaw('productname')
        ->where('storeid', '=', auth()->user()->id)   
        ->groupBy('productname')
        ->get();

        $topten = DB::table('productsorder')
        ->selectRaw('sum(total) as total')
        ->selectRaw('productname')
        ->where('storeid', '=', auth()->user()->id)
        ->groupBy('productname')
        ->orderBy('total','DESC')
        ->limit(10)
        ->get();

        return view('store.orderhistory',compact('graph','topten'));
    }
    // public function addmenu(){
    //     $addfood = $_POST['addfood'];

    //         dd($addfood);


    // }
}
