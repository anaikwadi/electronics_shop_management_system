<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUsEnquiries;
use App\ContactUsMap;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $title = 'Contact Us';
        $Contact_us_map = ContactUsMap::OrderBy('id','asc')->first();

        
        $data = [
            'title' => $title,
            'Contact_us_map' => $Contact_us_map,

        ];
        return view('ContactUs.contact_us',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::User()->hasRole(['superadministrator','administrator'])){
        $data = [];
        $inc = 1;
        $title = 'Contact Us Enquiries';
        $contact_us_enquiry = ContactUsEnquiries::OrderBy('id','desc')->paginate(5);
        $contact_us_enquiry_count = ContactUsEnquiries::all();
        $Contact_us_map = ContactUsMap::OrderBy('id','asc')->first();

        
        $data = [
            'title' => $title,
            'inc' => $inc,
            'contact_us_enquiry' => $contact_us_enquiry,
            'contact_us_enquiry_count' => $contact_us_enquiry_count,
            'Contact_us_map' => $Contact_us_map,

        ];
        return view('ContactUs.contact_us_enquiries',$data);
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Add New Contact Us Entry Start
        if($request->input('contact_us_full_name') != null){
            $add_contact_us_entry = New ContactUsEnquiries([
                'name' => $request->input('contact_us_full_name'),
                'mobile' => $request->input('contact_us_mobile'),
                'email' => $request->input('contact_us_email'),
                'enquiry_query' => $request->input('contact_us_enquiry_query'),
                ]);    
            $add_contact_us_entry->save();
            return \Redirect::back();
        }
        //Add New Contact Us Entry End

        if(\Auth::User()->hasRole(['superadministrator','administrator'])){
         //Edit MAP Entry Start
       if($request->input('edited_map_id') != null){

        $requested_id = ContactUsMap::where('id','=',$request->input('edited_map_id'))->first();

        $requested_id->iframe =  $request->input('edited_map_iframe');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit MAP Entry End
    }




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
