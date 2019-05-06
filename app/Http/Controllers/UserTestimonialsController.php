<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class UserTestimonialsController extends Controller
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
        $title = 'My Testimonials Panel';
        // $testimonials = Testimonial::paginate(10);
        $testimonials = Testimonial::where('user_id','=',\Auth::User()->id)->paginate(10);


        $data = [
            'title' => $title,
            'inc' => $inc,
            'testimonials' => $testimonials,

        ];
        return view('Testimonials.user_testimonial',$data);
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
        //Add New Testimonial Entry Start
        if($request->input('testimonial_name') != null){

            //Save Images Start
            if($request->hasfile('file')){
                $file = $request->file('file');
                   $name=  time(). $file->getClientOriginalName();
                   $file->storeAs('public/images/Testimonials/', $name);                  
                   $filePath = $file->storeAs('public/images/Testimonials/', $name);
                   $filePathdb = 'storage/images/Testimonials/'.$name;
                   $filesize = $file->getClientSize();
                   $filetype = $file->getClientOriginalExtension();
            }
            //Save Images End

            $userid = \Auth::User()->id;

            $add_Customer = New Testimonial([
                'name' => $request->input('testimonial_name'),
                'company_name' => $request->input('testimonial_company_name'),
                'designation' => $request->input('testimonial_designation'),
                'quote' => $request->input('testimonial_quote'),
                'image_path' => $filePathdb,
                'user_id' => $userid,
                ]);    
            $add_Customer->save();
            return \Redirect::back();
        }
        //Add New Testimonial Entry End


         //Delete Testimonial Entry Start
       if($request->input('delete_testimonial_id') != null){

        $delete_requested_id = Testimonial::where('id','=',$request->input('delete_testimonial_id'))->first();
        \File::delete($delete_requested_id->image_path);
        $delete_requested_id->delete();
        return \Redirect::back();   
        }
        //Delete Testimonial Entry End



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
