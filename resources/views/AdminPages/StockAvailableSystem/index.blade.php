@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th># </th>
            <th> Vendor Name</th> 
            <th> Company Name</th>
            <th> Model Name</th>
            <th> Available Stock</th>
        </tr>

        @php $inc = ($stock_available->currentpage() - 1) * $stock_available->perpage() + 1; @endphp
        @foreach($stock_available as $stock)
        <tr>
            <td align="center"> {{ $inc }} </td>
            <td>
                @foreach($vendor_names as $vendor_name)
                    @if($vendor_name->id == $stock->vendor_id)
                        {{ $vendor_name->name }}
                    @endif
                @endforeach
            </td>
            <td> 
                @foreach($company_names as $c_name)
                    @if($c_name->id == $stock->company_id)
                        {{ $c_name->company_name }}
                    @endif
                @endforeach
            </td>
            <td> 
                @foreach($model_names as $m_name)
                    @if($m_name->id == $stock->model_id)
                        {{ $m_name->model_name }}
                    @endif
                @endforeach
            </td>

            @if($stock->available_quantity <= 2 )
            <td align="center" style="background-color: #FF0000; opacity: .4;"><font color="black"><b> {{ $stock->available_quantity }} </b></font> </td>
            @else
            <td align="center" style="background-color: #00FF00; opacity: .4;"><font color="black"><b> {{ $stock->available_quantity }} </b></font> </td>
            @endif
        </tr>
       @php $inc++; @endphp
        @endforeach   
    </table>
</div>
Showing {{ $stock_available->firstItem() }} TO  {{ $stock_available->lastItem() }} of {{ $stock_available->total() }} (for page {{ $stock_available->currentPage() }} )
<div class="pull-right">
{!! $stock_available->render() !!}
</div>



@endsection