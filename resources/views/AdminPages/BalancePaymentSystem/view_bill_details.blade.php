@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th> Bill Number </th> 
            <th> Customer Name</th>
            <th> Customer Mobile</th>
            <th> Customer Address</th>
            <th> Bill Date</th>
        </tr>
    
        @foreach($bill_details as $details)
        @if($details->balance_amount != NULL || $details->balance_amount != 0 )
        <tr>
            <td> {{ $details->bill_number }} </td>
            <td>
                @foreach($customer_name as $name)
                    @if($name->id == $details->customer_id)
                        {{ $name->name }} 
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($customer_name as $name)
                    @if($name->id == $details->customer_id)
                        {{ $name->mobile }} 
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($customer_name as $name)
                    @if($name->id == $details->customer_id)
                        {{ $name->address }} 
                    @endif
                @endforeach
            </td>
            <td>  {{ \Carbon\Carbon::parse($details->created_at)->format('d-M-Y') }} </td> 
        </tr>
        @endif
        @endforeach   
    </table>
</div>

<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th> # </th> 
            <th> Product Name </th> 
            <th> Quantity </th>
            <th> Total </th>
        </tr>
    
        @php $total_amount = 0; @endphp
        @foreach($bill_details as $details)
        <tr>
            <td> {{ $inc }} </td>
            <td> 
                @foreach($item_name as $name)
                    @if($name->id == $details->item_id)
                        {{ $name->company_name }} => {{ $name->model_name }}
                    @endif
                @endforeach
            </td>
            <td> {{ $details->quantity }} </td>
            <td> {{ $details->total }} </td>
        </tr>
        @php $inc++; $total_amount = $total_amount + $details->total; @endphp
        @endforeach 
        <tr>
            <td colspan="3"> </td>
        <td> <b> Total : {{ $total_amount }} </b> </td>
        </tr>
    </table>
</div>

<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th> Paid Amount </th> 
            <th> Balance Amount</th>
            <th> Payment Due Date</th>
        </tr>
    
        @foreach($bill_details as $details)
            @if($details->balance_amount != NULL || $details->balance_amount != 0 )
            <tr>
                <td> {{ $details->paid_amount }} </td>
                <td> {{ $details->balance_amount }} </td>
                <td>  {{ \Carbon\Carbon::parse($details->due_date)->format('d-M-Y') }} </td> 
            </tr>
            @endif
        @endforeach   
    </table>
</div>


@endsection 