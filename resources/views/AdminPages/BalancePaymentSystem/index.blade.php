@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>

<div class="table table-responsive">
    <table class="table table-responsive table-striped table-bordered">
    <tr>
        <th># </th>
        <th> Bill Number </th> 
        <th> Customer Name</th>
        <th> Customer Mobile</th>
        <th> Total Amount</th>
        <th> Paid Amount</th>
        <th> Balance Amount</th>
        <th> Due Date</th>
        <th> Action</th>
    </tr>

    @php $inc = ($balance_payment->currentpage() - 1) * $balance_payment->perpage() + 1; @endphp
    @foreach($balance_payment as $balance)
    <tr>
        <td align="center"> {{ $inc }} </td>
        <td align="center"> {{ $balance->bill_number }} </td>
        <td>
            @foreach($customer_name as $name)
                @if($name->id == $balance->customer_id)
                    {{ $name->name }} 
                @endif
            @endforeach
        </td>
        <td>
            @foreach($customer_name as $name)
                @if($name->id == $balance->customer_id)
                    {{ $name->mobile }} 
                @endif
            @endforeach
        </td>
        <td> {{ $balance->paid_amount + $balance->balance_amount }} </td>
        <td> {{ $balance->paid_amount }} </td>
        <td> {{ $balance->balance_amount }} </td>
        <td>
            @php $dateNow = Carbon\Carbon::now();    @endphp
                @if(\Carbon\Carbon::parse($balance->due_date)->lt($dateNow))
                    <button class="btn btn-danger btn-sm" role="button">{{ \Carbon\Carbon::parse($balance->due_date)->format('d-M-Y') }}</button>
                @else
                    <button class="btn btn-success btn-sm" role="button">{{ \Carbon\Carbon::parse($balance->due_date)->format('d-M-Y') }}</button>
                @endif
        </td>
        <td>  
            <a href="{{ URL::to('/view_bill/'.$balance->bill_number) }}">
            <button type="button" class="btn btn-outline-success">  View Bill</button>
            </a>

            {{-- add_balance_payment_modal.blade include Start --}}
            @include('AdminPages.BalancePaymentSystem.add_balance_payment_modal')
            {{-- add_balance_payment_modal.blade End --}}                                                
            <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#add_balance_payment_modal{{$balance->id}}"> Add Payment</button>
        </td>
       
    </tr>
   @php $inc++; @endphp
    @endforeach   
</table>
</div>

Showing {{ $balance_payment->firstItem() }} TO  {{ $balance_payment->lastItem() }} of {{ $balance_payment->total() }} (for page {{ $balance_payment->currentPage() }} )
<div class="pull-right">
{!! $balance_payment->render() !!}
</div>




@endsection