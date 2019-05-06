@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


<form method="post" action="{{ route('video.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
    {{ csrf_field() }}
    
<div class="row">
    <div class="col-md-12">
       
            <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <td> Name</td>
                    <td> Youtube Video ID</td>
                    <td> Sequence</td>
                </tr>

                <tr>
                        <td>
                            <input name = "video_name" placeholder="Video Name" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "video_url" placeholder="Youtube Video ID" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "video_sequence" placeholder="Video Sequence" type="text" class="form-control" required />
                        </td>
                </tr>

            </thead>
            <tbody>
            </tbody>
            </table>
 </div>
</div>

<input type="hidden" name="_token" value="{{ Session::token() }}">
<button type="submit" class="btn btn-outline-success btn-lg pull-right"> Add Video</button>
</form>



<br><br>
<h2>All Videos</h2>
<br>

<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th>#</th>
            <th> Name</th> 
            <th> Youtube Video ID</th>
            <th> Sequence</th>
            <th> Action</th>
        </tr>

        @php $inc = ($videos->currentpage() - 1) * $videos->perpage() + 1; @endphp
        @foreach($videos as $video)
        <tr>
            <td> {{ $inc }} </td>
            <td> {{ $video->name }} </td>
            <td> <a href="{{ $video->url }}" target="_blank"> {{ $video->url }} </a> </td>
            <td> {{ $video->sequence }} </td>
            <td>  
                @role(['superadministrator','administrator']) 
                {{-- edit_video_modal.blade include Start --}}
                @include('AdminPages.HomePageVideoSystem.edit_video_modal')
                {{-- edit_video_modal.blade End --}}                                                
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_video_modal{{$video->id}}"> Edit</button>
                @endrole

                @role(['superadministrator']) 
                {{-- delete_video_modal.blade include Start --}}
                @include('AdminPages.HomePageVideoSystem.delete_video_modal')
                {{-- delete_video_modal.blade End --}}          
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_video_modal{{$video->id}}"> Delete</button>                           
                @endrole
            </td>
        </tr>
        <?php $inc++; ?>
        @endforeach   
    </table>
    Showing {{ $videos->firstItem() }} TO  {{ $videos->lastItem() }} of {{ $videos->total() }} (for page {{ $videos->currentPage() }} )
<div class="pull-right">
    {!! $videos->render() !!}
</div>

</div>

@endsection