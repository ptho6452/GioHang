<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function Index(){
        $product= DB::table('products')->get();
 
        return view('index',compact('product'));

    }
    public function AddCart(Request $request,$id){
        $product=DB::table('products')->where('id',$id)->first();
        if($product!=null){ 
            $oldCart=Session('cart')?Session('cart'):null;
            $newCart= new Cart($oldCart);
            $newCart->AddCart($product,$id);
            $request->Session()->put('cart',$newCart);
   
        }
        return view('/cart');

    }
    public function DeleteItemCart(Request $request,$id){
        $oldCart=Session('cart')?Session('cart'):null;
        $newCart= new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart ->products)>0){
            $request->Session()->put('cart',$newCart);

        }else{
            $request->Session()->forget('cart');
        }
        return view('cart',compact('newCart'));
     
    }
    public function ViewListCart(){
        return view('list');
    }
}
