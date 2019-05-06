<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyExpenses;

class DailyExpensesController extends Controller
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
        $title = 'Daily Expenses System';
        $daily_expenses = DailyExpenses::OrderBy('id','desc')->paginate(10);

        $data = [
            'title' => $title,
            'inc' => $inc,
            'daily_expenses' => $daily_expenses,

        ];
        return view('AdminPages.DailyExpensesSystem.index',$data);
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
        //Add New Daily Expenses Entry Start
        if($request->input('expense_name') != null){
            $add_daily_expenses = New DailyExpenses([
                'name' => $request->input('expense_name'),
                'expense_amount' => $request->input('expense_amount'),
                'month' => date('M'),
                'year' => date('Y'),
                ]);    
            $add_daily_expenses->save();
            return \Redirect::back();
        }
        //Add New Daily Expenses Entry End

         //Edit Daily Expenses Entry Start
       if($request->input('edited_daily_expense_id') != null){

        $requested_id = DailyExpenses::where('id','=',$request->input('edited_daily_expense_id'))->first();

        $requested_id->name =  $request->input('edited_daily_expense_name');
        $requested_id->expense_amount =  $request->input('edited_daily_expense_amount');
        $requested_id->save();
        return \Redirect::back();
        }
        //Edit Daily Expenses Entry End

        //Delete Daily Expenses Entry Start
       if($request->input('delete_expense_id') != null){

        $delete_requested_id = DailyExpenses::where('id','=',$request->input('delete_expense_id'))->first();
        $delete_requested_id->delete();
        return \Redirect::back();   
        }
        //Delete Daily Expenses Entry End



         //Daily Expenses Items Monthly PDF Report Start
         if($request->input('daily_expense_pdf_month') != null){

            $inc = 1;

            $DailyExpenses_report = DailyExpenses::where([
                ['month', '=', $request->input('daily_expense_pdf_month')],
                ['year', '=', $request->input('daily_expense_pdf_year')],
                ])->get();

                $params = [
                'title' => 'Daily Expenses Report ',
                'inc' => $inc,
                'DailyExpenses_report' => $DailyExpenses_report,
                'month' => $request->input('daily_expense_pdf_month'),
                'year' => $request->input('daily_expense_pdf_year'),
                ];
            

            return view('AdminPages.DailyExpensesSystem.month_report')->with($params);
            $pdf = \PDF::loadView('AdminPages.DailyExpensesSystem.month_report', $params)->setPaper('a4', 'landscape');            
            return $pdf->download('Payment_To_Vendor_Paid_Report='.$request->input('payment_to_vendor_paid_items_pdf_month').'-'.$request->input('payment_to_vendor_paid_items_pdf_year').'.pdf');
        }
        // Daily Expenses Items Monthly PDF Report End






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
