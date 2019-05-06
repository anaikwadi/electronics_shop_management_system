@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


<div class="row">
    <div class="col-md-12">

            <form method="post" action="{{ route('daily_expenses.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
                {{ csrf_field() }}
                
            <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <td> Name</td>
                    <td> Expense Amount</td>
                    <td> Action </td>
                </tr>

                <tr>
                        <td>
                            <input name = "expense_name" placeholder="Expense Name" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "expense_amount" placeholder="Expense Amount" type="text" class="form-control" required />
                        </td>

                        <td>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-outline-success btn-lg "> Add </button>
                        </td>
                </tr>

            </thead>
            <tbody>
            </tbody>
            </table>
        </form>

 </div>
</div>





<h2>Download Report</h2>
<br>
<form method="post" action="{{ route('daily_expenses.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
        {{ csrf_field() }} 


<div class="row">
<div class="col-md-12">
        
    <table class="table table-responsive table-striped table-bordered">
        <tr>
                <th width="40%">Select Month</th>
                <th width="40%">Select Year</th>                                            
                <th>Action</th>
            </tr>            
       
            <tr>                
                <?php 
                $currently_selected = date('Y');
                $earliest_year = 2016;
                $latest_year = date('Y');
                ?>
                <td>                                           
                        <div class="form-group">
                            <div class="col-sm-12"> 
                                <?php                         
                                    echo "<select  class=form-control name=daily_expense_pdf_month>";
                                    for($i=0;$i<=11;$i++){
                                    $month=date('M',strtotime("first day of -$i month"));
                                    $month1=date('F',strtotime("first day of -$i month"));
                                    echo "<option value=$month>$month1</option> ";
                                    }
                                    echo "</select>";
                            ?>
                            </div>
                        </div>
                  </td>

                  <td>
                        <div class="form-group">
                            <div class="col-sm-12"> 
                                <select class="form-control" name="daily_expense_pdf_year" >
                                @foreach ( range( $latest_year, $earliest_year ) as $i )
                                        <option value="{{ $i }}"> {{ $i }}</option> 
                                @endforeach  
                                </select>
                            </div>
                        </div>
                  </td>
                  
                  <td>
                        @role(['superadministrator','administrator'])
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <button type="submit" class="btn btn-info pull-left"><i class="fa fa-download"></i> Generate PDF</button>  
                        @endrole

                  </td>
                  </tr>
                  
</table>
</form>
</div>
</div>







<h2>All Expense</h2>
<br>

<div class="row">
        <div class="col-md-12">
                    
                <table class="table table-responsive table-striped table-bordered">
                <thead>
                    <tr>
                        <td> #</td>
                        <td> Name</td>
                        <td> Expense Amount</td>
                        <td> Action </td>
                    </tr>

                    @php $inc = ($daily_expenses->currentpage() - 1) * $daily_expenses->perpage() + 1; @endphp
                    @foreach($daily_expenses as $expense)
                    <tr>
                            <td>{{ $inc }}</td>
                            <td>{{ $expense->name }}</td>

                            <td>{{ $expense->expense_amount }}</td>
                            
                            <td>
                                    @role(['superadministrator','administrator']) 
                                    {{-- edit_expense_modal.blade include Start --}}
                                    @include('AdminPages.DailyExpensesSystem.edit_expense_modal')
                                    {{-- edit_expense_modal.blade End --}}                                                
                                    <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_expense_modal{{$expense->id}}"> Edit</button>
                                    @endrole
                    
                                    @role(['superadministrator']) 
                                    {{-- delete_expense_modal.blade include Start --}}
                                    @include('AdminPages.DailyExpensesSystem.delete_expense_modal')
                                    {{-- delete_expense_modal.blade End --}}          
                                    <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_expense_modal{{$expense->id}}"> Delete</button>                           
                                    @endrole
                                
                            </td>
                    </tr>
                    @php $inc++; @endphp
                 @endforeach
    
                </thead>
                <tbody>
                </tbody>
                </table>    
     </div>
    </div>

    Showing {{ $daily_expenses->firstItem() }} TO  {{ $daily_expenses->lastItem() }} of {{ $daily_expenses->total() }} (for page {{ $daily_expenses->currentPage() }} )
<div class="pull-right">
{!! $daily_expenses->render() !!}
</div>




@endsection