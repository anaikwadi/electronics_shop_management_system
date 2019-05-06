@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


<form method="post" action="{{ route('user_testimonial.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
    {{ csrf_field() }}
    
<div class="row">
    <div class="col-md-12">
       
            <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <th> Name</th>
                    <th> Company Name</th>
                    <th> Designation</th>
                    <th> Testimonial Quote</th>
                    <th> Profile Image</th>
                </tr>

                <tr>
                        <td>
                            <input name = "testimonial_name_display" value="{{ Auth::User()->name }}" type="text" class="form-control" disabled />
                            <input name = "testimonial_name" value="{{ Auth::User()->name }}" type="hidden" class="form-control" required />
                        </td>

                        <td>
                            <input name = "testimonial_company_name" placeholder="Company Name" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "testimonial_designation" placeholder="Designation" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "testimonial_quote" placeholder="Quote" type="text" class="form-control" required />
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
<button type="submit" class="btn btn-outline-success btn-lg pull-right"> Add Testimonial </button>
</form>




<br><br>
<h2>My Testimonials Records</h2>
<br>

<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th>#</th>
            <th> Testimonial Quote</th>
            <th> Action</th>
        </tr>

        @php $inc = ($testimonials->currentpage() - 1) * $testimonials->perpage() + 1; @endphp
        @foreach($testimonials as $testimonial)
        <tr>
            <td> {{ $inc }} </td>
            <td> {{ $testimonial->quote }} </td>
            <td>
                @if($testimonial->status == 0)
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" disabled> Pending</button>
                @role(['superadministrator','administrator','user']) 
                {{-- delete_testimonial_modal.blade include Start --}}
                @include('Testimonials.delete_testimonial_modal')
                {{-- delete_testimonial_modal.blade End --}}          
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_testimonial_modal{{$testimonial->id}}"> Delete</button>
                @endrole
                @else
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-success" disabled> Approved</button>
                @endif

                
            </td>
        </tr>
        <?php $inc++; ?>
        @endforeach   
    </table>
</div>
Showing {{ $testimonials->firstItem() }} TO  {{ $testimonials->lastItem() }} of {{ $testimonials->total() }} (for page {{ $testimonials->currentPage() }} )
<div class="pull-right">
{!! $testimonials->render() !!}
</div>


@endsection