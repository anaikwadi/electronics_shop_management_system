<!-- /.edit_expense_modal Modal Start -->
<div class="modal modal-warning fade" id="edit_expense_modal{{$expense->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Daily Expenses</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('daily_expenses.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}
    
                    <input type="hidden" name="edited_daily_expense_id" value="{{ $expense->id }}" class="form-control name_list" required/>
    
    
                        <div class="form-group">
                            <label for="inputEmail3"> Name</label>
                            <div class="col-sm-12">
                                    <input type="text" name="edited_daily_expense_name" value="{{ $expense->name }}" class="form-control name_list" required/>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="inputEmail3"> URL</label>
                            <div class="col-sm-12">
                                    <input type="text" name="edited_daily_expense_amount" value="{{ $expense->expense_amount }}" class="form-control name_list" required/>
                            </div>
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
      <!-- /.edit_expense_modal End -->