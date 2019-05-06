<!-- /.add_sale_item_modal Modal Start -->
<div class="modal modal-warning fade" id="add_sale_item_modal">
    <div class="modal-dialog" style="margin-top:5%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Sale Item </h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('sale.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                {{ csrf_field() }}


            <div class="table table-responsive">
                    <table class="table table-responsive table-striped table-bordered">
                        <tr>
                                <td width="100%">
                                    <div class="form-group">
                                          
                                        <label style="margin-left: 8%;" for="inputEmail3"> Select Item </label>
                                        <div class="col-sm-12">
                                             <!--Size dropdown menu-->
                                            <select id="size_select" name="sale_item_id" style=" color: #333; background-color: #fff; border-color: #ccc; padding: 6px 12px; margin-bottom: 0; font-size: 14px; font-weight: 400; line-height: 1.42857143; text-align: center; white-space: nowrap; vertical-align: middle; cursor: pointer; /* -webkit-user-select: none; */ -moz-user-select: none; -ms-user-select: none; user-select: none; background-image: none; border: 1px solid transparent; border-radius: 4px;">
                                                <option disabled selected>--- Select Item ---</option>
                                               
                                                @foreach($purchase_items as $items) 
                                                @if($items->bill_number != 0) 
                                                <option value="{{ $items->id }}" >
                                                    @foreach($company_names as $c_name)
                                                        @if($c_name->id == $items->company_name)
                                                        {{ $c_name->company_name}} 
                                                        @endif
                                                    @endforeach
                                                     => 
                                                     @foreach($model_names as $m_name)
                                                        @if($m_name->id == $items->model_name)
                                                        {{ $m_name->model_name}} 
                                                        @endif
                                                    @endforeach
                                                    </option> 
                                                @endif 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                    </table>
                </div>

                <div class="table table-responsive">
                    <table class="table table-responsive table-striped table-bordered">
                        <tr>

                                <td>
                                    <div class="form-group">
                                        <label style="margin-left: 8%;" for="inputEmail3"> Actual Price</label>
                                        <div class="col-sm-12">
                                         <!--Size dropdown content-->
                                        @foreach($purchase_items as $items) 
                                        <div id="{{ $items->id }}" class="size_chart">
                                            <input type="text" name="sale_actual_price" value="{{ round($items->unit_price + $items->gst, 0) }}" class="form-control name_list" disabled/>
                                            @foreach($stock_available as $available_items) 
                                            @if( $available_items->company_id == $items->company_name && $available_items->model_id == $items->model_name)
                                            <label for="inputEmail3"> Quantity Available </label>
                                                <input type="text" name="sale_actual_price" value="{{ $available_items->available_quantity }}" class="form-control name_list" disabled/>
                                                @endif
                                            @endforeach
                                        </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </td>
                        </tr>
                    </table>
                </div>



                <div class="table table-responsive">
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                    <td>
                                        <div class="form-group">
                                            <label style="margin-left: 8%;" for="inputEmail3"> Quantity</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="sale_quantity" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>
    
                                    <td>
                                        <div class="form-group">
                                            <label style="margin-left: 8%;" for="inputEmail3"> Sale Price</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="sale_price" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                        </table>
                    </div>
                    

                         <script>
                            $(document).ready(function(){
                                
                                //hides dropdown content
                                $(".size_chart").hide();
                                
                                //unhides first option content
                                $("#option1").show();
                                
                                //listen to dropdown for change
                                $("#size_select").change(function(){
                                    //rehide content on change
                                    $('.size_chart').hide();
                                    //unhides current item
                                    $('#'+$(this).val()).show();
                                });
                                
                                });
                          </script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

                    
                    
           
            
          

        </div>
        <div class="modal-footer">
              <input type="hidden" name="_token" value="{{ Session::token() }}">
          <button type="submit" onclick="submitForm(this);" class="btn btn-success pull-right">Add Item</button>
        </div>
          </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.add_sale_item_modal End -->