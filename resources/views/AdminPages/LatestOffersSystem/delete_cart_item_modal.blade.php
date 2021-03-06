<!-- /.delete_cart_item_modal Modal Start -->
<div class="modal modal-danger fade" id="delete_cart_item_modal{{$cart_item->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Cart Item Record</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('user_add_cart.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}
    
                    <input type="hidden" name="delete_cart_item_id" value="{{ $cart_item->id }}" class="form-control name_list" required/>

                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i> Are You Sure? </h3>                                              
                        </div>
              
    
            </div>
                  
                        <div class="modal-footer">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" onclick="submitForm(this);" class="btn btn-danger pull-right">Delete</button>
                        </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.delete_cart_item_modal End -->