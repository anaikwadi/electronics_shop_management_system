@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>

<form method="post" action="{{ route('customer.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
    {{ csrf_field() }}
    
<div class="row">
    <div class="col-md-12">
       
            <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <td> Name</td>
                    <td> Mobile</td>
                    <td> Email</td>
                    <td> Address</td>
                </tr>

                <tr>
                        <td>
                            <input name = "customer_name" placeholder="Customer Name" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "customer_mobile" placeholder="Customer mobile" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "customer_email" placeholder="Customer Email" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "customer_address" placeholder="Customer Address" type="text" class="form-control" required />
                        </td>
                </tr>

            </thead>
            <tbody>
            </tbody>
            </table>
 </div>
</div>

<input type="hidden" name="_token" value="{{ Session::token() }}">
<button type="submit" class="btn btn-outline-success btn-lg pull-right"> Add Customer</button>
</form>

<br><br>
<h2>All Customers Records</h2>
<br>

<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th>#</th>
            <th> Name</th> 
            <th> Mobile</th>
            <th> Email</th>
            <th> Address</th>
            {{-- <th>Bills</th> --}}
            <th> Action</th>
        </tr>

        @php $inc = ($Customers->currentpage() - 1) * $Customers->perpage() + 1; @endphp
        @foreach($Customers as $customer)
        <tr>
            <td> {{ $inc }} </td>
            <td> {{ $customer->name }} </td>
            <td> {{ $customer->mobile }} </td>
            <td> {{ $customer->email }} </td>
            <td> {{ $customer->address }} </td>
            {{-- <td> {{ $customer->bill_number }} </td> --}}
            <td>  
                @role(['superadministrator','administrator']) 
                {{-- edit_customer_modal.blade include Start --}}
                @include('AdminPages.CustomerSystem.edit_customer_modal')
                {{-- edit_customer_modal.blade End --}}                                                
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_customer_modal{{$customer->id}}"> Edit</button>
                @endrole

                @role(['superadministrator']) 
                {{-- delete_customer_modal.blade include Start --}}
                @include('AdminPages.CustomerSystem.delete_customer_modal')
                {{-- delete_customer_modal.blade End --}}          
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_customer_modal{{$customer->id}}"> Delete</button>                           
                @endrole
            </td>
        </tr>
        <?php $inc++; ?>
        @endforeach   
    </table>
</div>

Showing {{ $Customers->firstItem() }} TO  {{ $Customers->lastItem() }} of {{ $Customers->total() }} (for page {{ $Customers->currentPage() }} )
<div class="pull-right">
{!! $Customers->render() !!}
</div>


@endsection