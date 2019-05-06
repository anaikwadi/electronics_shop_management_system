<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LatestOffers;
use App\Purchase;
use App\LatestOfferImagesAttachment;

class LatestOffersController extends Controller
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
        $title = 'Latest Offers';
        $latest_offers = LatestOffers::paginate(10);
        $products = Purchase::where('id','!=',1)->get();
        $latest_offer_images = LatestOfferImagesAttachment::all();

        $data = [
            'title' => $title,
            'inc' => $inc,
            'latest_offers' => $latest_offers,
            'products' => $products,
            'latest_offer_images' => $latest_offer_images,

        ];
        return view('AdminPages.LatestOffersSystem.index',$data);
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
         //Add New Latest Offer Entry Start
         if($request->input('latest_offer_item_id') != null){

            $actual_price = Purchase::where('id','=',$request->input('latest_offer_item_id'))->first();

            $add_LatestOffers = New LatestOffers([
                'item_id' => $request->input('latest_offer_item_id'),
                'actual_price' => $actual_price->unit_price + $actual_price->gst,
                'display_price' => $request->input('latest_offer_display_price'),
                'offer_price' => $request->input('latest_offer_offer_price'),
                'video_link' => $request->input('latest_offer_video_link'),
                'description' => $request->input('latest_offer_description'),
                ]);    
            $add_LatestOffers->save();

            //Save Images Start
            if($request->hasfile('file')){
                foreach($request->file('file') as $file){
                    $name=  time(). $file->getClientOriginalName();
                    $file->storeAs('public/images/LatestOffersImages/'.$actual_price->model_name, $name);                  
                    $filePath = $file->storeAs('public/images/LatestOffersImages/'.$actual_price->model_name, $name);
                    $filePathdb = 'storage/images/LatestOffersImages/'.$actual_price->model_name.'/'.$name;
                    $filesize = $file->getClientSize();
                    $filetype = $file->getClientOriginalExtension();
                
                    //Store Values Into Array
                    $this->count=1;
                    $data[] = $name; 
                    $pathdbdata[] = $filePathdb;  
                    $pathdata[] = $filePath;  
                    $sizedata[] = $filesize;  
                    $typedata[] = $filetype;  
                    }
                }

                $i=0;   
                if($this->count == 1){        
                    foreach($data as $dt){
                            $file_attach =new LatestOfferImagesAttachment();

                            $file_attach->purchase_id= $request->input('latest_offer_item_id');
                            $file_attach->latest_offer_id= $add_LatestOffers->id;
                            $file_attach->file_name=json_encode($dt);
                            $file_attach->file_size=json_encode($sizedata[$i]);
                            $file_attach->file_type=json_encode($typedata[$i]);
                            $file_attach->file_path_db=json_encode($pathdbdata[$i]);
                            $file_attach->file_path=json_encode($pathdata[$i]);

                            $file_attach->save();

                            $i = $i+1; 
                            }
                    }
            //Save Images End


            return \Redirect::back();
        }
        //Add New Latest Offer Entry End



        //Delete Latest Offer Entry Start
       if($request->input('delete_latest_offer_id') != null){

        $delete_requested_id = LatestOffers::where('id','=',$request->input('delete_latest_offer_id'))->first();
        $delete_requested_id->delete();

        $delete_requested_id_images = LatestOfferImagesAttachment::where('latest_offer_id','=',$request->input('delete_latest_offer_id'))->get();

        foreach($delete_requested_id_images as $delete_img_id){

            \File::delete(json_decode($delete_img_id->file_path_db));
            $userattachment = LatestOfferImagesAttachment::findOrFail($delete_img_id->id);
            
            $userattachment->delete();
        }

        return \Redirect::back();   
        }
        //Delete Latest Offer Entry End





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
