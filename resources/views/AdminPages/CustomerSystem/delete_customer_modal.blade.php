<!-- /.delete_customer_modal Modal Start -->
<div class="modal modal-danger fade" id="delete_customer_modal{{$customer->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Customer Record</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('customer.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}

                    <input type="hidden" name="delete_customer_id" value="{{ $customer->id }}" class="form-control name_list" required/>
                       
                    @if($customer->bill_number == NULL)
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i> Are You Sure? </h3>                                              
                        </div>
                    @else
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i> You Can Not Delete Because Bill Added.!! </h3>                                              
                        </div>
                    @endif
              
    
            </div>
                    @if($customer->bill_number == NULL)
                        <div class="modal-footer">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" onclick="submitForm(this);" class="btn btn-danger pull-right">Delete</button>
                        </div>
                    @else
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                    @endif
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.delete_customer_modal End -->