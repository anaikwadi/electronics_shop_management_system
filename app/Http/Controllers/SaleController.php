<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Purchase;
use App\SaleSystem;
use App\StockAvailable;
use App\MasterEntryCompany;
use App\MasterEntryModel;


class SaleController extends Controller
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

        $bill_number = SaleSystem::where('status','=',1)->OrderBy('bill_number','desc')->first();
        $next_bill_number = $bill_number->bill_number + 1;

        $Customers = Customer::paginate(10);
        $purchase_items = Purchase::all();
        $choose_class = Purchase::pluck('company_name', 'id');
        $sale_items = SaleSystem::all();
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
            'sale_items' => $sale_items,
            'company_names' => $company_names,
            'model_names' => $model_names,
            'stock_available' => $stock_available,
            'total_amt' => $total_amt,

        ];
        return view('AdminPages.SaleSystem.index', compact('choose_class'),$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $inc = 1;
        $title = 'Download Sale Report';
        $Customers = Customer::paginate(10);


        $data = [
            'inc' => $inc,
            'title' => $title,
            'Customers' => $Customers,

        ];
        return view('AdminPages.SaleSystem.report_page',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Add New Sale Item Entry Start
        if($request->input('sale_item_id') != null){

            $bill_number = SaleSystem::where('status','=',1)->OrderBy('bill_number','desc')->first();
            $last_bill_number = $bill_number->bill_number + 1;

            $purches_price = Purchase::where('id','=',$request->input('sale_item_id'))->first();

            $new_unit_price =  $purches_price->unit_price + round( ($purches_price->unit_price * $purches_price->percent_gst)/100, 2);

            $add_sale_item = New SaleSystem([
                'bill_number' => $last_bill_number,
                'item_id' => $request->input('sale_item_id'),
                'actual_price' =>  $new_unit_price ,
                'quantity' => $request->input('sale_quantity'),
                'sale_price' => $request->input('sale_price'),
                'percent_gst' => $purches_price->percent_gst,
                'total' => $request->input('sale_quantity') * $request->input('sale_price'),
                'month' => date('M'),
                'year' => date('Y'),
                ]);    
            $add_sale_item->save();

            //Update Available Stock Start
            $purchase_report = Purchase::where([
                ['id', '=', $request->input('sale_item_id')],
                ])->first();

            $update_available_quantity = StockAvailable::where([
                ['vendor_id', '=', $purchase_report->vendor_id],
                ['company_id', '=', $purchase_report->company_name],
                ['model_id', '=', $purchase_report->model_name],
                ])->first();

            // $update_available_quantity = StockAvailable::where('item_id','=',$request->input('sale_item_id'))->first();
            $update_available_quantity->available_quantity =  $update_available_quantity->available_quantity - $request->input('sale_quantity');
            $update_available_quantity->save();
            //Update Available Stock End


            return \Redirect::back();
        }
        //Add New Sale Item Entry End


         //Delete Sale Items Entry Start
       if($request->input('delete_sale_item_id') != null){

        $delete_requested_id = SaleSystem::where('id','=',$request->input('delete_sale_item_id'))->first();

        //Update Available Stock Start
        $purchase_report = Purchase::where([
            ['id', '=', $delete_requested_id->item_id],
            ])->first();

        $update_available_quantity = StockAvailable::where([
            ['vendor_id', '=', $purchase_report->vendor_id],
            ['company_id', '=', $purchase_report->company_name],
            ['model_id', '=', $purchase_report->model_name],
            ])->first();

        // $update_available_quantity = StockAvailable::where('item_id','=',$delete_requested_id->item_id)->first();
        $update_available_quantity->available_quantity =  $update_available_quantity->available_quantity +  $delete_requested_id->quantity;
        $update_available_quantity->save();
        //Update Available Stock End

        $delete_requested_id->delete();

        return \Redirect::back();
        }
        //Delete Sale Items Entry End


         //Submit Invoice Entry Start
       if($request->input('sale_item_customer_name') != null){


        $validatedData = $request->validate([
            // 'sale_item_customer_name' => 'required',
            // 'sale_item_payment_method' => 'required',
            'sale_item_amount_paid' => 'required',
        ]);

        $update_id = SaleSystem::where('status','=', 0 )->get();

        $final_total = 0;
                foreach($update_id as $items){
                    $items->customer_id = $request->input('sale_item_customer_name');
                    $items->payment_method = $request->input('sale_item_payment_method');
                    $items->due_date = $request->input('sale_item_due_date');
                    //$items->paid_amount = $request->input('sale_item_amount_paid');
                    $final_total = $final_total + $items->total;
                    //$items->balance_amount = $items->total - $request->input('sale_item_amount_paid');
                    $items->status = 1;
                    $items->save();
                }

                $update_balance_amount = SaleSystem::where('status','=',1)->OrderBy('bill_number','desc')->first();
                if($update_balance_amount->paid_amount == NULL && $update_balance_amount->balance_amount == NULL){
                $update_balance_amount->paid_amount = $request->input('sale_item_amount_paid');
                $update_balance_amount->balance_amount = $final_total - $request->input('sale_item_amount_paid');
                $update_balance_amount->save();
                }

                $inc = 1;
                $last_bill_number = SaleSystem::where('status','=',1)->OrderBy('bill_number','desc')->first();
                $bill_sale_items = SaleSystem::where('bill_number','=',$last_bill_number->bill_number)->OrderBy('bill_number','desc')->get();
                $last_bill_paid_bal_details = SaleSystem::where('status','=',1)->OrderBy('bill_number','desc')->first();
                $Customers = Customer::all();
                $purchase_items = Purchase::all();
                $company_names = MasterEntryCompany::OrderBy('id','desc')->get();
                $model_names = MasterEntryModel::OrderBy('id','desc')->get();

                $params = [
                    'title' => 'Submit Invoice',                    
                    'inc' => $inc,                    
                    'Customers' => $Customers,                    
                    'purchase_items' => $purchase_items,                    
                    'company_names' => $company_names,                    
                    'model_names' => $model_names,                    
                    'last_bill_number' => $last_bill_number->bill_number,                    
                    'last_bill_paid_bal_details' => $last_bill_paid_bal_details,                    
                    'bill_sale_items' => $bill_sale_items,                    
                    'item_id' => $last_bill_number->item_id,                    
                    'customer_id' => $last_bill_number->customer_id,                    
                    'quantity' => $last_bill_number->quantity,                    
                    'sale_price' => $last_bill_number->sale_price,                    
                    'percent_gst' => $last_bill_number->percent_gst,                    
                    'bill_date' => $last_bill_number->created_at,                    
                    'month' => $request->input('purchase_items_pdf_month'),
                    ];
                

                // return view('AdminPages.SaleSystem.invoice_report')->with($params);
                // $pdf = \PDF::loadView('AdminPages.SaleSystem.invoice_report', $params);
                $pdf = \PDF::loadView('AdminPages.SaleSystem.invoice_report', $params)->setPaper('a5', 'portrait');            
                return $pdf->download('Invoice_Report_of-#'.$last_bill_number->bill_number.'.pdf');
            
                
        return \Redirect::back();
        }
        //Submit Invoice Entry End


         //Sale Items Monthly PDF Report Start
         if($request->input('sale_items_pdf_month') != null){

            $inc = 1;
            $Customers = Customer::all();
            $purchase_items = Purchase::all();
            $company_names = MasterEntryCompany::OrderBy('id','desc')->get();
            $model_names = MasterEntryModel::OrderBy('id','desc')->get();

            $sale_report = SaleSystem::where([
                ['month', '=', $request->input('sale_items_pdf_month')],
                ['year', '=', $request->input('sale_items_pdf_year')],
                ])->get();

                $params = [
                'title' => 'Sale Items PDF Report ',
                'inc' => $inc,
                'Customers' => $Customers,
                'purchase_items' => $purchase_items,
                'sale_report' => $sale_report,
                'company_names' => $company_names,
                'model_names' => $model_names,
                'month' => $request->input('sale_items_pdf_month'),
                'year' => $request->input('sale_items_pdf_year'),
                ];
            

            return view('AdminPages.SaleSystem.month_report')->with($params);
            $pdf = \PDF::loadView('AdminPages.SaleSystem.month_report', $params)->setPaper('a4', 'landscape');            
            return $pdf->download('Sale_Report='.$request->input('sale_items_pdf_month').'-'.$request->input('sale_items_pdf_year').'.pdf');
        }
        // Sale Items Monthly PDF Report End












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
