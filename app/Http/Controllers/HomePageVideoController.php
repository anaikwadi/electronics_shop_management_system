<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePageVideo;
use App\AboutUs;
use App\LatestOffers;
use App\LatestOfferImagesAttachment;
use App\Purchase;
use App\Testimonial;

class HomePageVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $inc = 1;
        $title = 'Home Page Videos';
        $videos = HomePageVideo::OrderBy('sequence','asc')->paginate(10);


        $data = [
            'inc' => $inc,
            'title' => $title,
            'videos' => $videos,

        ];
        return view('AdminPages.HomePageVideoSystem.index',$data);
    }

    public function homepage()
    {
        $data = [];
        $videos = HomePageVideo::OrderBy('sequence','asc')->get();
        $about_us = AboutUs::where('type','=', 1 )->first();
        $container_data = AboutUs::where('type','=', 2 )->get();

        $latest_offers = LatestOffers::all();
        $first_image = LatestOfferImagesAttachment::all();
        $purchase_items = Purchase::all();
        $Testimonials = Testimonial::where('status','=',1)->get();

        $data = [
            'videos' => $videos,
            'about_us' => $about_us,
            'container_data' => $container_data,

            'latest_offers' => $latest_offers,
            'first_image' => $first_image,
            'purchase_items' => $purchase_items,
            'Testimonials' => $Testimonials,


        ];
        return view('front.home',$data);
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
         //Add New Customer Entry Start
         if($request->input('video_name') != null){
            $add_Video = New HomePageVideo([
                'name' => $request->input('video_name'),
                'url' => $request->input('video_url'),
                'sequence' => $request->input('video_sequence'),
                ]);    
            $add_Video->save();
            return \Redirect::back();
        }
        //Add New Customer Entry End


         //Edit Video Entry Start
       if($request->input('edited_video_id') != null){

        $requested_id = HomePageVideo::where('id','=',$request->input('edited_video_id'))->first();

        $requested_id->name =  $request->input('edited_record_video_name');
        $requested_id->url =  $request->input('edited_record_video_url');
        $requested_id->sequence =  $request->input('edited_record_video_sequence');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit Video Entry End


         //Delete Video Entry Start
       if($request->input('delete_video_id') != null){

        $delete_requested_id = HomePageVideo::where('id','=',$request->input('delete_video_id'))->first();
        $delete_requested_id->delete();
        return \Redirect::back();   
        }
        //Delete Video Entry End

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
