@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>

<div class="row">
    <div class="col-md-12 table-responsive">
       
            <table class="table  table-striped table-bordered">
            <thead>
                <tr>
                    <th> Sr. No.</th>
                    <th> Product Name</th>
                    <th> Price</th>
                    <th> Quantity</th>
                    <th> Total</th>
                </tr>
            </thead>

        @php $inc = ($cart_items->currentpage() - 1) * $cart_items->perpage() + 1; @endphp
                @foreach($cart_items as $cart_item)
                <tr>
                        <td> {{ $inc }} </td>

                        <td>
                            <div class="form-group">
                                <div class="col-sm-12">
                                        @foreach($purchase_items as $items) 
                                            @if($cart_item->item_id == $items->id) 
                                                {{ $items->company_name}} => {{ $items->model_name }}
                                            @endif 
                                        @endforeach
                                </div>
                            </div>
                        </td>

                        <td> {{ $cart_item->offer_price }} </td>
                        <td> {{ $cart_item->quantity }} </td>
                        <td> {{ $cart_item->total }} </td>
                </tr>
                @php $inc++; @endphp
                @endforeach
            </table>
    </div>
</div>
Showing {{ $cart_items->firstItem() }} TO  {{ $cart_items->lastItem() }} of {{ $cart_items->total() }} (for page {{ $cart_items->currentPage() }} )
<div class="pull-right">
{!! $cart_items->render() !!}
</div>

          


@endsection