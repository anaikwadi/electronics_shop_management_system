@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>

<form method="post" action="{{ route('offers.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
    {{ csrf_field() }}
    
<div class="row">
    <div class="col-md-12 table-responsive">
       
            <table class="table  table-striped table-bordered">
            <thead>
                <tr>
                    <th> Product Name</th>
                    <th> Actual Price</th>
                    <th> Display Price</th>
                    <th> Offer Price</th>
                    <th> Description</th>
                    <th> Youtube Link</th>
                    <th> Images </th>
                </tr>

                <tr>
                        <td>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                         <!--Size dropdown menu-->
                                        <select id="size_select" name="latest_offer_item_id" style=" color: #333; background-color: #fff; border-color: #ccc; padding: 6px 12px; margin-bottom: 0; font-size: 14px; font-weight: 400; line-height: 1.42857143; text-align: center; white-space: nowrap; vertical-align: middle; cursor: pointer; /* -webkit-user-select: none; */ -moz-user-select: none; -ms-user-select: none; user-select: none; background-image: none; border: 1px solid transparent; border-radius: 4px;">
                                            <option disabled selected>--- Select Item ---</option>
                                            @foreach($products as $items) 
                                            @if($items->bill_number != 0) 
                                            <option value="{{ $items->id }}" > {{ $items->company_name}} => {{ $items->model_name }} </option> 
                                            @endif 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                     <!--Size dropdown content-->
                                    @foreach($products as $items) 
                                    <div id="{{ $items->id }}" class="size_chart">
                                        <input type="text" name="latest_offer_actual_price_display" value="{{ round($items->unit_price + $items->gst, 0) }}" class="form-control name_list" disabled/>
                                        <input type="hidden" name="latest_offer_actual_price" value="{{ round($items->unit_price + $items->gst, 0) }}" class="form-control name_list"/>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                            </td>

                            {{-- Dependant Price Display Script Start --}}

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                                    <script>
                                            $(document).ready(function(){
                                                
                                                //hides dropdown content
                                                $(".size_chart").hide();
                                                
                                                //unhides first option content
                                                $("#option1").show();
                                                
                                                //listen to dropdown for change
                                                $("#size_select").change(function(){
                                                    //rehide content on change
                                                    $('.size_chart').hide();
                                                    //unhides current item
                                                    $('#'+$(this).val()).show();
                                                });
                                                
                                                });
                                    </script>
                                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

                            {{-- Dependant Price Display Script End --}}



                        <td>
                            <input name = "latest_offer_display_price" placeholder="Display Price" type="text" class="form-control" required />
                        </td>

                        <td>
                            <input name = "latest_offer_offer_price" placeholder="Offer Price" type="text" class="form-control" required />
                        </td>

                        <td>                                      
                            <input type="text" name="latest_offer_description" placeholder="Description" class="form-control name_list" required/>
                        </td>

                        <td>                                      
                            <input type="text" name="latest_offer_video_link" placeholder="Youtube Video ID" class="form-control name_list" required/>
                        </td>

                        <td>
                            <input type="file" name="file[]" id="file" multiple="multiple" class="btn btn-warning" required/>
                            
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
<button type="submit" class="btn btn-outline-success btn-lg pull-right"> Add Offer</button>
</form>

<br><br>
<h2>All Latest Offers</h2>
<br>

<div class="table table-responsive">
        <table class="table table-responsive table-striped table-bordered">
        <tr>
            <th>#</th>
            <th> Product Name => Model Name</th> 
            <th> Actual Price</th>
            <th> Display Price</th>
            <th> Offer Price</th>
            <th style="word-wrap: break-word;min-width: 160px;max-width: 160px;"> Description</th>
            <th> Youtube Video Link</th>
            <th> Images</th>
            <th> Action</th>
        </tr>
        
        @php $inc = ($latest_offers->currentpage() - 1) * $latest_offers->perpage() + 1; @endphp
        @foreach($latest_offers as $offer)
        <tr>
            <td> {{ $inc }} </td>

            @foreach($products as $product) 
            @if($offer->item_id == $product->id)
            <td> {{ $product->company_name}} => {{ $product->model_name }} </td>
            @endif
            @endforeach

            

            <td> {{ $offer->actual_price }} </td>
            <td> {{ $offer->display_price }} </td>
            <td> {{ $offer->offer_price }} </td>
            <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;"> {{ $offer->description }} </td>
            <td> <a href="https://www.youtube.com/watch?v={{ $offer->video_link }}" target="_blank"> Open  <i class="fa fa-external-link"></i> </a> </td>

            <td>
                @foreach($latest_offer_images as $image)
                    @if($offer->id == $image->latest_offer_id)
                        <img src="{{ URL::asset(str_replace('"', '', $image->file_path_db)) }}" height="50" width="50">
                    @endif
                @endforeach 
                {{-- {{ $offer->video_link }}  --}}
            </td>

            
            <td>
                @role(['superadministrator']) 
                {{-- delete_latest_offer_modal.blade include Start --}}
                @include('AdminPages.LatestOffersSystem.delete_latest_offer_modal')
                {{-- delete_latest_offer_modal.blade End --}}          
                <button type="button" style="margin-right: 5px;" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_latest_offer_modal{{$offer->id}}"> Delete</button>                           
                @endrole
            </td>
           
        </tr>
        <?php $inc++; ?>
        @endforeach   
    </table>
    Showing {{ $latest_offers->firstItem() }} TO  {{ $latest_offers->lastItem() }} of {{ $latest_offers->total() }} (for page {{ $latest_offers->currentPage() }} )
    <div class="pull-right">
    {!! $latest_offers->render() !!}
    </div>
</div>






@endsection