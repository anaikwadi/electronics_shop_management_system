@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


<form method="post" action="{{ route('sale.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
    {{ csrf_field() }}

    <!--***** CONTENT *****-->     
 <div class="row">
        <div class="col-md-12">
            <div class="invoice-title "> 
                <div>
                   <p class="pull-right mt-3"> <b> Date : {{ \Carbon\Carbon::parse(date("Y-m-d"))->format('d-M-Y') }} </b> </p>
                    <center> 
                        <b> Bill Number #{{ $next_bill_number }} </b> <br>
                        <b> GSTIN : 27ADTFS1821K1ZL </b>
                    </center>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <b>From: </b>
                        <address>
                          <strong>SAI ELECTRONICS & HOME APPLIANCES.</strong><br>
                          S/G No. 151/60, Opp. Malpani Plaza,<br>
                          Janata Raja Road, Vidya Nagar,<br>
                          Sangamner - 422 605 <br><br>
                          <b>Mobile:</b> +91 77 09 161 143 / +91 77 44 050 516<br><br>
                          <b>Email:</b> electronicsai1@gmail.com
                        </address>
                </div>
                <div class="col-md-6 text-left">
                    <address>
                    <strong> To:</strong><br>
                
                    {{-- Search Custome Start --}}
                    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> --}}
                    <link href="{{ asset('css/ddsearch.css') }}" rel="stylesheet">
                    <link href="{{ asset('css/ddsearch2.css') }}" rel="stylesheet">
                    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> --}}

                        <div class="col-md-12 text-left">
                            <address>
                                <strong>Search Customer Name:</strong><br>
                                <div class="row-fluid">
                                        {{-- <select class="selectpicker" data-show-subtext="true" data-live-search="true"> --}}
                                        <select name="sale_item_customer_name" class="selectpicker" data-live-search="true" required>
                                            <option disabled value="" selected>-- Select Customer Name --</option>
                                            @foreach($Customers as $cust)
                                            <option value="{{ $cust->id }}" data-subtext="{{ $cust->name }}">{{ $cust->name }}</option>
                                            @endforeach
                                        </select>
                                    
                                    </div>
                            </address>
                        </div>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>     
                    {{-- Search Custome End --}}                   

                    </address>
                            
                            <div class="col-md-12 text-left">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    <select name="sale_item_payment_method" class="selectpicker" data-live-search="true" required>
                                        <option disabled value="" selected>-- Payment Method --</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Card</option>
                                        <option value="3">Cheque</option>
                                        <option value="4">Credit</option>
                                    </select>
                                </address>

                                    <address>
                                        <strong>Amount Due Date:</strong><br>
                                        <input type="date" name="sale_item_due_date" class="form-control name_list"/>
                                    </address>
                            </div>

                            


                </div>
            </div>
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order Summary</strong></h3>
                </div>

                <div class="panel-body">
                <div class="table-responsive">
                    <table class="table borderless">
                        <thead>
                            <tr class="bg-info text-white">
                                    <td>#</td>
                                    <td>Company Name</td>
                                    <td>Model Name</td>
                                    <td>Quantity</td>
                                    <td>Actual Amount</td>
                                    <td>Sale Amount</td>
                                    <td>% GST</td>
                                    <td>Total Amount</td>
                                    <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sale_items as $items)
                            @if($items->status == 0 && $items->item_id != 0)
                                <tr>
                                        <td> {{ $inc }} </td>

                                        <td>
                                            @foreach($purchase_items as $pur_items) 
                                                @if($items->item_id == $pur_items->id)
                                                    @foreach($company_names as $c_name)
                                                        @if($c_name->id ==  $pur_items->company_name)
                                                            {{ $c_name->company_name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </td>
                        
                                        <td>
                                            @foreach($purchase_items as $pur_items) 
                                                @if($items->item_id == $pur_items->id)
                                                    @foreach($model_names as $m_name)
                                                        @if($m_name->id ==  $pur_items->model_name)
                                                            {{ $m_name->model_name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </td>
                                        
                                        {{-- @foreach($purchase_items as $pur_items) 
                                        @if($items->item_id == $pur_items->id)
                                        <td> {{ $pur_items->company_name}} => {{ $pur_items->model_name }} </td>
                                        @endif
                                        @endforeach --}}

                                        <td> {{ $items->quantity }} </td>
                                        <td> {{ $items->actual_price }} </td>
                                        <td> {{ $items->sale_price }} </td>
                                        <td> {{ $items->percent_gst }} </td>
                                        <td> {{ $items->total }} </td>
                                        <td> 
                                            @role(['superadministrator'])                                                      
                                            <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_sale_item_modal{{$items->id}}"> Delete</button>                           
                                            @endrole
                                        </td>
                                </tr>
                                <?php $total_amt = $total_amt + $items->total;  $inc++; ?>
                                @endif
                            @endforeach
                            
                                    <tr>
                                        <td colspan="7">  </td>
                                        <td width="15%"> 
                                                <strong>Amount Paid:</strong><br>
                                                <input type="text" name="sale_item_amount_paid" placeholder="{{ $total_amt }}" class="form-control name_list" required/>
                                         </td>
                                    </tr>
                        </tbody>
                       
                        
                            <tfoot> 
                                <tr>
                                    <th colspan="5">
                                        <button type="button" style="margin-right: 5px;" class="btn btn-primary" data-toggle="modal" data-target="#add_sale_item_modal"> + Add More</button>
                                    </th>
                                </tr>
                            </tfoot> 
                    </table>
                    
                        <div class="text-right">
                            {{-- <a class="btn btn-general btn-blue mr-3" href="invoice-page.html" target="_empty"><i class="fa fa-print"></i> Go Print</a> --}}
                            {{-- <button class="btn btn-general btn-white">Submit The Invoice</button> --}}
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" class="btn btn-lg btn-success">Submit The Invoice </button>
                        </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</form>

    {{-- add_sale_item_modal.blade include Start --}}
    @include('AdminPages.SaleSystem.add_sale_item_modal')
    {{-- add_sale_item_modal.blade End --}}  


    @foreach($sale_items as $items)
        {{-- delete_sale_item_modal.blade include Start --}}
        @include('AdminPages.SaleSystem.delete_sale_item_modal')
        {{-- delete_sale_item_modal.blade End --}}
    @endforeach


    

@endsection
<script>
    
</script>
