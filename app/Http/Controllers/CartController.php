<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Http\Requests;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @var array
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $member_id=Auth::user()->id;
         $cart_books=Cart::with('Books')->where('member_id','=',$member_id)->get();
         $cart_total=Cart::with('Books')->where('member_id','=',$member_id)->sum('total');
        if(!$cart_books){
            return response(array(
                'error' => 'empty',
                'message' =>'your cart is empty'));
        }
        $data=[
            'cart_books' =>$cart_books,
            'cart_total' =>$cart_total
        ];
        return response($data,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(new Cart());
    }

    /**
     * Store a newly created resource in storage.
     * @var array
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(Auth::check){
            $member_id=Auth::user()->id;
            $book_id=$request->get('book_id');
            $amount=$request->get('amount');
            $book=Book::find($book_id);
            $total=$amount*$book->price;
            $count = Cart::where('book_id','=',$book_id)->where('member_id','=',$member_id)->count();
            if($count){
                return response(array(
                    'error'=>'The book already in your cart',
                    'message'=> 'test'),200);
            }

            Cart::create(array(
                'member_id'=>$member_id,
                'book_id' =>$book_id,
                'amount' =>$amount,
                'total' =>$total
                ));

            return response(array(
                'error' =>'rerr',
                'message' => 'test' ,
                ),200);
        }
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::check()){
            return Cart::find($id)->delete();
        }
    }
}
