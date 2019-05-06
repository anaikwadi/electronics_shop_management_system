<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUs;

class AboutUsController extends Controller
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
        $title = 'About Us Section';
        $about_us = AboutUs::where('type','=', 1 )->get();
        $container_data = AboutUs::where('type','=', 2 )->get();

        $data = [
            'inc' => $inc,
            'title' => $title,
            'about_us' => $about_us,
            'container_data' => $container_data,

        ];
        return view('AdminPages.AboutUsSystem.index',$data);
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
         //Edit Title Entry Start
       if($request->input('edited_about_us_title_id') != null){

        $requested_id = AboutUs::where('id','=',$request->input('edited_about_us_title_id'))->first();

        $requested_id->title =  $request->input('edited_about_us_title');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit Title Entry End

         //Edit Description Entry Start
       if($request->input('edited_about_us_description_id') != null){

        $requested_id = AboutUs::where('id','=',$request->input('edited_about_us_description_id'))->first();

        $requested_id->description =  $request->input('edited_about_us_description');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit Description Entry End


         //Edit Container Data Entry Start
       if($request->input('edited_container_data_id') != null){

        $requested_id = AboutUs::where('id','=',$request->input('edited_container_data_id'))->first();

        $requested_id->title =  $request->input('edited_container_data_title');
        $requested_id->description =  $request->input('edited_container_data_description');
        $requested_id->fa_icon =  $request->input('edited_container_data_fa_icon');
        $requested_id->bg_color =  $request->input('edited_container_data_bgcolor');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit Container Data Entry End





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
