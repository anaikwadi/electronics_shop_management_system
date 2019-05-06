<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;


class CustomerController extends Controller
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
        $title = 'Add Customer Entry';
        $Customers = Customer::paginate(10);

        $data = [
            'title' => $title,
            'inc' => $inc,
            'Customers' => $Customers,

        ];
        return view('AdminPages.CustomerSystem.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $title = 'Generate Bill';
        $Customers = Customer::paginate(10);

        $data = [
            'title' => $title,
            'Customers' => $Customers,

        ];
        return view('AdminPages.CustomerSystem.generate_bill',$data);
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
        if($request->input('customer_name') != null){
            $add_Customer = New Customer([
                'name' => $request->input('customer_name'),
                'mobile' => $request->input('customer_mobile'),
                'email' => $request->input('customer_email'),
                'address' => $request->input('customer_address'),
                'month' => date('M'),
                'year' => date('Y'),
                ]);    
            $add_Customer->save();
            return \Redirect::back();
        }
        //Add New Customer Entry End


        //Edit Customer Entry Start
       if($request->input('edited_record_customer_name') != null){

        $requested_id = Customer::where('id','=',$request->input('edited_customer_id'))->first();

        $requested_id->name =  $request->input('edited_record_customer_name');
        $requested_id->mobile =  $request->input('edited_record_customer_mobile');
        $requested_id->email =  $request->input('edited_record_customer_email');
        $requested_id->address =  $request->input('edited_record_customer_address');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit Customer Entry End
        
         //Delete Customer Entry Start
       if($request->input('delete_customer_id') != null){

        $delete_requested_id = Customer::where('id','=',$request->input('delete_customer_id'))->first();
        $delete_requested_id->delete();
        return \Redirect::back();   
        }
        //Delete Customer Entry End






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
