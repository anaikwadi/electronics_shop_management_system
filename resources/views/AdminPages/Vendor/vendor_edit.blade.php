@extends('layouts.adminpages')

@section('content')

<h2>{{$title}}</h2>

<a class="btn btn-sm btn-primary" href="{{route('vendor.index')}}">Back</a>
<hr>

    <form method="post" action="{{ route('vendor.update', ['id' => $vendor->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" value="{{$vendor->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12"> @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} row">
            <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
            <div class="col-sm-10">
                <input type="text" value="{{$vendor->mobile}}" id="mobile" name="mobile" class="form-control col-md-7 col-xs-12"> @if ($errors->has('mobile'))
                <span class="help-block">{{ $errors->first('mobile') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" value="{{$vendor->email}}" id="email" name="email" class="form-control col-md-7 col-xs-12"> @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" value="{{$vendor->address}}" id="address" name="address" class="form-control col-md-7 col-xs-12"> @if ($errors->has('address'))
                <span class="help-block">{{ $errors->first('address') }}</span>
                @endif
            </div>
        </div>

       

        <div class="ln_solid"></div>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input name="_method" type="hidden" value="PUT">
                <button type="submit" class="btn btn-success">Save Vendor Changes</button>
            </div>
        </div>
    </form>
    
@endsection