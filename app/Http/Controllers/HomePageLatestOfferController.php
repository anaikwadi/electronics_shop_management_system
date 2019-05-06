<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LatestOffers;
use App\LatestOfferImagesAttachment;
use App\Purchase;
use App\Add_to_Cart_Items;


class HomePageLatestOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $title = 'Latest Offers';
        $latest_offers = LatestOffers::all();
        $first_image = LatestOfferImagesAttachment::all();
        $purchase_items = Purchase::all();
        $cart_items = Add_to_Cart_Items::where('status','=', 0)->get();
        
        $data = [
            'title' => $title,
            'latest_offers' => $latest_offers,
            'first_image' => $first_image,
            'purchase_items' => $purchase_items,
            'cart_items' => $cart_items,
        ];
        return view('LatestOffers.index',$data);
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
        //
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
        $title = ' Details';
        $latest_offers = LatestOffers::where('id','=',$id)->first();
        $images = LatestOfferImagesAttachment::where('latest_offer_id','=',$id)->get();
        $purchase_items = Purchase::where('id','=',$latest_offers->item_id)->first();

        
        $data = [
            'title' => $title,
            'latest_offers' => $latest_offers,
            'images' => $images,
            'purchase_items' => $purchase_items,

        ];
        return view('LatestOffers.latest_offer_details',$data);
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
