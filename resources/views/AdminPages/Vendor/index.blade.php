@extends('layouts.adminpages')

@section('content')

<h2>{{$title}}</h2>

<a class="btn btn-sm btn-primary" href="{{route('vendor.create')}}">Add New Vendor</a>
<hr>

    <!--***** CONTENT *****-->     
    <div class="row table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="bg-info text-white">
              <th>#</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

        @php $inc = ($vendors->currentpage() - 1) * $vendors->perpage() + 1; @endphp
              @foreach($vendors as $user)
              <tr>
                <td>{{ $inc }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="{{ route('vendor.edit', ['id' => $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Role"></i> </a>
                    <a class="btn btn-danger" href="{{ route('vendor.show', ['id' => $user->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                  </div>
                </td>
              </tr>
             <?php $inc++; ?>
              @endforeach
            
          </tbody>
        </table>
    </div> 
    Showing {{ $vendors->firstItem() }} TO  {{ $vendors->lastItem() }} of {{ $vendors->total() }} (for page {{ $vendors->currentPage() }} )
    <div class="pull-right">
    {!! $vendors->render() !!}
    </div>
@endsection