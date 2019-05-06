@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>
<br>

<h2> Title </h2>
<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th width="70%"> Title</th>
            <th> Action</th>
        </tr>

        @foreach($about_us as $title)
        <tr>
            <td>
                {{ $title->title }}
            </td>
            <th> 
                @role(['superadministrator','administrator']) 
                {{-- edit_about_us_title.blade include Start --}}
                @include('AdminPages.AboutUsSystem.edit_about_us_title')
                {{-- edit_about_us_title.blade End --}}                                                
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_about_us_title{{$title->id}}"> Edit</button>
                @endrole
            </th>
        </tr>
        @endforeach

    </table>

</div>
<br>


<h2> About Us Description </h2>
<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th width="70%"> Description</th>
            <th> Action</th>
        </tr>

        @foreach($about_us as $Description)
        <tr>
            <td>
                {{ $Description->description }}
            </td>
            <th> 
                @role(['superadministrator','administrator']) 
                {{-- edit_about_us_description.blade include Start --}}
                @include('AdminPages.AboutUsSystem.edit_about_us_description')
                {{-- edit_about_us_description.blade End --}}                                                
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_about_us_description{{$title->id}}"> Edit</button>
                @endrole 
            </th>
        </tr>
        @endforeach

    </table>

</div>


<br>
<h2> About Us Container Data </h2>
<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th>Container No.</th>
            <th width="15%"> Container FA Icon</th>
            <th width="35%"> Container Title</th>
            <th> Container Data</th>
            <th> Backgroud Color</th>
            <th width="20%"> Action</th>
        </tr>

        @foreach($container_data as $data)
        <tr>
            <td>
                {{ $inc }}
            </td>
            <td>
                {{ $data->fa_icon }}
            </td>
            <td>
                {{ $data->title }}
            </td>
            <td>
                {{ $data->description }}
            </td>
            <td>
                {{ $data->bg_color }}
            </td>
            <th> 
                @role(['superadministrator','administrator']) 
                {{-- edit_container_data.blade include Start --}}
                @include('AdminPages.AboutUsSystem.edit_container_data')
                {{-- edit_container_data.blade End --}}                                                
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_container_data{{$data->id}}"> Edit</button>
                @endrole 
            </th>
        </tr>
        <?php $inc++; ?>
        @endforeach

    </table>

</div>


@endsection