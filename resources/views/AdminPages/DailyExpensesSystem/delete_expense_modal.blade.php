<!-- /.delete_expense_modal Modal Start -->
<div class="modal modal-danger fade" id="delete_expense_modal{{$expense->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Expense</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('daily_expenses.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}
    
                    <input type="hidden" name="delete_expense_id" value="{{ $expense->id }}" class="form-control name_list" required/>
                       
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
      <!-- /.delete_expense_modal End -->