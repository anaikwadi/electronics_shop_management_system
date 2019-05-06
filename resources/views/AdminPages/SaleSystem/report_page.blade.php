@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


<table class="table table-responsive table-striped table-bordered">
        <tr>
                <th width="40%">Select Month</th>
                <th width="40%">Select Year</th>                                            
                <th>Action</th>
            </tr>
            
            <form method="post" action="{{ route('sale.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }} 
            
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
                                    echo "<select  class=form-control name=sale_items_pdf_month>";
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
                                <select class="form-control" name="sale_items_pdf_year" >
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
</table>
</form>


@endsection