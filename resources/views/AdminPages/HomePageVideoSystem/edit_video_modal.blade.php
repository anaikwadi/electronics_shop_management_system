<!-- /.edit_video_modal Modal Start -->
<div class="modal modal-warning fade" id="edit_video_modal{{$video->id}}">
    <div class="modal-dialog" style="margin-top:5%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Video</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('video.store') }}" data-parsley-validate class="form-horizontal form-label-left"  >
                {{ csrf_field() }}

                <input type="hidden" name="edited_video_id" value="{{ $video->id }}" class="form-control name_list" required/>


                    <div class="form-group">
                        <label for="inputEmail3"> Name</label>
                        <div class="col-sm-12">
                                <input type="text" name="edited_record_video_name" value="{{ $video->name }}" class="form-control name_list" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3"> Youtube Video ID</label>
                        <div class="col-sm-12">
                                <input type="text" name="edited_record_video_url" value="{{ $video->url }}" class="form-control name_list" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3"> Sequence</label>
                        <div class="col-sm-12">
                                <input type="text" name="edited_record_video_sequence" value="{{ $video->sequence }}" class="form-control name_list" required/>
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
  <!-- /.edit_video_modal End -->