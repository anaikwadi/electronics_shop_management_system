<!-- /.add_to_cart_modal Modal Start -->
<div class="modal modal-warning fade" id="add_to_cart_modal{{$offer->id}}">
    <div class="modal-dialog" style="margin-top:5%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add To Cart</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('add_cart.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                {{ csrf_field() }}


            <div class="table table-responsive">
                    <table class="table table-responsive table-striped table-bordered">
                        <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="inputEmail3"> Name</label>
                                        <div class="col-sm-12">
                                                @foreach($purchase_items as $item)
                                                    @if($item->id == $offer->item_id)
                                                        {{ $item->company_name }} => {{ $item->model_name }}
                <input type="hidden" name="add_to_cart_item_id" value="{{ $offer->item_id }}" class="form-control name_list" required/>
                                                    @endif
                                                @endforeach
                                        </div>
                                    </div>
                                </td>
                        </tr>
                    </table>

                    <table class="table table-responsive table-striped table-bordered">
                        <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="inputEmail3"> Offer Price</label>
                                        <div class="col-sm-12">
                                                {{ $offer->offer_price }} <i class="fa fa-inr"></i> 
                <input type="hidden" name="add_to_cart_actual_price" value="{{ $offer->actual_price }}" class="form-control name_list" required/>
                <input type="hidden" name="add_to_cart_offer_price" value="{{ $offer->offer_price }}" class="form-control name_list" required/>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                <div class="form-group">
                                    <label for="inputEmail3"> Quantity</label>
                                    <div class="col-sm-12">
                                            <select id="size_select" name="add_to_cart_quantity" style=" color: #333; background-color: #fff; border-color: #ccc; padding: 6px 12px; margin-bottom: 0; font-size: 14px; font-weight: 400; line-height: 1.42857143; text-align: center; white-space: nowrap; vertical-align: middle; cursor: pointer; /* -webkit-user-select: none; */ -moz-user-select: none; -ms-user-select: none; user-select: none; background-image: none; border: 1px solid transparent; border-radius: 4px;">
                                                <option value="1" > 1 </option> 
                                                <option value="2" > 2 </option> 
                                                <option value="3" > 3 </option> 
                                                <option value="4" > 4 </option> 
                                                <option value="5" > 5 </option> 
                                                <option value="6" > 6 </option> 
                                                <option value="7" > 7 </option> 
                                                <option value="8" > 8 </option> 
                                                <option value="9" > 9 </option> 
                                                <option value="10" > 10 </option>
                                            </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    
            </div>
            
          

        </div>
        <div class="modal-footer">
              <input type="hidden" name="_token" value="{{ Session::token() }}">
          <button type="submit" onclick="submitForm(this);" class="btn btn-success pull-right">Add </button>
        </div>
          </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.add_to_cart_modal End -->