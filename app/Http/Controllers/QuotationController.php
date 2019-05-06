<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Customer;
use App\SaleSystem;
use App\Purchase;
use App\MasterEntryCompany;
use App\MasterEntryModel;
use App\StockAvailable;

class QuotationController extends Controller
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
        $title = 'Generate Bill';

        $bill_number = Quotation::where('status','=',1)->OrderBy('bill_number','desc')->first();
        $next_bill_number = $bill_number->bill_number + 1;

        $Customers = Customer::paginate(10);
        $purchase_items = Purchase::all();
        $quotation_items = Quotation::all();
        $company_names = MasterEntryCompany::OrderBy('id','desc')->get();
        $model_names = MasterEntryModel::OrderBy('id','desc')->get();
        $stock_available = StockAvailable::all();
        $total_amt = 0;
        

        $data = [
            'title' => $title,
            'inc' => $inc,
            'next_bill_number' => $next_bill_number,
            'Customers' => $Customers,
            'purchase_items' => $purchase_items,
            'quotation_items' => $quotation_items,
            'company_names' => $company_names,
            'model_names' => $model_names,
            'stock_available' => $stock_available,
            'total_amt' => $total_amt,

        ];
        return view('AdminPages.QuotationSystem.index', compact('choose_class'),$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $title = 'Download Quotation Report';

        $data = [
            'title' => $title,
        ];
        return view('AdminPages.QuotationSystem.report_page',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Add New Quotation Item Entry Start
        if($request->input('quotation_item_id') != null){

            $bill_number = Quotation::where('status','=',1)->OrderBy('bill_number','desc')->first();
            $last_bill_number = $bill_number->bill_number + 1;

            $purches_price = Purchase::where('id','=',$request->input('quotation_item_id'))->first();

            $new_unit_price =  $purches_price->unit_price + round( ($purches_price->unit_price * $purches_price->percent_gst)/100, 2);

            $add_sale_item = New Quotation([
                'bill_number' => $last_bill_number,
                'item_id' => $request->input('quotation_item_id'),
                'actual_price' =>  $new_unit_price ,
                'quantity' => $request->input('quotation_quantity'),
                'sale_price' => $request->input('quotation_price'),
                'percent_gst' => $purches_price->percent_gst,
                'total' => $request->input('quotation_quantity') * $request->input('quotation_price'),
                'month' => date('M'),
                'year' => date('Y'),
                ]);    
            $add_sale_item->save();
            return \Redirect::back();
        }
        //Add New Quotation Item Entry End

        //Delete Sale Items Entry Start
       if($request->input('delete_quotation_item_id') != null){

        $delete_requested_id = Quotation::where('id','=',$request->input('delete_quotation_item_id'))->first();
        $delete_requested_id->delete();
        return \Redirect::back();
        }
        //Delete Sale Items Entry End


          //Submit Quotation Entry Start
       if($request->input('quotation_item_customer_name') != null){

        $validatedData = $request->validate([
            'quotation_item_customer_name' => 'required',
        ]);

        $update_id = Quotation::where('status','=', 0 )->get();

        $final_total = 0;
                foreach($update_id as $items){
                    $items->customer_id = $request->input('quotation_item_customer_name');
                    $final_total = $final_total + $items->total;
                    $items->status = 1;
                    $items->save();
                }

                $inc = 1;
                $last_bill_number = Quotation::where('status','=',1)->OrderBy('bill_number','desc')->first();
                $bill_sale_items = Quotation::where('bill_number','=',$last_bill_number->bill_number)->OrderBy('bill_number','desc')->get();
                $Customers = Customer::all();
                $purchase_items = Purchase::all();
                $company_names = MasterEntryCompany::all();
                $model_names = MasterEntryModel::all();

                $params = [
                    'title' => 'Submit Invoice',                    
                    'inc' => $inc,                    
                    'Customers' => $Customers,                    
                    'purchase_items' => $purchase_items, 
                    'company_names' => $company_names,                    
                    'model_names' => $model_names,                      
                    'last_bill_number' => $last_bill_number->bill_number,                    
                    'bill_sale_items' => $bill_sale_items,                    
                    'item_id' => $last_bill_number->item_id,                    
                    'customer_id' => $last_bill_number->customer_id,                    
                    'quantity' => $last_bill_number->quantity,                    
                    'sale_price' => $last_bill_number->sale_price,                    
                    'percent_gst' => $last_bill_number->percent_gst,                    
                    'bill_date' => $last_bill_number->created_at,                    
                    'month' => $request->input('purchase_items_pdf_month'),
                    ];
                

                //return view('AdminPages.QuotationSystem.quotation_report')->with($params);
                $pdf = \PDF::loadView('AdminPages.QuotationSystem.quotation_report', $params);
                //$pdf = \PDF::loadView('AdminPages.QuotationSystem.quotation_report', $params)->setPaper('a4', 'landscape');            
                return $pdf->download('Quotation_Report_of-#'.$last_bill_number->bill_number.'.pdf');
            
                
        return \Redirect::back();
        }
        //Submit Quotation Entry End


         // Quotation Items Monthly PDF Report Start
         if($request->input('quotation_items_pdf_month') != null){

            $inc = 1;
            $Customers = Customer::all();
            $purchase_items = Purchase::all();

            $sale_report = Quotation::where([
                ['month', '=', $request->input('quotation_items_pdf_month')],
                ['year', '=', $request->input('quotation_items_pdf_year')],
                ])->get();
            $company_names = MasterEntryCompany::OrderBy('id','desc')->get();
            $model_names = MasterEntryModel::OrderBy('id','desc')->get();

                $params = [
                'title' => 'Quotations PDF Report ',
                'inc' => $inc,
                'Customers' => $Customers,
                'purchase_items' => $purchase_items,
                'sale_report' => $sale_report,
                'company_names' => $company_names,
                'model_names' => $model_names,
                'month' => $request->input('quotation_items_pdf_month'),
                'year' => $request->input('quotation_items_pdf_year'),
                ];
            

            return view('AdminPages.QuotationSystem.month_report')->with($params);
            $pdf = \PDF::loadView('AdminPages.QuotationSystem.month_report', $params)->setPaper('a4', 'landscape');            
            return $pdf->download('Sale_Report='.$request->input('quotation_items_pdf_month').'-'.$request->input('quotation_items_pdf_year').'.pdf');
        }
        // Quotation Items Monthly PDF Report End











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
