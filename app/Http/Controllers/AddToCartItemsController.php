<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Add_to_Cart_Items;

class AddToCartItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Add To cart Entry Start
        if($request->input('add_to_cart_item_id') != null){
            $add_to_cart = New Add_to_Cart_Items([
                'item_id' => $request->input('add_to_cart_item_id'),
                'user_id' => \Auth::User()->id,
                'actual_price' => $request->input('add_to_cart_actual_price'),
                'offer_price' => $request->input('add_to_cart_offer_price'),
                'quantity' => $request->input('add_to_cart_quantity'),
                'total' => $request->input('add_to_cart_offer_price') * $request->input('add_to_cart_quantity'),
                'month' => date('M'),
                'year' => date('Y'),
                ]);    
            $add_to_cart->save();
            return \Redirect::back();
        }
        //Add To cart Entry End
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
