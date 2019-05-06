<link href="{{ asset('businessbox/admin/css/ui-elements/button.css') }}" rel="stylesheet">

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
                    <th> Action</th>
                </tr>
            </thead>
            @php $total_amount = 0; @endphp
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
                        <td> 
                            @role(['superadministrator','administrator','user']) 
                            {{-- delete_cart_item_modal.blade include Start --}}
                            @include('AdminPages.LatestOffersSystem.delete_cart_item_modal')
                            {{-- delete_cart_item_modal.blade End --}}          
                            <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_cart_item_modal{{$cart_item->id}}"> Delete</button>                           
                            @endrole
                        </td>

                </tr>
                @php $total_amount = $total_amount + $cart_item->total; $inc++; @endphp
                @endforeach
                <tr>
                    <td colspan="4" align="right"><b>Total Amount </b> </td>
                    <th> {{ $total_amount }} </th>
                </tr>
            </table>
    </div>
</div>
<div class="col-md-12 tenth-button mt-5">
<a href="{{route('user_add_cart.create')}}" class="btn btn-lg green pull-right">Checkout</a>
</div>


          


@endsection