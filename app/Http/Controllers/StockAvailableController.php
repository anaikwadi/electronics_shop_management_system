<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Purchase;
use App\StockAvailable;
use App\MasterEntryCompany;
use App\MasterEntryModel;



class StockAvailableController extends Controller
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
        $title = 'Stock Available System';
        // $stock_available = StockAvailable::OrderBy('id','desc')->paginate(20);
        $stock_available = StockAvailable::where([
            ['company_id', '!=', 0],
            ['model_id', '!=', 0],
            ])->OrderBy('id','desc')->paginate(10);
        $vendor_names = Vendor::all();
        $item_name = Purchase::all();
        $company_names = MasterEntryCompany::OrderBy('id','desc')->paginate(10,['*'],'company_names');
        $model_names = MasterEntryModel::OrderBy('id','desc')->paginate(10,['*'],'model_names');

        $data = [
            'title' => $title,
            'inc' => $inc,
            'stock_available' => $stock_available,
            'vendor_names' => $vendor_names,
            'item_name' => $item_name,
            'company_names' => $company_names,
            'model_names' => $model_names,
        ];
        return view('AdminPages.StockAvailableSystem.index',$data);
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
