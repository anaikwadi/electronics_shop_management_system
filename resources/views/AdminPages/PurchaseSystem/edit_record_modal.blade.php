<!-- /.edit_record_modal Modal Start -->
<div class="modal modal-warning fade" id="edit_record_modal{{$item->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Purchase Record</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('purchase.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}

                    <input type="hidden" name="edited_record_id" value="{{ $item->id }}" class="form-control name_list" required/>
                           
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Vendor Name</label>
                    <div class="col-sm-12">
                            <select class="form-control selectpicker" name="edit_purchase_vendor_id" required>
                                @foreach($vendors as $vendor_name)
                                    @if($vendor_name->id == $item->vendor_id)
                                    <option value="{{ $vendor_name->id }}" selected>{{ $vendor_name->name }}</option>
                                    @else
                                    <option value="{{ $vendor_name->id }}" >{{ $vendor_name->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                    </div>
                </div>

                <div class="table table-responsive">
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                    <td width="33%">
                                        <div class="form-group">
                                            <label for="inputEmail3">Bill Number</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_record_bill_number" value="{{ $item->bill_number }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>

                                    <td width="33%">
                                        <div class="form-group">
                                            <label for="inputEmail3">Company Name</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_record_company_name" value="{{ $item->company_name }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                    <div class="form-group">
                                        <label for="inputEmail3">Model Name</label>
                                        <div class="col-sm-12">
                                                <input type="text" name="edited_record_model_name" value="{{ $item->model_name }}" class="form-control name_list" required/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="inputEmail3"> Quantity</label>
                                        <div class="col-sm-12">
                                                <input type="text" name="edited_record_quantity" value="{{ $item->quantity }}" class="form-control name_list" required/>
                                        </div>
                                    </div>
                                    </td>

                                    <td>
                                    <div class="form-group">
                                        <label for="inputEmail3"> HSN</label>
                                        <div class="col-sm-12">
                                                <input type="text" name="edited_record_hsn" value="{{ $item->hsn }}" class="form-control name_list" required/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                <td width="50%">
                                    <div class="form-group">
                                        <label for="inputEmail3"> Amount</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="edited_record_amount" value="{{ round($item->unit_price + $item->gst, 0) }}" class="form-control name_list" required/>
                                        </div>
                                    </div>
                                    </td>

                                    <td>
                                    <div class="form-group">
                                        <label for="inputEmail3"> GST %</label>
                                        <div class="col-sm-12">
                                                <select class="form-control selectpicker" name="edited_record_gst" required>
                                                        @if($item->percent_gst == 18)
                                                        <option value="18" selected>18</option>
                                                        <option value="28">28</option>
                                                        @else
                                                        <option value="28" selected>28</option>
                                                        <option value="18" >18</option>
                                                        @endif
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
              <button type="submit" onclick="submitForm(this);" class="btn btn-success pull-right">Update</button>
            </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.edit_record_modal End -->