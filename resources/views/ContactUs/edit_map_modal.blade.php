<!-- /.edit_map_modal Modal Start -->
<div class="modal modal-warning fade" id="edit_map_modal{{$Contact_us_map->id}}">
        <div class="modal-dialog" style="margin-top:5%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Map Path</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('contact.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                    {{ csrf_field() }}

                    <input type="hidden" name="edited_map_id" value="{{ $Contact_us_map->id }}" class="form-control name_list" required/>

                <div class="table table-responsive">
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <label for="inputEmail3"> Name</label>
                                            <div class="col-sm-12">
                                                <textarea rows="7" cols="58%" name="edited_map_iframe"> {{ $Contact_us_map->iframe }} </textarea>
                                                    {{-- <input type="text" name="edited_map_iframe" value="{{ $Contact_us_map->iframe }}" class="form-control name_list" required/> --}}
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
      <!-- /.edit_map_modal End -->