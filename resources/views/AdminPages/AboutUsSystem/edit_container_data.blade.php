<!-- /.edit_container_data Modal Start -->
<div class="modal modal-warning fade" id="edit_container_data{{$data->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Container Data</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('about.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}

                    <input type="hidden" name="edited_container_data_id" value="{{ $data->id }}" class="form-control name_list" required/>

                <div class="table table-responsive">
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="inputEmail3"> FA Icon</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_container_data_fa_icon" value="{{ $data->fa_icon }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>
                            </tr>

                            <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="inputEmail3"> Title</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_container_data_title" value="{{ $data->title }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>
                            </tr>

                            <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="inputEmail3"> Description</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_container_data_description" value="{{ $data->description }}" class="form-control name_list" required/>
                                            </div>
                                        </div>
                                    </td>
                            </tr>

                            <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="inputEmail3"> Background Color</label>
                                            <div class="col-sm-12">
                                                    <input type="text" name="edited_container_data_bgcolor" value="{{ $data->bg_color }}" class="form-control name_list" required/>
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
      <!-- /.edit_container_data End -->