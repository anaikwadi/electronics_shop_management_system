@extends('layouts.adminpages') 

@section('content')
  
<h2>{{$title}}</h2>


    
<div class="row">
    <div class="col-md-6">
            <h1> Company Name </h1>

            <form method="post" action="{{ route('master_entry.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
                {{ csrf_field() }}

                <table class="table table-responsive table-striped table-bordered">
                        <thead>

                            <tr>
                                    <td>
                                        <input name = "master_company_name" placeholder="Company Name" type="text" class="form-control" required />
                                    </td>
                                    <td>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            <button type="submit" class="btn btn-outline-success"> Add Company</button>
                                    </td>
            
                            </tr>
                           
            
                        </thead>
                        <tbody>
                        </tbody>
                        </table>

                       
                        </form>
    </div>








        <div class="col-md-6">
                <h1> Model Name </h1>

                <form method="post" action="{{ route('master_entry.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                        <td>
                                            <input name = "master_model_name" placeholder="Model Name" type="text" class="form-control" required />
                                        </td>

                                        <td>
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                <button type="submit" class="btn btn-outline-success"> Add Model</button>
                                        </td>
                
                                </tr>
                
                            </thead>
                            <tbody>
                            </tbody>
                            </table>
    
                   
                    </form>
        </div>
    </div>




       
<div class="row">
        <div class="col-md-6">
                <h1> List Company Names </h1>
    
                    <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                        <th>
                                               #
                                        </th>
                                        <th>
                                                Comapny Name
                                        </th>
                                        <th>
                                                Action
                                        </th>
                
                                </tr>
    
        @php $inc = ($company_names->currentpage() - 1) * $company_names->perpage() + 1; @endphp
                                @foreach($company_names as $c_name)
                                <tr>
                                        <td>
                                            {{ $inc }}
                                        </td>

                                        <td>
                                                {{ $c_name->company_name }}
                                        </td>

                                        <td>
                                            @role(['superadministrator','administrator']) 
                                            {{-- edit_master_entry_company.blade include Start --}}
                                            @include('AdminPages.MasterEntrySystem.edit_master_entry_company')
                                            {{-- edit_master_entry_company.blade End --}}                                                
                                            <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_master_entry_company{{$c_name->id}}"> Edit</button>
                                            @endrole
                                        </td>
                
                                </tr>
                                @php $inc++; @endphp
                                @endforeach
                               
                
                            </thead>
                            <tbody>
                            </tbody>
                            </table>
                        Showing {{ $company_names->firstItem() }} TO  {{ $company_names->lastItem() }} of {{ $company_names->total() }} (for page {{ $company_names->currentPage() }} )
                        <div class="pull-right">
                        {!! $company_names->render() !!}
                        </div>
        </div>
        


        <div class="col-md-6">
                <h1> List Model Names </h1>
                    <table class="table table-responsive table-striped table-bordered">
                            <thead>
    
                                    <tr>
                                            <th>
                                                   #
                                            </th>
                                            <th>
                                                    Model Name
                                            </th>
                                            <th>
                                                    Action
                                            </th>
                    
                                    </tr>
        
                                    @php $inc = ($model_names->currentpage() - 1) * $model_names->perpage() + 1; @endphp
                                    @foreach($model_names as $m_name)
                                    <tr>
                                            <td>
                                                {{ $inc }}
                                            </td>
                                            
                                            <td>
                                                    {{ $m_name->model_name }}
                                            </td>
                                            <td>
                                                @role(['superadministrator','administrator']) 
                                                {{-- edit_master_entry_modal.blade include Start --}}
                                                @include('AdminPages.MasterEntrySystem.edit_master_entry_modal')
                                                {{-- edit_master_entry_modal.blade End --}}                                                
                                                <button type="button" style="margin-right: 5px;" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_master_entry_modal{{$c_name->id}}"> Edit</button>
                                                @endrole
                                            </td>
                    
                                    </tr>
                                @php $inc++; @endphp
                                    @endforeach
                               
                
                            </thead>
                            <tbody>
                            </tbody>
                            </table>
    
                            Showing {{ $model_names->firstItem() }} TO  {{ $model_names->lastItem() }} of {{ $model_names->total() }} (for page {{ $model_names->currentPage() }} )
                            <div class="pull-right">
                            {!! $model_names->render() !!}
                            </div>
        </div>





</div>


@endsection