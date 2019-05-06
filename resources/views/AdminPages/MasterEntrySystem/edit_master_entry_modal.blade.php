<!-- /.edit_master_entry_modal Modal Start -->
<div class="modal modal-warning fade" id="edit_master_entry_modal{{$m_name->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Model Name Record</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('master_entry.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}

                    <input type="hidden" name="edited_master_model_id" value="{{ $m_name->id }}" class="form-control name_list" required/>

                <div class="table table-responsive">
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="inputEmail3">Model Name</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_master_model_name" value="{{ $m_name->model_name }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>

                            </tr>
                        </table>
                        
                </div>
    
            </div>
            <div class="modal-footer">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        <button type="submit" onclick="submitForm(this);" class="btn btn-warning pull-right">Update</button>
    </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.edit_master_entry_modal End -->