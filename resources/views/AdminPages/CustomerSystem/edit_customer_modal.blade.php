<!-- /.edit_customer_modal Modal Start -->
<div class="modal modal-warning fade" id="edit_customer_modal{{$customer->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Customer Record</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('customer.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}

                    <input type="hidden" name="edited_customer_id" value="{{ $customer->id }}" class="form-control name_list" required/>

                <div class="table table-responsive">
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <label for="inputEmail3"> Name</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_record_customer_name" value="{{ $customer->name }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <label for="inputEmail3"> Mobile</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_record_customer_mobile" value="{{ $customer->mobile }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                        </table>

                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="inputEmail3"> Email</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_record_customer_email" value="{{ $customer->email }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                    <div class="form-group">
                                        <label for="inputEmail3"> Address</label>
                                        <div class="col-sm-12">
                                                <input type="text" name="edited_record_customer_address" value="{{ $customer->address }}" class="form-control name_list" required/>
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
      <!-- /.edit_customer_modal End -->