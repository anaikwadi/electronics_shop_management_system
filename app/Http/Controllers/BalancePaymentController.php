<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Purchase;
use App\SaleSystem;


class BalancePaymentController extends Controller
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
        $title = 'Balance Payment System';
        $balance_payment = SaleSystem::where([
            ['balance_amount', '!=', NULL],
            ['balance_amount', '!=', 0],
            ['bill_number', '!=', 0],
            ])->paginate(15);
        $customer_name = Customer::all();

        $data = [
            'title' => $title,
            'inc' => $inc,
            'balance_payment' => $balance_payment,
            'customer_name' => $customer_name,
        ];
        return view('AdminPages.BalancePaymentSystem.index',$data);
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
        //Add Balance Payment Entry Start
        if($request->input('add_to_balance_id') != null){

        $add_payment = SaleSystem::where('id','=',$request->input('add_to_balance_id'))->first();

        $add_payment->paid_amount =   $add_payment->paid_amount + $request->input('add_to_balance_paid_amount');
        
        $balanace_amount =  $add_payment->balance_amount  - $request->input('add_to_balance_paid_amount');
        if($balanace_amount == 0){
            $add_payment->balance_amount =  NULL;
        }else{
            $add_payment->balance_amount =  $add_payment->balance_amount  - $request->input('add_to_balance_paid_amount');
        }
        $add_payment->save();

                $inc = 1;
                $last_bill_number = SaleSystem::where('bill_number','=',$add_payment->bill_number)->first();
                $bill_sale_items = SaleSystem::where('bill_number','=',$last_bill_number->bill_number)->get();
                $last_bill_paid_bal_details = SaleSystem::where('bill_number','=',$last_bill_number->bill_number)->where('status','=',1)->first();
                $Customers = Customer::all();
                $purchase_items = Purchase::all();

                $params = [
                    'title' => 'Submit Invoice',                    
                    'inc' => $inc,
                    'bill_sale_items' => $bill_sale_items,                    
                    'last_bill_paid_bal_details' => $last_bill_paid_bal_details,                    
                    
                    'Customers' => $Customers,                    
                    'purchase_items' => $purchase_items,                    
                    'last_bill_number' => $last_bill_number->bill_number,                    
                    'item_id' => $last_bill_number->item_id,                    
                    'customer_id' => $last_bill_number->customer_id,                    
                    'quantity' => $last_bill_number->quantity,                    
                    'sale_price' => $last_bill_number->sale_price,                    
                    'percent_gst' => $last_bill_number->percent_gst,                    
                    'bill_date' => $last_bill_number->created_at,                    
                    ];
                

                // return view('AdminPages.BalancePaymentSystem.invoice_report')->with($params);
                // $pdf = \PDF::loadView('AdminPages.BalancePaymentSystem.invoice_report', $params);
                $pdf = \PDF::loadView('AdminPages.BalancePaymentSystem.invoice_report', $params)->setPaper('a5', 'portrait');            
                return $pdf->download('Invoice_Report_of-#'.$last_bill_number->bill_number.'.pdf');




        return \Redirect::back();
        }
        //Add Balance Payment Entry End
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $inc = 1;
        $title = 'Bill Details';
        $bill_details = SaleSystem::where('bill_number','=',$id)->get();
        $item_name = Purchase::all();
        $customer_name = Customer::all();
        // $purchase_items = Purchase::where('id','=',$latest_offers->item_id)->first();

        
        $data = [
            'title' => $title,
            'inc' => $inc,
            'bill_details' => $bill_details,
            'item_name' => $item_name,
            'customer_name' => $customer_name,
        ];
        return view('AdminPages.BalancePaymentSystem.view_bill_details',$data);
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
