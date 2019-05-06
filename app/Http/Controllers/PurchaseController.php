<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Purchase;
use App\StockAvailable;
use App\MasterEntryCompany;
use App\MasterEntryModel;


class PurchaseController extends Controller
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
        $title = 'Add Purchase Entry';
        $vendors = Vendor::paginate(10);
        $purchase_report = Purchase::where([
            ['bill_number', '!=', 0],
            ])->OrderBy('bill_number','desc')->paginate(10);
        $company_names = MasterEntryCompany::OrderBy('id','desc')->paginate(10,['*'],'company_names');
        $model_names = MasterEntryModel::OrderBy('id','desc')->paginate(10,['*'],'model_names');
           


        $data = [
            'title' => $title,
            'inc' => $inc,
            'vendors' => $vendors,
            'purchase_report' => $purchase_report,
            'company_names' => $company_names,
            'model_names' => $model_names,

        ];
        return view('AdminPages.PurchaseSystem.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $title = 'Download Purchase Report';
        $vendors = Vendor::paginate(10);

        $data = [
            'title' => $title,
            'vendors' => $vendors,

        ];
        return view('AdminPages.PurchaseSystem.report_page',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Add Master Product Category
        //  if($request->input('purchase_vendor_id') == 0){
        //     return \Redirect::back();
        //  }

         if($request->input('purchase_vendor_id') != null){

            // $validatedData = $request->validate([
            //     'purchase_vendor_id' => 'required',
            // ]);
    

            $bill_number = Purchase::OrderBy('bill_number','desc')->first();
            $last_bill_number = $bill_number->bill_number + 1;
            //dd($last_bill_number);

            $i = 0;
            $company_name = $request->input('company_name');
            $model_name = $request->input('model_name');
            $hsn = $request->input('hsn');
            $quantity = $request->input('quantity');
            $unit_price = $request->input('unit_price');
            $per_gst = $request->input('per_gst');
            // dd($request->input('company_name'));

            if($company_name[$i] != NULL || $model_name[$i] != NULL || $hsn[$i] != NULL || $quantity[$i] != NULL || $unit_price[$i] != NULL){
                foreach($company_name as $name){
                    if($company_name[$i] != NULL || $model_name[$i] != NULL || $hsn[$i] != NULL || $quantity[$i] != NULL || $unit_price[$i] != NULL){

                        $new_unit_price = round($unit_price[$i] * (100 / ($per_gst[$i] + 100)), 2);

                        $gst = ($new_unit_price * $per_gst[$i])/100;
                        $sgst = ($new_unit_price * ($per_gst[$i]/2))/100;
                        $cgst = ($new_unit_price * ($per_gst[$i]/2))/100;

                        $add_purchase_items = New Purchase([
                        'bill_number' => $last_bill_number,
                        'vendor_id' => $request->input('purchase_vendor_id'),
                        'company_name' => $company_name[$i],
                        'model_name' => $model_name[$i],
                        'hsn' => $hsn[$i],
                        'quantity' => $quantity[$i],
                        'unit_price' => $new_unit_price,
                        'gst' => round($gst, 2),
                        'percent_gst' => $per_gst[$i],
                        'sgst' => round($sgst, 2),
                        'cgst' => round($cgst, 2),
                        'total' => $quantity[$i] * ($new_unit_price + $gst) ,
                        'month' => date('M'),
                        'year' => date('Y'),
                        ]);    
                    $add_purchase_items->save();


                    // Add Available Quantity Start

                    $aleady_added = StockAvailable::where([
                        ['vendor_id', '=', $request->input('purchase_vendor_id')],
                        ['company_id', '=', $company_name[$i]],
                        ['model_id', '=',$model_name[$i]],
                        ])->first();

                    if(count($aleady_added)>0){
                        $requested_id = StockAvailable::where('id','=',$aleady_added->id)->first();

                        $requested_id->available_quantity =  $requested_id->available_quantity + $quantity[$i];
                        $requested_id->save();
                        return \Redirect::back();
                    }else{
                        $available_item_quantity = New StockAvailable([
                            'item_id' => $add_purchase_items->id,
                            'company_id' => $company_name[$i],
                            'model_id' => $model_name[$i],
                            'vendor_id' => $request->input('purchase_vendor_id'),
                            'quantity' => $quantity[$i],
                            'available_quantity' => $quantity[$i],
                            ]);    
                        $available_item_quantity->save();                        
                    }

                   
                    // Add Available Quantity End

                    $i++;
                    }
                }
                }

            return \Redirect::back();
        }


         //Purchase Items Monthly PDF Report Start
         if($request->input('purchase_items_pdf_month') != null){

            $inc = 1;
            $vendors = Vendor::all();

            $purchase_report = Purchase::where([
                ['month', '=', $request->input('purchase_items_pdf_month')],
                ['year', '=', $request->input('purchase_items_pdf_year')],
                ])->get();
            $company_names = MasterEntryCompany::OrderBy('id','desc')->get();
            $model_names = MasterEntryModel::OrderBy('id','desc')->get();

                $params = [
                'title' => 'Purchase Items PDF Report ',
                'inc' => $inc,
                'vendors' => $vendors,
                'purchase_report' => $purchase_report,
                'company_names' => $company_names,
                'model_names' => $model_names,
                'month' => $request->input('purchase_items_pdf_month'),
                'year' => $request->input('purchase_items_pdf_year'),
                ];
            

            return view('AdminPages.PurchaseSystem.month_report')->with($params);
            $pdf = \PDF::loadView('AdminPages.PurchaseSystem.month_report', $params)->setPaper('a4', 'landscape');            
            return $pdf->download('AdminPages.Payment_To_Vendor_Paid_Report='.$request->input('payment_to_vendor_paid_items_pdf_month').'-'.$request->input('payment_to_vendor_paid_items_pdf_year').'.pdf');
        }
        // Purchase Items Monthly PDF Report End


        //Edit Purchase Items Entry Start
       if($request->input('edited_record_id') != null){
       


        $new_unit_price = round($request->input('edited_record_amount')  * (100 / ($request->input('edited_record_gst') + 100)), 2);

        $gst = ( $new_unit_price * $request->input('edited_record_gst'))/100;
        $sgst = ( $new_unit_price * ($request->input('edited_record_gst')/2))/100;
        $cgst = ( $new_unit_price * ($request->input('edited_record_gst')/2))/100;

        $total_amount = $request->input('edited_record_quantity') * ( $request->input('edited_record_amount') + $gst) ;


        $requested_id = Purchase::where('id','=',$request->input('edited_record_id'))->first();

        if( $requested_id->quantity < $request->input('edited_record_quantity') ){
            $final_available_stock = $request->input('edited_record_quantity')- $requested_id->quantity;
            $flag = 0;
        }else{
            $final_available_stock = $requested_id->quantity - $request->input('edited_record_quantity');
            $flag = 1;
        }
        $requested_id->bill_number =  $request->input('edited_record_bill_number');
        $requested_id->vendor_id =  $request->input('edit_purchase_vendor_id');
        $requested_id->company_name =  $request->input('edited_record_company_name');
        $requested_id->model_name =  $request->input('edited_record_model_name');
        $requested_id->hsn =  $request->input('edited_record_hsn');
        $requested_id->quantity =  $request->input('edited_record_quantity');
        $requested_id->unit_price =  $new_unit_price;
        $requested_id->percent_gst =  $request->input('edited_record_gst');
        $requested_id->gst =  round($gst, 2);
        $requested_id->sgst =  round($sgst, 2);
        $requested_id->cgst =  round($cgst, 2);
        $requested_id->total = ($new_unit_price + $gst) * $request->input('edited_record_quantity');
        $requested_id->save();

        //Edit Available Stock Start

        $aleady_added = StockAvailable::where([
            ['vendor_id', '=', $request->input('edit_purchase_vendor_id')],
            ['company_id', '=', $request->input('edited_record_company_name')],
            ['model_id', '=',$request->input('edited_record_model_name')],
            ])->first();

        if(count($aleady_added)>0){            
            if($flag == 0){
                $aleady_added->available_quantity =  $aleady_added->available_quantity + $final_available_stock;
            }else{
                $aleady_added->available_quantity =  $aleady_added->available_quantity - $final_available_stock;
            }
            $aleady_added->save();
            return \Redirect::back();
        }
        //Edit Available Stock End

        return \Redirect::back();
        }
        //Edit Purchase Items Entry End





        //Delete Purchase Items Entry Start
       if($request->input('delete_record_id') != null){

        $delete_requested_id = Purchase::where('id','=',$request->input('delete_record_id'))->first();

        //Delete Available Stock Start
        $update_available_quantity = StockAvailable::where('item_id','=',$delete_requested_id->id)->first();
        $update_available_quantity->delete();
        //Delete Available Stock End


        $delete_requested_id->delete();
        return \Redirect::back();
        }
        //Delete Purchase Items Entry End




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
