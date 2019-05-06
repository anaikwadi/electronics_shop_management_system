@extends('layouts.adminpages')

@section('content')
<h2>{{$title}}</h2>

<a class="btn btn-sm btn-primary" href="{{route('permission.index')}}">Back</a>
<hr>

    <div class="clearfix"></div>
    <p>Are you sure you want to delete
        <strong>{{$permission->name}}</strong>
    </p>

    <form method="POST" action="{{ route('permission.destroy', ['id' => $permission->id]) }}">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="btn btn-danger">Yes I'm sure. Delete</button>
    </form>
    
@endsection