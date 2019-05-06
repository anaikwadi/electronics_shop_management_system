@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


<form method="post" action="{{ route('admin_team.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
    {{ csrf_field() }}
    
<div class="row">
    <div class="col-md-12">
       
            <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <th> Name</th>
                    <th> Mobile</th>
                    <th> Email</th>
                    <th> Facebook</th>
                    <th> Designation</th>
                    <th> Profile Image</th>
                </tr>

                <tr>
                        <td>
                            <input name = "team_member_name" placeholder="Name" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "team_member_mobile" placeholder="Mobile" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "team_member_email" placeholder="Email" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "team_member_facebook" placeholder="Facebook URL" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "team_member_designation" placeholder="Designation" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input type="file" name="file" id="file" class="btn btn-warning" required/>
                            
                            <script>
                                var uploadField = document.getElementById("file");
            
                                uploadField.onchange = function() {
                                    if(this.files[0].size > 2000000){
                                        swal("Oops", "File is too big! Size Must Be Less Than 2MB.", "error");
                                    this.value = "";
                                    };
                                };
                            </script>
                        </td>
                </tr>

            </thead>
            <tbody>
            </tbody>
            </table>
 </div>
</div>

<input type="hidden" name="_token" value="{{ Session::token() }}">
<button type="submit" class="btn btn-outline-success btn-lg pull-right"> Add Member To Team</button>
</form>



<br><br>
<h2>All Team Members</h2>
<br>

<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th>#</th>
            <th> Name</th>
            <th> Mobile</th>
            <th> Email</th>
            <th> Facebook</th>
            <th> Designation</th>
            <th> Profile Image</th>
            <th> Action</th>
        </tr>

        @php $inc = ($Our_Team->currentpage() - 1) * $Our_Team->perpage() + 1; @endphp
        @foreach($Our_Team as $team_mem)
        <tr>
            <td> {{ $inc }} </td>
            <td> {{ $team_mem->name }} </td>
            <td> {{ $team_mem->mobile }} </td>
            <td> {{ $team_mem->email }} </td>
            <td> <a href="{{ $team_mem->facebook }}" target="_blank"> Open  <i class="fa fa-external-link"></i> </a> </td>
            <td> {{ $team_mem->designation }} </td>
            <td>  <img src="{{ URL::asset(str_replace('"', '', $team_mem->profile_image)) }}" height="50" width="50"> </td>
            <td>
                @role(['superadministrator']) 
                {{-- delete_team_member_modal.blade include Start --}}
                @include('AdminPages.AdminOurTeam.delete_team_member_modal')
                {{-- delete_team_member_modal.blade End --}}          
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_team_member_modal{{$team_mem->id}}"> Delete</button>                           
                @endrole
            </td>
        </tr>
        <?php $inc++; ?>
        @endforeach   
    </table>
    Showing {{ $Our_Team->firstItem() }} TO  {{ $Our_Team->lastItem() }} of {{ $Our_Team->total() }} (for page {{ $Our_Team->currentPage() }} )
    <div class="pull-right">
    {!! $Our_Team->render() !!}
    </div>

</div>



@endsection