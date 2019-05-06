@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}} 
    {{-- <sup class="pull-right"> Total Enquiries: {{ count($contact_us_enquiry_count) }} </sup> --}}
</h2>

<div class="row">
        <div class="col-md-12">
                    
                <table class="table table-responsive table-striped table-bordered">
                <thead>
                    <tr>
                        <td> #</td>
                        <td> Name</td>
                        <td> Mobile</td>
                        <td> Email </td>
                        <td> Enquiry Query </td>
                    </tr>

        @php $inc = ($contact_us_enquiry->currentpage() - 1) * $contact_us_enquiry->perpage() + 1; @endphp
                    @foreach($contact_us_enquiry as $enquiry)
                    <tr>
                            <td>{{ $inc }}</td>
                            <td>{{ $enquiry->name }}</td>
                            <td>{{ $enquiry->mobile }}</td>
                            <td>{{ $enquiry->email }}</td>
                            <td>{{ $enquiry->enquiry_query }}</td>

                    </tr>
                    @php $inc++; @endphp
                 @endforeach
    
                </thead>
                <tbody>
                </tbody>
                </table> 
Showing {{ $contact_us_enquiry->firstItem() }} TO  {{ $contact_us_enquiry->lastItem() }} of {{ $contact_us_enquiry->total() }} (for page {{ $contact_us_enquiry->currentPage() }} )
<div class="pull-right">
{!! $contact_us_enquiry->render() !!}
</div>

<div class="row">
        <div class="col-md-12">
        </div>
</div>

<br><br>
    <h2>MAP Settings </h2>

    <div class="row">
            <div class="col-md-12">
                        
                    <table class="table table-responsive table-striped table-bordered">
                    <thead>
                        <tr>
                            <td> MAP EMBED CODE</td>
                            <td > Action</td>
                        </tr>
                        @php $inc = 1 ; @endphp
                        <tr>
                                {{-- <td style="word-wrap: break-word;min-width: 250px;max-width: 250px;">{{ $Contact_us_map->iframe }}</td> --}}
                                <td align="center">
                                        <section id="contact-add">
                                                <div id="map">
                                                  <div class="map-responsive">
                                                      {!! $Contact_us_map->iframe !!}
                                                    </div>
                                                </div> 
                                              </section>
                                </td>
                                <td>  
                                    @role(['superadministrator','administrator']) 
                                    {{-- edit_map_modal.blade include Start --}}
                                    @include('ContactUs.edit_map_modal')
                                    {{-- edit_map_modal.blade End --}} 
                                        <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_map_modal{{$Contact_us_map->id}}"> Edit</button>
                                    @endrole
                                </td>

                               
                        </tr>
                        @php $inc++; @endphp
        
                    </thead>
                    <tbody>
                    </tbody>
                    </table>   
     
         </div>
        </div>

    



@endsection