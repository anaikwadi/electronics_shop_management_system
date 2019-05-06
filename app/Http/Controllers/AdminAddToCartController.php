<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Add_to_Cart_Items;

class AdminAddToCartController extends Controller
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
        $data = [];
        $inc = 1;
        $title = 'My Cart Items';
        $purchase_items = Purchase::all();
        // $cart_items = Add_to_Cart_Items::where('status','=', 0)->paginate(10);
        $cart_items = Add_to_Cart_Items::where([
            ['status', '=', 0],
            ['user_id', '=', \Auth::User()->id],
            ])->OrderBy('id','desc')->get();

        $data = [
            'title' => $title,
            'inc' => $inc,
            'purchase_items' => $purchase_items,
            'cart_items' => $cart_items,

        ];
        return view('AdminPages.LatestOffersSystem.my_cart_items',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Checkout Items Status Change To 1 Start
        $cart_items_status_change = Add_to_Cart_Items::where([
            ['status', '=', 0],
            ['user_id', '=', \Auth::User()->id],
            ])->get();

            foreach($cart_items_status_change as $item){
            $item->status =  1;
            $item->save();
            }
            return \Redirect::back();
        //Checkout Items Status Change To 1 End

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Delete Cart Item Entry Start
       if($request->input('delete_cart_item_id') != null){

        $delete_requested_id = Add_to_Cart_Items::where('id','=',$request->input('delete_cart_item_id'))->first();
        $delete_requested_id->delete();
        return \Redirect::back();   
        }
        //Delete Cart Item Entry End


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $inc = 1;
        $title = 'My Cart Summary';
        $purchase_items = Purchase::all();
        $cart_items = Add_to_Cart_Items::where([
            ['status', '=', 1],
            ['user_id', '=', \Auth::User()->id],
            ])->OrderBy('id','desc')->paginate(20);

        $data = [
            'title' => $title,
            'inc' => $inc,
            'purchase_items' => $purchase_items,
            'cart_items' => $cart_items,
        ];
        return view('AdminPages.LatestOffersSystem.my_cart_summary',$data);
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
