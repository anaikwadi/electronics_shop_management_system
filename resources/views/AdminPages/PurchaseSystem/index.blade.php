@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>

<form method="post" action="{{ route('purchase.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
    {{ csrf_field() }}
    
<div class="row">
    <div class="col-md-12">
 {{-- Search Custome Start --}}
 <script src="https://code.jquery.com/jquery-latest.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">

                <tr>
                    <th>
                        <select class="form-control selectpicker" name="purchase_vendor_id" required>
                            <option disabled value="" selected>--- Select Vendor Name ---</option>
                            @foreach($vendors as $cust)
                                <option value="{{ $cust->id }}" data-tokens="{{ $cust->name }}">{{ $cust->name }}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
        </table>
 <table class="table table-responsive table-striped table-bordered">
 <thead>
     <tr>
         <td>Company Name</td>
         <td>Model Name</td>
         <td>HSN</td>
         <td>Quantity</td>
         <td>Amount</td>
         <td>GST %</td>
         <td>Action</td>
     </tr>
 </thead>
 <tbody id="TextBoxContainer">
 </tbody>
 <tfoot>
     
   <tr>
     <th colspan="5">
        <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more controls">
            <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;+ Add More&nbsp;
        </button>
    </th>
   </tr>
 </tfoot>
 </table>
 </div>

 <?php $i = 0; ?>
 <script>

$(function () {
$("#btnAdd").bind("click", function () {
var div = $("<tr />");
div.html(GetDynamicTextBox(""));
$("#TextBoxContainer").append(div);
});
$("body").on("click", ".remove", function () {
$(this).closest("tr").remove();
});
});

function GetDynamicTextBox(value) {
// return '<td><input name = "company_name[]" placeholder="Company Name" type="text" value = "' + value + '" class="form-control" required /></td>' + '<td><input name = "model_name[]" placeholder="Model Name" type="text" value = "' + value + '" class="form-control" required /></td>' + '<td><input name = "hsn[]" placeholder="Enter HSN" type="text" value = "' + value + '" class="form-control" required /></td>' + '<td><input name = "quantity[]" placeholder="Enter Quantity" type="text" value = "' + value + '" class="form-control" required /></td>' + '<td><input name = "unit_price[]" placeholder="Enter Amount" type="text" value = "' + value + '" class="form-control" required /></td>' + '<td><select class="form-control selectpicker" name="per_gst[]" required> <option disabled selected>--- Select GST % ---</option> <option value="18">18</option> <option value="28">28</option></select></td>' + '<td><button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove-sign"></i>X</button></td>'
return '<td><select class="form-control selectpicker" name="company_name[]" required> <option disabled selected>--- Select Company ---</option>@foreach($company_names as $c_name) <option value="{{$c_name->id}}">{{ $c_name->company_name }}</option>@endforeach</select></td>' + '<td><select class="form-control selectpicker" name="model_name[]" required> <option disabled selected>--- Select Model ---</option>@foreach($model_names as $m_name) <option value="{{$m_name->id}}">{{ $m_name->model_name }}</option>@endforeach</select></td>'  + '<td><input name = "hsn[]" placeholder="Enter HSN" type="text" value = "' + value + '" class="form-control" required /></td>' + '<td><input name = "quantity[]" placeholder="Enter Quantity" type="text" value = "' + value + '" class="form-control" required /></td>' + '<td><input name = "unit_price[]" placeholder="Enter Amount" type="text" value = "' + value + '" class="form-control" required /></td>' + '<td><select class="form-control selectpicker" name="per_gst[]" required> <option disabled selected>--- Select GST % ---</option> <option value="18">18</option> <option value="28">28</option></select></td>' + '<td><button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove-sign"></i>X</button></td>'

}
     </script>
{{-- Search Custome End --}}
    </div>
</div>

<input type="hidden" name="_token" value="{{ Session::token() }}">
<button type="submit" class="btn btn-outline-success btn-lg pull-right"> Submit</button>
</form>

<br><br>
<h2>All Purchase Item Records</h2>
<br>

<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Bill Date</th> 
            <th>Bill Number</th>
            <th>Vendor Name</th>
            <th>Company Name</th>
            <th>Model Name</th>
            <th>Quantity</th>
            <th>HSN</th> 
            <th>GST % </th> 
            <th>Grand Amount</th>
            <th> Action</th>
        </tr>
        
        @php $print_total = 0; @endphp
        @php $inc = ($purchase_report->currentpage() - 1) * $purchase_report->perpage() + 1; @endphp
        @foreach($purchase_report as $item)
            <tr>
                <td align="center">
                    {{ $inc }}
                </td>

                <td align="center">
                    {{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}
                </td>

                <td align="center">
                    {{ $item->bill_number }}
                </td>
                
                <td>
                    @foreach($vendors as $vendor_name)
                        @if($vendor_name->id == $item->vendor_id)
                        {{ $vendor_name->name }}
                        @endif
                    @endforeach
                </td>

                <td>
                        @foreach($company_names as $c_name)
                            @if($c_name->id ==  $item->company_name)
                                 {{ $c_name->company_name }}
                            @endif
                        @endforeach
                </td>

                <td>
                        @foreach($model_names as $m_name) 
                            @if($m_name->id ==  $item->model_name)
                                {{ $m_name->model_name }}
                            @endif
                        @endforeach
                </td>

                <td align="center">
                    {{ $item->quantity }} 
                </td>

                <td align="center">
                    {{ $item->hsn }}
                </td>

                <td align="center">
                    {{ $item->percent_gst }}
                </td>
                
                <td align="center">
                    {{ $item->total }} 
                </td>

                <td>
                    @role(['superadministrator','administrator']) 
                    {{-- edit_record_modal.blade include Start --}}
                    @include('AdminPages.PurchaseSystem.edit_record_modal')
                    {{-- edit_record_modal.blade End --}}                                                
                    <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_record_modal{{$item->id}}"> Edit</button>
                    @endrole

                    @role(['superadministrator']) 
                        {{-- delete_record_modal.blade include Start --}}
                        @include('AdminPages.PurchaseSystem.delete_record_modal')
                        {{-- delete_record_modal.blade End --}}          
                        <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_record_modal{{$item->id}}"> Delete</button>                           
                    @endrole
                    
                </td>
               
            </tr>
            <?php $print_total = $print_total + $item->total;?>
            <?php $inc++; ?>
        @endforeach
        
    </table>
</div>
Showing {{ $purchase_report->firstItem() }} TO  {{ $purchase_report->lastItem() }} of {{ $purchase_report->total() }} (for page {{ $purchase_report->currentPage() }} )
<div class="pull-right">
{!! $purchase_report->render() !!}
</div>


@endsection