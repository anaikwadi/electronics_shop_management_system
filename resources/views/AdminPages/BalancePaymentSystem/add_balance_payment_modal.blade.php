<!-- /.add_balance_payment_modal Modal Start -->
<div class="modal modal-warning fade" id="add_balance_payment_modal{{$balance->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add Balance Payment</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('balance.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}

                    <input type="hidden" name="add_to_balance_id" value="{{ $balance->id }}" class="form-control name_list" required/>

                <div class="table table-responsive">
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <label for="inputEmail3"> Balance Amount</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="add_to_balance_amount" value="{{ $balance->balance_amount }}" class="form-control name_list" disabled/>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <label for="inputEmail3"> Paid Amount</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="add_to_balance_paid_amount" placeholder="Paid Amount" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                        </table>
                        
                </div>
                
              
    
            </div>
            <div class="modal-footer">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
              <button type="submit" onclick="submitForm(this);" class="btn btn-success pull-right">Add Payment</button>
            </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.add_balance_payment_modal End -->