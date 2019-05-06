<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterEntryCompany;
use App\MasterEntryModel;

class MasterEntryController extends Controller
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
        $title = 'Add Company/ Model Name Entry';
        $company_names = MasterEntryCompany::OrderBy('id','desc')->paginate(10,['*'],'company_names');
        $model_names = MasterEntryModel::OrderBy('id','desc')->paginate(10,['*'],'model_names');
       

        $data = [
            'title' => $title,
            'inc' => $inc,
            'company_names' => $company_names,
            'model_names' => $model_names,

        ];
        return view('AdminPages.MasterEntrySystem.index',$data);
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
         //Add New Company Entry Start
         if($request->input('master_company_name') != null){
            $add_company_name = New MasterEntryCompany([
                'company_name' => $request->input('master_company_name'),
                'month' => date('M'),
                'year' => date('Y'),
                ]);    
            $add_company_name->save();
            return \Redirect::back();
        }
        //Add New Company Entry End

         //Add New Model Entry Start
         if($request->input('master_model_name') != null){
            $add_company_name = New MasterEntryModel([
                'model_name' => $request->input('master_model_name'),
                'month' => date('M'),
                'year' => date('Y'),
                ]);    
            $add_company_name->save();
            return \Redirect::back();
        }
        //Add New Model Entry End


         //Edit Master Company Name Entry Start
       if($request->input('edited_master_company_id') != null){

        $requested_id = MasterEntryCompany::where('id','=',$request->input('edited_master_company_id'))->first();

        $requested_id->company_name =  $request->input('edited_master_company_name');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit  Master Company Name Entry End


         //Edit Master Model Name Entry Start
       if($request->input('edited_master_model_id') != null){

        $requested_id = MasterEntryModel::where('id','=',$request->input('edited_master_model_id'))->first();

        $requested_id->model_name =  $request->input('edited_master_model_name');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit  Master Model Name Entry End



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
